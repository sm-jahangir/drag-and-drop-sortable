<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $completeItem = Item::where('status', 1)
            ->orderBy('order')
            ->get();
        return view('category', compact('completeItem'));
    }
    public function store(Request $request)
    {
        $input = $request->all();

        if (!empty($input['accept'])) {
            foreach ($input['accept'] as $key => $value) {
                $key = $key + 1;
                Item::where('id', $value)
                    ->update([
                        'order' => $key
                    ]);
            }
        }
        return response()->json(['status' => 'success']);
    }


    public function itemView()
    {
        // Incomplete Item - Status 0
        $panddingItem = Item::where('status', 0)
            ->orderBy('order')
            ->get();

        // Complete Item - Status 1
        $completeItem = Item::where('status', 1)
            ->orderBy('order')
            ->get();
        return view('test', compact('panddingItem', 'completeItem'));
    }
    public function updateItems(Request $request)
    {
        $input = $request->all();

        if (!empty($input['pending'])) {
            foreach ($input['pending'] as $key => $value) {
                $key = $key + 1;
                Item::where('id', $value)
                    ->update([
                        'status' => 0,
                        'order' => $key
                    ]);
            }
        }

        if (!empty($input['accept'])) {
            foreach ($input['accept'] as $key => $value) {
                $key = $key + 1;
                Item::where('id', $value)
                    ->update([
                        'status' => 1,
                        'order' => $key
                    ]);
            }
        }
        return response()->json(['status' => 'success']);
    }
}
