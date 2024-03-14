<?php

namespace App\Http\Repository\Inventory;

use App\Models\Inventory;

class InventoryRepository 
{

    public function store($request)
    {
        Inventory::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
        ]);
    }
    
    public function update($request, $inventory)
    {
        $inventory->update([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'status' => $request->status,
        ]);
    }
    
    public function destroy($inventory)
    {
        $inventory->delete();
    }

}