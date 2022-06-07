<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function detailCategory(Request $request, $id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            abort(404);
        }

        return view('web.category.list_product', compact('category'));
    }
}
