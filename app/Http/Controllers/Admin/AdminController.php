<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\One\User;

class AdminController extends Controller
{
    public function listAdmin(Request $request){
        $listAdmin = Admin::all();
        return view('admin.admin.list_admin', compact('listAdmin'));
    }

    public function addAdmin(Request $request){
        return view('admin.admin.add_admin');
    }

    public function addAdminPost(Request $request){
        $admin = new Admin([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $admin->save();
        return redirect()->route('admin.admin.add.post')->with(['success' => 'Them thanh cong']);
    }

    public function editAdmin(Request $request, $id){
        $admin = Admin::find($id);

        return view('admin.admin.edit_admin', compact('admin'));
    }

    public function editAdminPost(Request $request, $id){
        $admin = Admin::find($id);
        $admin->setAttribute('name', $request->get('name'));
        $admin->setAttribute('email', $request->get('email'));
        $admin->setAttribute('password', Hash::make($request->get('password')));

        $admin->save();
        return redirect()->route('admin.admin.list')->with(['success' => 'Sua thanh cong']);
    }

    public function deleteAdmin(Request $request, $id){
        $admin = Admin::find($id);
        $admin->delete();

        return redirect()->route('admin.admin.list')->with(['success' => 'Xoa thanh cong']);
    }

    public function dashboard(Request $request){
        $countProduct = Product::all()->count();
        $countCategory = Category::all()->count();
        $countUser = Customer::all()->count();
        $countAdmin = Admin::all()->count();

        return view('admin.dashboard.dashboard', compact('countProduct', 'countCategory', 'countUser', 'countAdmin'));
    }
}
