<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBreadController;
use TCG\Voyager\Facades\Voyager;

class HighlightsController extends VoyagerBreadController
{
    public function ajaxGetModel(Request $request){
        $model = $request->input('model');
        $result = Voyager::model($model)->pluck('title', 'id');
        return json_encode($result);
    }
}
