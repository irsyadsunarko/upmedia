<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Comments;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CategoriesController extends Controller
{
    public function index()
    {
        // Retrieve a session
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();
        $categories = Categories::get();

        if($user){
            return view('categories', ['user' => $user, 'categories' => $categories]);
        } else {
            return redirect('/login')->with('error',"Anda belum login");
        }
    }

    public function addcategories()
    {
        // Retrieve a session
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();

        if($user){
            return view('addcategories', ['user' => $user]);
        } else {
            return redirect('/login')->with('error',"Anda belum login");
        }
    }

    
    public function edit($id)
    {
        // Retrieve a session
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();
        $categories = Categories::where('id', $id)->first();

        if($user){
            return view('editcategories', ['user' => $user, 'categories' => $categories]);
        } else {
            return redirect('/login')->with('error',"Anda belum login");
        }
    }

    public function store(Request $request)
    {
        // Retrieve a cookie
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();

        if($user){
            $request->validate([
                'categories_name' => 'required',
                'categories_image' => 'required',
                // tambahkan validasi lainnya sesuai kebutuhan
            ]);

            $file = $request->file('categories_image');

            // Pastikan file ada dan valid
            if ($file && $file->isValid()) {
                // Simpan file ke penyimpanan 'public' dengan nama yang dihasilkan secara unik
                $path = $file->store('public/categories');

                // Dapatkan nama file dari $path
                $fileName = basename($path);
            }
    
            $category = new Categories([
                'categories_name' => $request->get('categories_name'),
                'categories_image' => $fileName,
            ]);
    
            $category->save();

            // Set pesan flash success
            $request->session()->flash('success', 'Category berhasil disimpan!');
    
            return redirect()->route('addcategories'); // Sesuaikan dengan nama rute yang ingin Anda gunakan setelah menyimpan data
        } else {
            return redirect('/login')->with('error',"Anda belum login");
        }
    }

    public function update(Request $request)
    {
        // Retrieve a cookie
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();

        if($user){
            $request->validate([
                'categories_name' => 'required',
                // tambahkan validasi lainnya sesuai kebutuhan
            ]);

            $file = $request->file('categories_image');

            // Pastikan file ada dan valid
            if ($file && $file->isValid()) {
                // Simpan file ke penyimpanan 'public' dengan nama yang dihasilkan secara unik
                $path = $file->store('public/categories');

                // Dapatkan nama file dari $path
                $fileName = basename($path);
    
                Categories::where('id',$request->id)->update([
                    'categories_name' => $request->get('categories_name'),
                    'categories_image' => $fileName,
                ]);
            } else {    
                Categories::where('id',$request->id)->update([
                    'categories_name' => $request->get('categories_name'),
                ]);
            }

            // Set pesan flash success
            $request->session()->flash('success', 'Categories berhasil disimpan!');
    
            return redirect()->route('categories'); // Sesuaikan dengan nama rute yang ingin Anda gunakan setelah menyimpan data
        } else {
            return redirect('/login')->with('error',"Anda belum login");
        }
    }
    public function delete($categoryId)
    {
        // Retrieve a cookie
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();
        Categories::where('id',$categoryId)->delete();

        if($user){
            return redirect('/categories');
        } else {
            return redirect('/login')->with('error',"Anda belum login");
        }

        // Kirim data pengguna ke view
        
    }
}
