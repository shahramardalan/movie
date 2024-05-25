<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\CodeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    public function authForm(){
        return view('auth');
    }

    public function auth(AuthRequest $request){

        $user = User::where('mobile', $request->mobile)->first();

        $password = rand(1111, 9999);

        Log::info($password);

        if(!$user){
            $user = User::create([
                'hash' => Uuid::uuid4()->toString(),
                'mobile' => $request->mobile,
                'password' => Hash::make($password)
            ]);
        }else{
            $user->password = Hash::make($password);
            $user->save();
        }

        return redirect()->route('password',['hash' => $user->hash]);
    }

    public function passwordForm($hash){

        $check = User::where('hash', $hash)->first();

        if(!$check){
            return redirect()->route('auth');
        }
        return view('password', ['hash' => $hash]);
    }

    public function password(CodeRequest $request, $hash){
        $user = User::where('hash', $hash)->first();

        if(!$user){
            return redirect()->route('auth');
        }

        if(Hash::check($request->code, $user->password)){
                auth()->login($user, true);
                $user->password = null;
                $user->save();

                return redirect('/');

        }
        
        return redirect()->back()->withErrors(['code' => 'wrong codes!']);
    }
}
