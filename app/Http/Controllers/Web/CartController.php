<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function AddCart($id){
        // lay data gio hang tu session ra
        $productsCart = request()->session()->get('product_carts');

        // kiem tra neu data do chua co thi khai bao thanh 1 mang moi
        if (empty($productsCart)) {
            $productsCart = [];
        }

        // kiem tra san pham do co trong gio hang chua
        if (!empty($productsCart[$id])) {
            // neu co sp trong gio thi cong len 1 so luong
            $productsCart[$id]++;
        } else {
            // nguoc lai neu chua co thi sl = 1
            $productsCart[$id] = 1;
        }

        // lay data da xu li bo vao lai session
        request()->session()->put('product_carts', $productsCart);

        // chuyen huong ve trang truoc do va kiem theo cau thong bao
        return redirect()->back()->with(['success' => 'them san pham vao gio hang thanh cong']);
    }

    public function ListProduct(Request $request){
        // lay data tu session ra
        $productsCart = request()->session()->get('product_carts');
        // lay tat ca id cua sp ra => mang id
        $productIds = array_keys($productsCart);
        // lay du lieu data tu mysql theo mang id sp
        $listProduct = Product::whereIn('id', $productIds)->get();

        // lap qua tu san pham
        foreach($listProduct as $product) {
            // set sl san pham vao trong danh sach sp theo id
            $product->setAttribute('amount_cart', $productsCart[$product->id]);
        }

        // dua ds sp ve view
        return view('web.product.cart.list', compact('listProduct'));
    }

    public function deleteCart(Request $request, $id) {
        // lay data tu session ra
        $productsCart = request()->session()->get('product_carts');
        // xoa di san pham do (sp vua nhan delete)
        unset($productsCart[$id]);
        // lay data da chinh sua bo vo lai session
        request()->session()->put('product_carts', $productsCart);

        // tro ve trang truoc do (trang list product cart) kem theo thong bao
        return redirect()->back()->with(['success' => 'Xoa san pham thanh cong']);
    }
}
