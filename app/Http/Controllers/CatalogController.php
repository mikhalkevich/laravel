<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogController extends Controller
{
    public function getIndex(){
        $catalogs = Catalog::all();
        $products = Product::all();
        return view('catalog_all', compact('catalogs', 'products'));
    }
    public function getOne(Catalog $catalog){
        return view('catalog_one', compact('catalog'));
    }
}
