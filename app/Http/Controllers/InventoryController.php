<?php

namespace App\Http\Controllers;

use App\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    private $inventory;
    private $request;

    public function __construct(Inventory $inventory, Request $request)
    {
        $this->inventory = $inventory;
        $this->request = $request;
    }

    public function create()
    {

        if ($this->request->has('name')) {
            if ($this->inventory->create($this->request->all())) {
                return response(['status' => 'success']);
            }
        }

        return response(['status' => 'error']);

    }

}