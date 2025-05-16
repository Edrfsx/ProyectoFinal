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


                $usu = \App\Models\User::where('usuario',$request->usuario)
                ->first();

                if($usu->trabajador_id >0){
            $request->session()->regenerate();
            return redirect()->intended(route("portal.index"));}

            if($usu->jefe_id > 0 ){
                $request->session()->regenerate();
                return redirect()->intended(route("index.index"));
            }

        }else{
            return redirect("/Vacalog/login");
         }

    }

    public function registrar(Request $request){
        $user = new User();

        $user->usuario = $request->usuario;
        $user->password = Hash::make($request->password);
        $user->trabajador_id = $request->trabajador_id;
        $user->jefe_id = $request->jefe_id;

        $user->save();

        Auth::login($user);
        return redirect(route("login"));



    }

    public function registrarTrabajador(Request $request)
{
    // Validar los campos
    $validated = $request->validate([
        'Nombre' => 'required|string|max:255',
        'Apellidos' => 'required|string|max:255',
        'Sexo' => 'required|in:Hombre,Mujer,Otros',
        'Email' => 'required|email|unique:Trabajadores,Email',
        'Ocupacion' => 'required|string|max:255',
        'Salario' => 'required|numeric|min:0',
        'Fecha_alta' => 'required|date',
    ]);

    // Crear un nuevo trabajador
    $trabajador = \App\Models\Trabajadores::create($validated);

    // Redireccionar o retornar respuesta
    return redirect()->back()->with('success', 'Trabajador registrado correctamente');
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