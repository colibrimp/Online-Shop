<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::paginate(3);
        return view('products.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        $products = Product::all();
        return view('products.create_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

   
    public function store(Request $request)
    {

        //ВАЛИДАЦИЯ 
        $request->validate([
            'title' => 'required',
            'image' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        // данные текста
        $products = new Product();
        $products->title = $request->input('title');
        $products->price = $request->input('price');
        $products->description = $request->input('description');

        //  картинка
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/products/', $filename);
            $products->image = $filename;
        }

        $products->save();
        return redirect('/product')->with('success', 'Товар успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $products = Product::find($id);
        return view('products.show_product', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $products = Product::find($id);
        return view('products.edit_product', [
            'products' => $products
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $products = Product::find($id);

        $products->title = $request->input('title');
        $products->price = $request->input('price');
        $products->description = $request->input('description');

        // обновление картинки
        if ($request->hasFile('image')) {

            $destination = 'uploads/products/' . $products->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/products/', $filename);
            $products->image = $filename;
        }

        $products->update();
        return redirect('/product')->with('success', 'Товар успешно Обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $products = Product::find($id);
        $products->delete();

        return redirect('/product')->with('success', 'Товар удален!');
    }
}
