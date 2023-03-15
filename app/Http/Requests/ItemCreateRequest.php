<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
//            'name' => 'required|string',
//            'node_id' => 'integer',
//            'external_id' => 'string',
//            'hidden' => 'boolean',
//            'type' => 'string',
//            'price' => 'numeric',
//            'description' => 'string',
//            'measurement' => 'string',
//            'inventory' => 'string',
//            'minQuantity' => 'numeric',
//            'increment' => 'numeric',
        ];
    }

    public function messages()
    {
        return [
//            'name.required' => 'Имя обязательно',
//            'name.string' => 'Имя должно быть строкой',
//            'node_id.integer' => 'nodeId должен быть целым числом',
//            'external_id.string' => 'externalId должен быть строкой',
//            'hidden' => 'Скрытость булево значение'
        ];
    }

    public function getName()
    {
        return $this->input('name');
    }

    public function getType(): string
    {
        return $this->input('type');
    }

    public function getPrice(): float
    {
        return $this->input('price');
    }

    public function getDescription(): string
    {
        return $this->input('description');
    }

    public function getMinQuantity(): float
    {
        return $this->input('minQuantity');
    }

    public function getIncrement(): float
    {
        return $this->input('increment');
    }
}
