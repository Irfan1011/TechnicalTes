<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        return view('Customer/show');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Customer/edit',compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/[\pL\s]+$/'],
            'email' => ['required', 'string', 'email:rfc', 'max:255'],
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
        ],[
            'name.regex' => 'The name cannot be number!',
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($request->role == "CustomerService")
            return redirect()->route('cs1.index')->with('success','Profile Updated!');
        else
            return redirect()->route('customer.index')->with('success','Profile Updated!');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect('/')->with('success','Account Deleted');
    }

    public function cart()
    {
        return view('Customer/cart');
    }
}
