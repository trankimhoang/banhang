<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function search (Request $request) {
        $search = $request->get('s') ?? '';
        $listProduct = Product::where('name', 'like', '%' . $search . '%')->paginate(4);
        return view('web.product.search.index', compact('listProduct'));
    }
}
