<?php

namespace App\Http\Controllers\API\v1\Inventory;

use App\Http\Controllers\Controller;
use App\Http\Repository\Inventory\InventoryRepository;
use App\Http\Requests\Inventory\StoreInventoryRequest;
use App\Http\Requests\Inventory\UpdateInventoryRequest;
use App\Http\Resources\Inventory\InventoryResource;
use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    public $repository;

    public function __construct(InventoryRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function index()
    {
        $inventory = Inventory::paginate(10);

        return InventoryResource::collection($inventory);
    }
    
    public function store(StoreInventoryRequest $request)
    {
        
        $this->repository->store($request);

        return response()->json([
            'status' => 'Success',
            'message' => 'Created successfully'
        ]);
    }
    
    public function show(Inventory $inventory)
    {
        return new InventoryResource($inventory);
    }
    
    public function update(UpdateInventoryRequest $request, Inventory $inventory)
    {
        $this->repository->update($request, $inventory);

        return response()->json([
            'status' => 'Success',
            'message' => 'Updated successfully'
        ]);
    }
    
    public function destroy(Inventory $inventory)
    {
        $this->repository->destroy($inventory);

        return response()->json([
            'status' => 'Success',
            'message' => 'Deleted'
        ]);
    }
}
