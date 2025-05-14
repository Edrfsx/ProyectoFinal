<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller as BaseController;

class LoginController extends Controller{

    public function index(){
        return view("login");
    }

    public function login(Request $request){    
        if (Auth::attempt([
            'usuario' => $request->usuario, 'password' => $request->password])) {


            $request->session()->regenerate();
            return redirect()->intended(route("portal.index"));

        }else{
            return redirect("/Vacalog/login");
         }

    }

    public function registrar(Request $request){
        $user = new User();

        $user->usuario = $request->usuario;
        $user->password = Hash::make($request->password);
        $user->trabajador_id = $request->trabajador_id;

        $user->save();

        Auth::login($user);
        return redirect(route("login"));



    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route("login"));
    }

public function sesion(Request $request){
    $data = \App\Models\User::where('usuario', $request->usuario)
                  ->where('password', $request->password)
                  ->first();

    if ($data) {
        return response()->json($data);
    } else {
        return response()->json(['message' => 'Credenciales incorrectas'], 401);
    }
}


}