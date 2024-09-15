<?php

namespace App\Http\Controllers;

use App\Mail\SendEmailReset;
use App\Models\User;
use App\Mail\SendEmail;
use App\Models\UsersReserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function lupaPassword()
    {
        if(session('dapin_email')) {
            return redirect('/');
        }

        return view('auth.lupapassword');
    }

    public function resetPasswordForm($linkreset)
    {
        $user = User::where('reset_password_link', $linkreset)->first();
        return view('auth.reset_password', ['user' => $user]);
    }

    public function showLoginForm()
    {
        if(session('dapin_email')) {
            return redirect('/');
        }

        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        if(session('dapin_email')) {
            return redirect('/');
        }

        return view('auth.register');
    }


    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();
        
        if($user){
            if(Hash::check($password, $user->password)){
                session(['dapin_email' => $user->email]);
                return redirect('/');
            } else {
                return redirect('/login')->with('error', "Email atau password anda salah");
            }
        } else {
            return redirect('/login')->with('error',"Akun anda tidak ditemukan");
        }
    }
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        // Cek apakah email atau username sudah ada dalam database
        $existingUser = User::where('email', $request->email)
                            ->orWhere('username', $request->username)
                            ->first();

        if ($existingUser) {
            return redirect('/register')->with('error', 'Email atau username sudah terdaftar. Silakan gunakan yang lain.');
        }

        // Generate OTP code
        $otpCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); // Pastikan 6 digit

        // Buat akun pengguna baru
        $user = UsersReserve::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'otp_code' => $otpCode,
        ]);

        $data_email=[
            'subject'=>'Konfirmasi Email Upmedia',
            'sender_name'=>'upmedia12345@gmail.com',
            'kode_otp'=>$otpCode,
        ];
        Mail::to($request->email)->send(new SendEmail($data_email));

        // Ambil ID pengguna yang baru dibuat
        $userId = $user->id;

        // Redirect ke /verification dengan menyertakan ID pengguna sebagai parameter
        return redirect("/verification/{$userId}");
    }

    public function verification($userId)
    {
        $user = UsersReserve::find($userId);

        if (!$user) {
            return redirect('/register')->with('error', 'Verifikasi Tidak ditemukan');
        }
        // Kirim data pengguna ke view
        return view('verificationemail', ['userId' => $userId]);
    }

    public function verifyOTP(Request $request)
    {
        $userId = $request->input('id');
        $otpCode = $request->input('otp_code');

        // Temukan pengguna berdasarkan ID
        $user = UsersReserve::find($userId);

        if (!$user) {
            return redirect('/register')->with('error', 'Verifikasi Tidak ditemukan');
        }

        // Cocokkan kode OTP
        if ($user->otp_code == $otpCode) {
            // Kode OTP cocok, lakukan tindakan yang sesuai
            User::create([
                'name' => $user->name,
                'email' => $user->email,
                'username' => $user->username,
                'password' => $user->password,
            ]);

            $user->delete();
            
            return redirect('/login')->with('success', 'Akun Anda telah berhasil dibuat. Silakan login.');
        } else {
            return redirect('/register')->with('error', 'Kode OTP salah. Silakan coba lagi');
        }
    }

    public function verifyEmail(Request $request)
    {
        $userId = $request->input('id');
        $email = $request->input('email');

        $otpCode = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT); 
        User::where('email', $email)->update([
            "reset_password_link" => $otpCode,
        ]);

        // Temukan pengguna berdasarkan ID

        $data_email=[
            'subject'=>'Konfirmasi Email Upmedia',
            'sender_name'=>'upmedia12345@gmail.com',
            'email' => $email,
            'linkreset' => $otpCode,
        ];
        Mail::to($request->email)->send(new SendEmailReset($data_email));
    }

    public function resetPasswordStore(Request $request)
    {
        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Password Anda telah berhasil direset. Silakan login.');
    }

    public function signout(){
        session()->forget('dapin_email');
        return redirect('/login');
    }
    
}
