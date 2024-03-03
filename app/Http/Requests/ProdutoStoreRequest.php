<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $input = parent::all();
        // dd($input);

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'descricao' => 'required|string',
            'valor_venda' => 'required|numeric|min:0',
            'estoque' => 'required|integer|min:0',
            'imagens.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
