<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login()
    {
        // dd(Hash::make('petugas'));
        if (!empty(Auth::check()))
        {
            if (Auth::user()->role == 1)
            {
                return redirect('admin/dashboard');
            }
            elseif (Auth::user()->role == 2)
            {
                return redirect('petugas/dashboard');
            }
        }

        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = !empty($request->remember) ? true : false;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if (Auth::user()->role == 1)
            {
                return redirect('admin/dashboard');
            }
            elseif (Auth::user()->role == 2)
            {
                return redirect('petugas/dashboard');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Silahkan Masukkan Email dan Password dengan Benar');
        }
    }

    public function ForgotPassword()
    {
        return view('auth.forgot');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url(''));
    }

    public function PostForgotPassword(Request $request)
    {
        $user = User::getEmailSingle($request->email);
        if (!empty($user))
        {
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect()->back()->with('success', 'Silahkan Periksa Email dan Atur Ulang Kata Sandi Anda');
        }
        else
        {
            return redirect()->back()->with('error', 'Email Tidak Ditemukan');
        }
    }

    public function reset($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if (!empty($user))
        {
            $data['user'] = $user;
            return view('auth.reset', $data);
        }
        else
        {
            abort(404);
        }
    }

    public function PostReset($token, Request $request)
    {
        if ($request->password == $request->cpassword)
        {
            $user = User::getTokenSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();

            return redirect(url(''))->with('success', 'Password Berhasil Diatur Ulang');
        }
        else
        {
            return redirect()->back()->with('error', 'Password dan Konfirmasi Password Tidak Sesuai');
        }
    }
}
