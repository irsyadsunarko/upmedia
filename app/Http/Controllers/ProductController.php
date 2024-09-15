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

class ProductController extends Controller
{
    public function index()
    {
        // Retrieve a session
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();
        $categories = Categories::get();

        if($user){
            return view('addproduct', ['user' => $user, 'categories' => $categories]);
        } else {
            return redirect('/login')->with('error',"Anda belum login");
        }
    }

    
    public function edit($id)
    {
        // Retrieve a session
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();
        $product = Product::where('id', $id)->first();
        $categories = Categories::get();

        if($user){
            return view('editproduct', ['user' => $user, 'product' => $product, 'categories' => $categories]);
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
                'product_name' => 'required',
                'product_picture' => 'required',
                'product_description' => 'required',
                'created_by' => 'required',
                // tambahkan validasi lainnya sesuai kebutuhan
            ]);

            $file = $request->file('product_picture');

            // Pastikan file ada dan valid
            if ($file && $file->isValid()) {
                // Simpan file ke penyimpanan 'public' dengan nama yang dihasilkan secara unik
                $path = $file->store('public/product');

                // Dapatkan nama file dari $path
                $fileName = basename($path);
            }
    
            $product = new Product([
                'product_name' => $request->get('product_name'),
                'product_picture' => $fileName,
                'product_categories' => $request->get('product_categories'),
                'product_description' => $request->get('product_description'),
                'created_by' => $request->get('created_by'),
            ]);
    
            $product->save();

            // Set pesan flash success
            $request->session()->flash('success', 'Product berhasil disimpan!');
    
            return redirect()->route('addproduct'); // Sesuaikan dengan nama rute yang ingin Anda gunakan setelah menyimpan data
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
                'product_name' => 'required',
                'product_description' => 'required',
                'created_by' => 'required',
                // tambahkan validasi lainnya sesuai kebutuhan
            ]);

            $dataproduct = Product::where('id',$request->product_id);

            $file = $request->file('product_picture');

            // Pastikan file ada dan valid
            if ($file && $file->isValid()) {
                // Simpan file ke penyimpanan 'public' dengan nama yang dihasilkan secara unik
                $path = $file->store('public/product');

                // Dapatkan nama file dari $path
                $fileName = basename($path);
    
                Product::where('id',$request->product_id)->update([
                    'product_name' => $request->get('product_name'),
                    'product_picture' => $fileName,
                    'product_description' => $request->get('product_description'),
                    'product_categories' => $request->get('product_categories'),
                    'created_by' => $request->get('created_by'),
                ]);
            } else {
    
                Product::where('id',$request->product_id)->update([
                    'product_name' => $request->get('product_name'),
                    'product_description' => $request->get('product_description'),
                    'product_categories' => $request->get('product_categories'),
                    'created_by' => $request->get('created_by'),
                ]);
            }

            // Set pesan flash success
            $request->session()->flash('success', 'Product berhasil disimpan!');
    
            return redirect()->route('singleproduct', ['id' => $request->product_id]); // Sesuaikan dengan nama rute yang ingin Anda gunakan setelah menyimpan data
        } else {
            return redirect('/login')->with('error',"Anda belum login");
        }
    }
    public function singleproduct($productId)
    {
        $product = Product::find($productId);
        // Retrieve a cookie
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();
        $categories = Categories::where('id', $product->product_categories)->first();
        $comments = Comments::latest()->where('product_id', $productId)->get();

        if($user){
            if (!$product) {
                return redirect('/')->with('error', 'Resep Tidak ditemukan');
            }
            return view('singleproduct', ['product' => $product,'user' => $user,'categories'=> $categories, 'comments' => $comments]);
        } else {
            return redirect('/login')->with('error',"Anda belum login");
        }

        // Kirim data pengguna ke view
        
    }

    public function submitComment(Request $request)
    {
        $productId = $request->input('product_id');
        $commentText = $request->input('comment');

        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();

        if ($user) {
            $comment = new Comments([
                'name' => $user->name,
                'profile_pic' => $user->profile_pic,
                'comment' => $commentText,
                'product_id' => $productId,
            ]);

            $comment->save();

            return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
        } else {
            return redirect('/login')->with('error', 'Anda belum login');
        }
    }

    public function delete($productId)
    {
        // Retrieve a cookie
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();
        Product::where('id',$productId)->delete();

        if($user){
            return redirect('/');
        } else {
            return redirect('/login')->with('error',"Anda belum login");
        }

        // Kirim data pengguna ke view
        
    }
}
