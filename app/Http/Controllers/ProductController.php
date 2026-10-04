<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(Request $req)
    {
        $formFields = [
            'name' => $req->input('name'),
            'price' => $req->input('price'),
            'stock' => $req->input('stock'),
            'description' => $req->input('description'),
            'image' => $req->input('image'),
        ];

        if ($req->hasFile('image')) {
            $formFields['image'] = $req->file('image')->store('product_images', 'public');
        }

        Product::create($formFields);

        return back();

    }
}
