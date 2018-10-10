<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\VoyagerBreadController;
use App\Models\AccordionItem;

class AccordionController extends VoyagerBreadController
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

      // dd($request->slug);
      // Check permission
      $this->authorize('edit', app($dataType->model_name));

      // Validate fields with ajax
      $val = $this->validateBread($request->all(), $dataType->addRows);

      if ($val->fails()) {
          return response()->json(['errors' => $val->messages()]);
      }

      if (!$request->ajax()) {
          $data = $this->insertUpdateData($request, $slug, $dataType->addRows, new $dataType->model_name());

          event(new BreadDataAdded($dataType, $data));

          return redirect()
              ->route("voyager.{$dataType->slug}.show", ['id' => $data->id])
              ->with([
                  'message'    => 'Accordion criado com sucesso!',
                  'alert-type' => 'success',
              ]);
      }
  }

  public function show(Request $request, $id)
  {
      $slug = $this->getSlug($request);

      $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

      // Compatibility with Model binding.
      $id = $id instanceof Model ? $id->{$id->getKeyName()} : $id;

      $relationships = $this->getRelationships($dataType);
      if (strlen($dataType->model_name) != 0) {
          $model = app($dataType->model_name);
          $dataTypeContent = call_user_func([$model->with($relationships), 'findOrFail'], $id);
      } else {
          // If Model doest exist, get data from table name
          $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
      }

      // Replace relationships' keys for labels and create READ links if a slug is provided.
      $dataTypeContent = $this->resolveRelations($dataTypeContent, $dataType, true);
      $itens           = AccordionItem::where('accordion_id', $id)->get();

      // If a column has a relationship associated with it, we do not want to show that field
      $this->removeRelationshipField($dataType, 'read');

      // Check permission
      $this->authorize('read', $dataTypeContent);

      // Check if BREAD is Translatable
      $isModelTranslatable = is_bread_translatable($dataTypeContent);

      $view = 'voyager::bread.read';

      if (view()->exists("voyager::$slug.read")) {
          $view = "voyager::$slug.read";
      }

      return Voyager::view($view, compact('id', 'dataType', 'dataTypeContent', 'itens', 'isModelTranslatable'));
  }

}
