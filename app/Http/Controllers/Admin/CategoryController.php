<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategory(Request  $request){
        $listCategory = Category::all();
        return view('admin.category.list_category', compact('listCategory'));
    }

    public function addCategory(Request $request){
        return view('admin.category.add_category');
    }

    public function addCategoryPost(Request $request){
        $category = new Category([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
        ]);
        $category->save();
        return redirect()->route('admin.category.list')->with(['success' => 'them thanh cong #' . $category->getAttribute('id')]);
    }

    public function editCategory(Request $request, $id){
        $category = Category::find($id);

        if (empty($category)) {
            abort(404);
        }

        return view('admin.category.edit_category', compact('category'));

    }

    public function editCategoryPost(Request $request, $id){
        $category = Category::find($id);
        $category->setAttribute('name', $request->get('name'));
        $category->setAttribute('description', $request->get('description'));

        $category->save();
        return redirect()->back()->with(['success' => 'Sua thanh cong #' . $id]);
    }

    public function deleteCategory(Request $request, $id){
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('admin.category.list')->with(['success' => 'xoa thanh cong #' . $id]);
    }
}
