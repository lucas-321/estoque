<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        $id = $this->segment(2);
        return [
            'name' => "required|min:3|max:255|unique:products,name,{$id},id",
            'description' => 'nullable|min:3|max: 10000',
            'cost' => "nullable|regex:/^\d+(\.d{1,2})?$/",
            'valor' => "nullable|regex:/^\d+(\.d{1,2})?$/",
            'qtd' => 'required',
            'loc' => 'nullable|min:3|max: 100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório.',
            'name.min' => 'Nome precisa ter pelo menos 3 caracteres.',
            'description.min' => 'Descrição precisa ter pelo menos 3 caracteres.',
            'qtd.required' => 'Quantidade é obrigatório'
        ];
    }
}
