<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        // return view('pages.index', compact('products'));
        return view('pages.index')-> with ('products', $products);
    }

    public function create()
    {
        return view('pages.create');
    }

    public function store(Request $request)
    {
        $product = new Product;

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $request->image;

        $product->save();

        return redirect('/products');
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('pages.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('pages.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->image = $request->image;

        $product->save();

        return redirect('/products');
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect('/products');
    }
}