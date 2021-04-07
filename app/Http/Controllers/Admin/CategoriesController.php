<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index() {
        $categories =  Category::get();
        return view('admin.pages.categories', compact('categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'categories_image' => ['required'],
            'categories_name' => ['required']

        ]);

        $categories =  new Category();

        if ($request->hasFile('categories_image')) {
            $file = $request->file('categories_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('admin/categories/', $filename);
            $categories->categories_image = $filename;
        }
        $categories->categories_name = $request->categories_name;
        $categories->save();
        return redirect()->back()->with(['status' => 'Categories Added successFully saved']);
        // return response()->json(['message' =>  'data saved successfully']);
    }

    public function edit($id) {
        $categories_edit =  Category::find($id);
        if($categories_edit) {
            $categories =  Category::get();
            return view('admin.pages.categories', compact('categories_edit', 'categories'));
        }
    }

    public function update(Request $request, $id) {

        if ($request->hasFile('categories_image')) {
            $file = $request->file('categories_image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('admin/categories/', $filename);
            Category::where('id', $id)->update([
                'categories_image' => $filename,
            ]);
        }

        Category::where('id', $id)->update([
            'categories_name' => $request['categories_name']
        ]);
        return redirect()->route('categories.index')->with(['status' => 'Categories Updated SuccessFully Update!']);
    }

    public function remove_categories($id) {

        $remove_categories = Category::find($id);
        $remove_categories->delete();
        return response()->json(['remove_categories' =>  $remove_categories]);  
    }
    public function show($id)
    {
        //
    }
}
