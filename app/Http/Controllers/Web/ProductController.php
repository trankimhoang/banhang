<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function search (Request $request) {
        $search = $request->get('s') ?? '';
        $listProduct = Product::where('name', 'like', '%' . $search . '%')->paginate(4);
        return view('web.product.search.index', compact('listProduct'));
    }

    public function detailProduct(Request $request, $id){
        $product = Product::find($id);
        return view('web.product.detail', compact('product'));
    }
}
