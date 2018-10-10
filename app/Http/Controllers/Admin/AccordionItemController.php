<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccordionItemRequest;
use App\Models\AccordionItem;
use Validator;

class AccordionItemController extends Controller
{
    
    /**
     * Insere ou atualiza um item de um accordion
     * 
     * @param  \Illuminate\Http\Request $request 
     * 
     * @param  int  $id      ID do Accordion
     * 
     * @return \Illuminate\Http\RedirectResponse           
     */
    public function storeOrUpdate(Request $request, $id)
    {
        $val = $this->validateItem($request->all(), $request->get('itens'));

        if ($val->fails()) {
            return response()->json(['errors' => $val->messages()]);
        }

    	$itens_ids = [];
        if ($request->has('itens')) {
    		foreach ($request->itens as $item) {
    			if ($item['id'] == null) {
    				$item['accordion_id'] = $id;
    				$itens_ids[] = AccordionItem::create($item)->id;
    			} else {
    				$itens_ids[] = $item['id'];
    				AccordionItem::find($item['id'])->update($item);
    			}
    		}
    	}

    	$itens = AccordionItem::where('accordion_id', $id)->get();
    	$this->deleteItens($itens_ids, $itens);

        return redirect()->route('voyager.accordions.show', $id);
    }

    /**
     * Valida item dos accordions
     * 
     * @param  \Illuminate\Http\Request $request 
     * 
     * @param  Array $data    Array com os campos a serem validados
     * 
     * @return Validator          
     */
    private function validateItem($request, $data)
    {
        $rules = [];
        $messages = ['required' => 'Campo obrigatório'];

        if (isset($data) && !empty($data)) {
            foreach ($data as $key => $item) {
                $rules['itens.'.$key.'.title'] = 'required';
                $rules['itens.'.$key.'.description'] = 'required';
            }
        }

        return Validator::make($request, $rules, $messages);
    }

    /**
     * Deleta um item
     * 
     * @param  array $array Lista com os ids a não serem excluidos
     * 
     * @param  App\Models\AccordtionItem $itens 
     * 
     * @return void        
     */
    private function deleteItens($array, $itens) 
    {
    	foreach ($itens as $item) {
    		!in_array($item->id, $array) ? $item->delete() : '';
    	}
    }

}
