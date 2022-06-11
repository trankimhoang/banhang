<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $listProduct = Product::paginate(5);
        return view('admin.product.list_product', compact('listProduct'));
    }

    public function addProduct(Request $request){
        return view('admin.product.add_product');
    }

    public function addProductPost(Request $request){
        $product = new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'content' => $request->get('content'),
        ]);
        $product->save();

        return redirect()->route('admin.product.list')->with(['success' => 'them thanh cong #' . $product->getAttribute('id')]);
    }

    public function editProduct(Request $request, $id){
        $product = Product::find($id);

        if (empty($product)) {
            abort(404);
        }
        return view('admin.product.edit_product', compact('product'));
    }

    public function editProductPost(Request $request, $id){
        $product = Product::find($id);
        $product->setAttribute('name', $request->get('name'));
        $product->setAttribute('description', $request->get('description'));
        $product->setAttribute('price', $request->get('price'));
        $product->setAttribute('content', $request->get('content'));

        $image = $request->file('image');
        // xxxxxxxxgido.png // png or jpg
        // chuyen sang thanh 1 array 2 phan tu ['xxxxxxxxgido', 'png]
        $ext = explode('.', $image->getClientOriginalName());
        // lay phan tu cui cung ['xxxxxxxxgido', 'png] => lay png
        $ext = $ext[array_key_last($ext)];
        // dat ten cho image id_product.png
        $nameImage = $product->getAttribute('id') . '.' . $ext;
        // luu vao public]
        $image->move(public_path('product-images'), $nameImage);
        // set attr image
        $product->setAttribute('image', $nameImage);

        $product->save();

        return redirect()->back()->with(['success' => 'Sua thanh cong #' . $id]);
    }

    public function deleteProduct(Request $request, $id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.product.list')->with(['success' => 'xoa thanh cong #' . $id]);
    }
}
