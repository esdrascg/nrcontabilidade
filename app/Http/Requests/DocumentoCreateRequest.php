<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentoCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|unique:documentos,nome',
            'descricao' => 'required',
            'categorias.*' => 'exists:categorias,id'
        ];
    }

    public function messages()
    {
        $result = [];
        $categorias = $this->get('categorias',[]);
        $count = count($categorias);
        if(is_array($categorias) && $count > 0){
            foreach (range(0,$count-1) as $value){
                $field = \Lang::get('validation.attributes.categorias_*',[
                    'num' => $value + 1
                ]);
                $message = \Lang::get('validation.exists',[
                    'attribute' => $field
                ]);
                $result["categorias.$value.exists"] = $message;
            }
        }
        return $result;
    }
}
