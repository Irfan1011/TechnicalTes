<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;

class AdministratorController extends Controller
{
    public function index()
    {
        $page = DB::table('users')->paginate(5);

        return view('Administrator/show',compact('page'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('Administrator/edit',compact('user'));
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

        return redirect()->route('admin.index')->with('success','Profile Updated!');
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return redirect()->route('admin.index')->with('success','Account Deleted');
    }
}
