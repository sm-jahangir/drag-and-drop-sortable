<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Tag;
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
    public function tagindex()
    {
        $categories = Tag::where('parent_id', 0)->orderBy('order', 'ASC')->get();
        return view('nestable.tag', compact('categories'));
    }
    public function tagstore(Request $request)
    {
        $your_array = $request->arr;
        foreach ($your_array as $key => $your_single_item) {
            $key = $key + 1;
            if (isset($your_single_item['parent_id'])) {
                Tag::where('id', $your_single_item['id'])
                    ->update([
                        'parent_id' => $your_single_item['parent_id'],
                        'order' => $key,
                        // 'order' =>$your_single_item['id']
                    ]);
            } else {
                Tag::where('id', $your_single_item['id'])
                    ->update([
                        'parent_id' => 0,
                        'order' => $key
                    ]);
            }
        }
        return response()->json(['status' => 'Hope it will work !']);
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
