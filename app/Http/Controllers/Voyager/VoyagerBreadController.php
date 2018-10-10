<?php

namespace App\Http\Controllers\Voyager;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Database\Schema\SchemaManager;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;
use TCG\Voyager\Http\Controllers\VoyagerBreadController as BaseVoyagerBreadController;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use App\Models\Page;
use Validator;

class VoyagerBreadController extends BaseVoyagerBreadController
{
    /**
     * POST BRE(A)D - Store data.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $this->authorize('edit', app($dataType->model_name));

        $val = $this->validateBread($request->all(), $dataType->addRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }


        if (!$request->ajax()) {
            $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

            event(new BreadDataAdded($dataType, $data));

            if ($dataType->slug == 'pages' && $request->exibir_menu != null) {
            	$this->adicionaMenu($request);
            }

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                        'message'    => __('voyager.generic.successfully_added_new')." {$dataType->display_name_singular}",
                        'alert-type' => 'success',
                    ]);
        }
    }

    /**
     * POST BR(E)AD
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();


        $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);

        $this->authorize('edit', $data);

        $val = $this->validateBread($request->all(), $dataType->editRows);

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

        if (!$request->ajax()) {
            $this->insertUpdateData($request, $slug, $dataType->editRows, $data);

            event(new BreadDataUpdated($dataType, $data));

            if ($dataType->slug == 'pages') {
                $request->has('exibir_menu') ? $this->atualizaMenu($request, $page->slug) : $this->removeMenu('/'.$request->slug);
            }

            return redirect()
                ->route("voyager.{$dataType->slug}.index")
                ->with([
                    'message'    => __('voyager.generic.successfully_updated')." {$dataType->display_name_singular}",
                    'alert-type' => 'success',
                ]);
        }
    }

    /**
     * Delete an item BREA(D)
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $page = Page::find($id);
        $slug = $this->getSlug($request);

        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        $this->authorize('delete', app($dataType->model_name));

        $ids = [];
        if (empty($id)) {
            $ids = explode(',', $request->ids);
        } else {
            $ids[] = $id instanceof Model ? $id->{$id->getKeyName()} : $id;
        }
        foreach ($ids as $id) {
            $data = call_user_func([$dataType->model_name, 'findOrFail'], $id);
            $this->cleanup($dataType, $data);
        }

        $displayName = count($ids) > 1 ? $dataType->display_name_plural : $dataType->display_name_singular;

        $res = $data->destroy($ids);
        $data = $res
            ? [
                'message'    => __('voyager.generic.successfully_deleted')." {$displayName}",
                'alert-type' => 'success',
            ]
            : [
                'message'    => __('voyager.generic.error_deleting')." {$displayName}",
                'alert-type' => 'error',
            ];

        if ($res) {
            event(new BreadDataDeleted($dataType, $data));
        }

        if ($dataType->slug == 'pages') {
            $this->removeMenu('/'.$page->slug);
        }

        return redirect()->route("voyager.{$dataType->slug}.index")->with($data);
    }




    /**
     * Adiciona um item ao menu
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    private function adicionaMenu(Request $request)
    {
        $menu = Menu::where('name', 'Principal')->first();

        $menuItem = new MenuItem();
        $menuItem->menu_id = $menu->id;
        $menuItem->title = $request->title;
        $menuItem->url = '/' . $request->slug;
        $menuItem->target = '_self';
        $menuItem->order = 1;
        $menuItem->save();
    }

    /**
     * Atualiza um item do menu
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @param  string  $slugAntigo
     *
     * @return void
     */
    private function atualizaMenu(Request $request, $slugAntigo)
    {
        if (MenuItem::where('url', '/'.$slugAntigo)->exists()) {
            $menuItem = MenuItem::where('url', '/'.$slugAntigo)->first();
            $menuItem->title = $request->title;
            $menuItem->url = '/'.$request->slug;
            $menuItem->save();
        } else {
            $this->adicionaMenu($request);
        }
    }

    /**
     * Remove um item do menu
     *
     * @param  string $slug
     *
     * @return void
     */
    private function removeMenu($slug)
    {
        if (MenuItem::where('url', $slug)->exists()) {
            $menuItem = MenuItem::where('url', $slug)->first();
            $menuItem->delete();
        }
    }

    public function validateBread($request, $data)
    {
        foreach ($data as $key => $row) {
          $data[$key]->display_name = $row->field;
        }
        return parent::validateBread($request, $data);
    }

}
