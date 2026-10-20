<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;

class CatalogController extends Controller
{
    public function getIndex(){
        $catalogs = Catalog::all();
        return view('catalog_all', compact('catalogs'));
    }
    public function getOne(Catalog $catalog){
        return view('catalog_one', compact('catalog'));
    }
}
