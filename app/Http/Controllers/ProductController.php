<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProductController extends Controller
{
    public function ProductList() {
        $products = Produto::all(); // Retrieve all products from the database
        return view('products.list', ['produtos' => $products]); // Pass data to the view
    }
}
