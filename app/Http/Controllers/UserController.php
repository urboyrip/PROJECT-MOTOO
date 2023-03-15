<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\MatchOldPassword;
use App\Models\application_teknisi;
use App\Models\application;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller{
    
    public function profile($x){
        return view('profile',[
            'page' => 'Profile',
            'user' => User::find($x)
        ]);
    }
    

    public function viewEdit($x){
        return view('editprofile',[
            'page' => 'Profile',
            'user' => User::find($x)
        ]);
    }

    public function edit(Request $request){
        User::where('id', $request->id)->update([
            'username' => $request->username,
            'Nomor_HP' => $request->nomor_hp,
            'Nama_User' => $request->nama_user,
            'Email' => $request->email,
        ]);
        return redirect()->route('profile', $request->id);
    }

    public function create(Request $request){
        User::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'Nomor_HP' => $request->nomor_hp,
            'Nama_User' => $request->nama,
            'Email' => $request->email,
            'Role' => 'Konsumen',
            'Status_Keaktifan'=> true, 
        ]);

        return redirect()->route('loginpage');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password'=> 'required'
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home');
        }
        return back()->with('loginError', 'Login Failed');
    }

    public function viewEditPW($x){
        return view('editpassword',[
            'page' => 'Change Password',
            'user' => User::find($x)
        ]);
    }

    public function changePassword(Request $request){
        $user = User::find($request->id);
        
        $request->validate([
            'old_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            're_new_password' => ['same:new_password'],
        ]);


        User::find(auth()->user()->id)->update([
            'password'=> Hash::make($request->new_password),
        ]);

        
        return redirect()->route('profile', $request->id);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginpage');
    }

    public function showJob(){
        return view('tesdata', [
            'page' => 'arip',
            'user' => User::with('applications')->get(),
            'userr' =>User::all(),
            'apps' => application::all(),
            'application' => application::with('users')->get(),
            'ticket' => Ticket::all(),
            'ticket2' => Ticket::orderBy('user_id','asc')->get(),
        ]);
    }

    public static function countTicket($id){
        $count = Ticket::where('user_id', $id)->count();
        return $count;
    }
}