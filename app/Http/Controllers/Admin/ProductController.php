<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request){
        $listProduct = Product::with(['Categorys'])->paginate(5);
        return view('admin.product.list_product', compact('listProduct'));
    }

    public function addProduct(Request $request){
        $listCategory = Category::all();

        return view('admin.product.add_product',compact('listCategory'));
    }

    public function addProductPost(Request $request){
        $product = new Product([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'price' => $request->get('price'),
            'content' => $request->get('content'),
            'image' => ''
        ]);
        $product->save();

        if (!empty($request->get('category'))) {
            $dataInsert = [];

            foreach ($request->get('category') as $item) {
                $dataInsert[] = [
                    'product_id' => $product->getAttribute('id'),
                    'category_id' => $item
                ];
            }

            DB::table('product_category')->insert($dataInsert);
        }


        return redirect()->route('admin.product.list')->with(['success' => 'them thanh cong #' . $product->getAttribute('id')]);
    }

    public function editProduct(Request $request, $id){
        $product = Product::with(['Categorys'])->find($id);
        $listCategory = Category::all();
        $categorysOfProduct = $product->Categorys->mapWithKeys(function ($item){
            return [$item->pivot->category_id => true];
        })->toArray();

        if (empty($product)) {
            abort(404);
        }
        return view('admin.product.edit_product', compact('product', 'listCategory', 'categorysOfProduct'));
    }

    public function editProductPost(Request $request, $id){
        $product = Product::find($id);
        $product->setAttribute('name', $request->get('name'));
        $product->setAttribute('description', $request->get('description'));
        $product->setAttribute('price', $request->get('price'));
        $product->setAttribute('content', $request->get('content'));

        $image = $request->file('image');
        if (!empty($image)) {
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
        }

        $product->save();

        DB::table('product_category')->where('product_id', $product->id)
            ->delete();
        if (!empty($request->get('category'))) {
            $dataInsert = [];

            foreach ($request->get('category') as $item) {
                $dataInsert[] = [
                    'product_id' => $product->getAttribute('id'),
                    'category_id' => $item
                ];
            }

            DB::table('product_category')->insert($dataInsert);
        }

        return redirect()->route('admin.product.list')->with(['success' => 'Sua thanh cong #' . $id]);
    }

    public function deleteProduct(Request $request, $id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.product.list')->with(['success' => 'xoa thanh cong #' . $id]);
    }
}
