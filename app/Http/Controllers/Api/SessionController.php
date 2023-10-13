<?php

namespace App\Http\Controllers\Api;

use App\Providers\RouteServiceProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;

class SessionController extends Controller
{
    public function createRegister()
    {
        return view('RegisterLogin.register');
    }

    public function storeRegister(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/[\pL\s]+$/'],
            'email' => ['required', 'string', 'email:rfc', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            'role' => 'required',
        ],[
            'name.regex' => 'The name cannot be number!',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/')->with('success','Account Created!');
    }

    public function createLogin()
    {
        return view('RegisterLogin.login');
    }

    public function storeLogin(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $role = Auth::user()->role;
        $status = Auth::user()->status;

        if($role === 'Customer' && $status == true)
        {
            return redirect()->route('customer.index');
        }elseif($role === 'CustomerService' && $status == true)
        {
            return redirect()->route('cs.index');
        }elseif($role === 'Administrator' && $status == true)
        {
            return redirect()->route('admin.index');
        }else
        {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect('/')->with('success','Not Verified Yet!');
        }
    }

    public function destroyLogin(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
