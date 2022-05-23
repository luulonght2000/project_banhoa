<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    // public function logout(Request $request)
    // {
    //     Session::flush();
    //     Auth::logout();
    //     return redirect()->route('welcome');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = ProductModel::orderBy('id', 'DESC')->paginate(12);
        $categories = CategoryModel::orderBy('id', 'DESC')->get();

        return view('home', ['products' => $products, 'categories' => $categories]);
    }

    public function productDetail($id)
    {
        $product = ProductModel::findOrFail($id);
        $categories = CategoryModel::orderBy('id', 'DESC')->get();
        return view('home.detail', ['product' => $product, 'categories' => $categories]);
    }

    public function blog()
    {
        $product = ProductModel::all();
        $categories = CategoryModel::orderBy('id', 'DESC')->get();
        return view('home.blog', ['product' => $product, 'categories' => $categories]);
    }

    public function contact()
    {
        $product = ProductModel::all();
        $categories = CategoryModel::orderBy('id', 'DESC')->get();
        return view('home.contact', ['product' => $product, 'categories' => $categories]);
    }
}
