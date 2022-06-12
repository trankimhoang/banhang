<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer as User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listUser(Request $request){
        $listUser = User::all();
        return view('admin.user.list_user', compact('listUser'));
    }

    public function addUser(Request  $request){
        return view('admin.user.add_user');
    }

    public function addUserPost(Request $request){
        $user = new User();
        $user->setAttribute('name', $request->get('name'));
        $user->setAttribute('email', $request->get('email'));
        $user->setAttribute('phone', $request->get('phone'));
        $user->setAttribute('address', $request->get('address'));
        $user->setAttribute('password', Hash::make($request->get('password')));

        $user->save();
        return redirect()->route('admin.user.list')->with(['success' => 'them thanh cong #' . $user->getAttribute('id')]);
    }

    public function deleteUser(Request $request, $id){
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.user.list')->with(['success' => 'xoa thanh cong #' . $id]);
    }

    public function editUser(Request $request, $id){
        $user = User::find($id);

        if (empty($user)) {
            abort(404);
        }
        return view('admin.user.edit_user', compact('user'));
    }

    public function editUserPost(Request $request, $id){
        $user = User::find($id);
        $user->setAttribute('name', $request->get('name'));
        $user->setAttribute('email', $request->get('email'));
        $user->setAttribute('phone', $request->get('phone'));
        $user->setAttribute('address', $request->get('address'));
        $user->setAttribute('password', Hash::make($request->get('password')));
        $user->save();
        return redirect()->route('admin.user.list')->with(['success' => 'Sua thanh cong #' . $id]);
    }
}
