<?php

namespace App\Http\Resources\Inventory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InventoryResource extends JsonResource
{
    public function toArray(Request $request): array
    {

        $status = $this->status ? 'ACTIVE' : 'INACTIVE';

        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'status' => $status
        ];
    }
}
