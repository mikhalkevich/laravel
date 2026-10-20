<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function getIndex(Product $product){
        return view('product', compact('product'));
    }
}
