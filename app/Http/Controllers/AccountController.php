<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Product;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index()
    {
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();
        

        if($user){
            $products = Product::where('created_by', $email)->get();
            return view('account', ['user' => $user, 'products' => $products]);
        } else {
            return redirect('/login')->with('error',"Anda belum login");
        }
    }

    public function accountusername($username)
    {
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();
        $userview = User::where('username', $username)->first();

        if($user){
            $products = Product::where('created_by', $userview->email)->get();
            return view('viewaccount', ['user' => $user, 'products' => $products, 'userview' => $userview]);
        } else {
            return redirect('/');
        }
    }

    public function updateProfile(Request $request) {
        // Validasi input jika diperlukan
        $request->validate([
            'name' => 'required|string|max:255',
            // Tambahkan validasi untuk kolom lain jika diperlukan
        ]);
    
        // Dapatkan pengguna saat ini
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();
    
        // Perbarui data pengguna
        $user->name = $request->input('name');
        // Perbarui kolom lain jika ada
    
        // Simpan perubahan
        $user->save();
    
        // Redirect atau kembali ke halaman profil
        return redirect()->route('account');
    }

    public function uploadProfilePic(Request $request)
    {
        $file = $request->file('profile_pic');
        // Retrieve a cookie
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();

        // Pastikan file ada dan valid
        if ($file && $file->isValid()) {
            // Simpan file ke penyimpanan 'public' dengan nama yang dihasilkan secara unik
            $path = $file->store('public/profile_pic');

            // Dapatkan nama file dari $path
            $fileName = basename($path);

            // Simpan nama file ke dalam kolom profile_pic pada model User
            $user->profile_pic = $fileName;
            $user->save();

            return redirect()->route('account')->with('success', 'File berhasil diunggah');
        }

        return redirect()->route('account')->with('error', 'Terjadi kesalahan saat mengunggah file');
    }
}
