<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        // Retrieve a session
        $email = session('dapin_email'); 
        $user = User::where('email', $email)->first();

        if($user){
            $totalProducts = Product::count();
            $totalPages = ceil($totalProducts / 12);

            // Hitung startPage dan endPage
            $startPage = max(1 - 4, 1);
            $endPage = min(1 + 4, $totalPages);

            $products = Product::latest()->take(12)->get();
            return view('home', ['user' => $user, 'products' => $products, 'totalPages' => $totalPages,'currentPage' => "1",'startPage' => $startPage, 'endPage' => $endPage,'name' => "",]);
        } else {
            return redirect('/login');
        }
    }

    public function products($page)
{
    // Hitung berapa resep yang akan dilewati
    $offset = ($page - 1) * 12;

    // Retrieve a session
    $email = session('dapin_email'); 
    $user = User::where('email', $email)->first();

    $totalproducts = Product::count();
    $totalPages = ceil($totalproducts / 12);

    if($user){
        $products = Product::latest()->skip($offset)->take(12)->get();

        // Hitung startPage dan endPage
        $startPage = max($page - 4, 1);
        $endPage = min($page + 4, $totalPages);

        return view('home', [
            'user' => $user,
            'products' => $products,
            'totalPages' => $totalPages,
            'currentPage' => $page,
            'startPage' => $startPage,
            'endPage' => $endPage,
            'name' => "",
        ]);
    } else {
        return redirect('/login');
    }
}

public function productsname($name)
{
    $email = session('dapin_email'); 
    $user = User::where('email', $email)->first();

    if($user){
        $products = Product::where('product_name', 'like', "%{$name}%")->get();
        return view('home', ['user' => $user, 'products' => $products, 'currentPage' => "", 'name' => $name]);
    } else {
        return redirect('/login');
    }
}


}
