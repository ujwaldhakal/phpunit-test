<?php

namespace App\Http\Controllers;

use App\Events\NotifyAdmin;
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

        if ($this->request->has('name') && $this->request->has('price')) {
            if ($this->inventory->create($this->request->all())) {

                event(new NotifyAdmin($this->inventory));

                return response(['status' => 'success','message' => 'item has been successfully added']);
            }
        }

        return response(['status' => 'error','message' => 'item name or price is missing']);

    }

}