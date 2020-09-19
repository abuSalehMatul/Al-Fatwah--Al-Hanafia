<?php

namespace App\Http\Controllers\Admin;

use App\Answer;
use App\Article;
use App\Book;
use App\Category;
use App\Question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        $data = [
            'total_answered' => Answer::where('status', 'active')->count(),
            'total_question' => Question::count(),
            'total_category' => Category::count(),
            'total_user' => User::count(),
            'publish_article' => Article::where('status', 'active')->count(),
            'total_book' => Book::count()
        ];
        return view('backend.home')->with('data', $data);
    }

    public function root()
    {
        $adminRole = DB::table('roles')->where('name', 'admin')->first();
        $admins = DB::table('users')->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->where('model_has_roles.role_id', $adminRole->id)
        ->get();

        $subRole = DB::table('roles')->where('name', 'sub_admin')->first();
        $subAdmins = DB::table('users')->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->where('model_has_roles.role_id', $subRole->id)
        ->get();
        return view('backend.root')->with('admins', $admins)->with('subAdmins', $subAdmins);
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }

    public function save(Request $request)
    {
        $request->validate([
            'password' => 'required:min:6',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);
        return redirect()->back();
    }

    public function edit(Request $request)
    {
        $request->validate([
            'admin_id' => 'required',
            'name' => 'required',
            'email' => 'required|email'
        ]);
        $user = User::findOrFail($request->admin_id);
        $user->name = $request->name;
        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->email = $request->email;
        $user->save();
        return redirect()->back();

    }
}
