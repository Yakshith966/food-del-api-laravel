<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return response()->json($items);
    }
    public function create()
    {
        $categories = Category::all();
        return view('addItems', compact('categories'));
    }

    public function store(Request $request)
{
    // Validate the form data
    $validated = $request->validate([
        'name' => 'required|string',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'category_id' => 'required|exists:categories,id'
    ]);

    // Upload image file to storage
    $imageName = $request->image->getClientOriginalName();
    $request->image->storeAs('public/items', $imageName);

    // Create new item
    Item::create([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'price' => $validated['price'],
        'image' => $imageName,
        'category_id' => $validated['category_id']
    ]);

    return redirect()->route('items.create')->with('success', 'Item added successfully.');
}
public function getItemsByCategory($categoryId)
    {
        if ($categoryId === 'all') {
            $items = Item::all();
        } else {
            $items = Item::where('category_id', $categoryId)->get();
        }
        return response()->json($items);
    }


}
