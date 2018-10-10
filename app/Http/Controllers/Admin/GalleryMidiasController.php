<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryMidia;

class GalleryMidiasController extends Controller
{
    /**
     * Insere uma foto em uma determinada galeria
     *
     * @param  Illuminate\Http\Request $request
     *
     * @param  int  $id      ID da Posição
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, $id) {
    	$galeria = Gallery::find($id);
    	$path = 'galerias/'.$galeria->slug.'/';
    	if ($request->has('imagens')) {
    		foreach ($request->imagens as $imagem) {

    			$img['image'] = $this->upload($path, $imagem);
    			$img['gallery_id'] = $id;

    			GalleryMidia::create($img);
    		}
    	}elseif ($request->has('youtube')) {
            $midia['youtube'] = $request->youtube;
            $midia['gallery_id'] = $id;

            GalleryMidia::create($midia);
        }

    	return redirect()->route('voyager.galleries.show', $id);
    }


    /**
     * Atualiza ou deleta uma imagem
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateOrDelete(Request $request, $id)
    {
        $midias_ids = [];

        if ($request->has('gallery_midias')) {
            foreach ($request->gallery_midias as $midia) {
                $midias_ids[] = $midia['id'];

                GalleryMidia::find($midia['id'])->update($midia);
            }
        }

        $gallery_midias = GalleryMidia::where('gallery_id', $id)->get();
        foreach ($gallery_midias as $midia) {
            if (!in_array($midia->id, $midias_ids)) {
                Storage::disk('public')->delete($midia->image);

                $midia->delete();
            }
        }

        return redirect(request()->headers->get('referer'));
    }



    /**
     * Pega a imagem upada e move para a pasta certa
     *
     * @param  \Illuminate\Http\UploadedFile $file
     *
     * @param  string $path
     *
     * @return string  Full path para a imagem
     */
    private function upload($path, $file) {

    	$filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
    	$filename_counter = 1;

    	while (Storage::disk('public')->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {

    		$filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()).(string) ($filename_counter++);
    	}

    	$fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();

    	Storage::disk('public')->put($fullPath, file_get_contents($file), 'public');

    	return $fullPath;
    }

    public function getHtml($id){
        $gallery_midias = GalleryMidia::where('gallery_id', $id)->get();
        return view('admin.gallery_midia.get_html', [
          'midias' => $gallery_midias,
        ]);
    }
}
