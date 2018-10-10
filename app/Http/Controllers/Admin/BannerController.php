<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\Banner;


class BannerController extends Controller
{

	/**
	 * Insere um banner em uma determinada posição
	 * 
	 * @param  Illuminate\Http\Request $request 
	 * 
	 * @param  int  $id      ID da Posição
	 * 
	 * @return \Illuminate\Http\RedirectResponse         
	 */
	public function store(Request $request, $id) {
		$posicao = Position::find($id);
		$path = 'posicoes/'.$posicao->slug.'/';

		if ($request->has('imagens')) {
			foreach ($request->imagens as $imagem) {

				$img['image'] = $this->upload($path, $imagem);
				$img['position_id'] = $id;

				Banner::create($img);
			}
		}

		return redirect()->route('voyager.positions.show', $id);
	}

	/**
	 * Atualiza ou deleta um banner
	 * 
	 * @param  \Illuminate\Http\Request $request 
	 *
	 * @param int $id 
	 * 
	 * @return \Illuminate\Http\RedirectResponse           
	 */
	public function updateOrDelete(Request $request, $id)
	{
		$banners_ids = [];

		if ($request->has('banners')) {
			foreach ($request->banners as $banner) {
				$banners_ids[] = $banner['id'];

				Banner::find($banner['id'])->update($banner);
			}
		}

		$banners = Banner::where('position_id', $id)->get();
		foreach ($banners as $banner) {
			if (!in_array($banner->id, $banners_ids)) {
				Storage::disk('public')->delete($banner->image);

				$banner->delete();
			}
		}

		return redirect(request()->headers->get('referer'));
	}


	/**
	 * Pega a imagem upada e move para a pasta certa
	 * 
	 * @param  \Illuminate\Http\UploadedFile $imagem
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
}
