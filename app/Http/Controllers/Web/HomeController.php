<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $listProduct = Product::paginate(8);
        return view('web.home.index', compact('listProduct'));
    }
}
