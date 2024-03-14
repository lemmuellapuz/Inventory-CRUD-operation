<?php

namespace App\Http\Requests\Inventory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array
    {
        return [
            'code' => [ 'required', 'max:15', 'unique:inventories,code,'.$this->inventory->id ],
            'name' => [ 'required', 'max:255' ],
            'description' => [ 'nullable', 'max:255' ],
            'quantity' => [ 'required', 'numeric' ],
            'status' => [ 'required', 'in:0,1' ]
        ];
    }
}
