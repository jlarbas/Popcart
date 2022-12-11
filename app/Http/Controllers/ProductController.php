<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return view('products.index', [
            'products' => Product::latest()->filter(request(['search']))->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $restaurants = Restaurant::all();
        return view('products.create',['restaurants'=>$restaurants]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name'=>'required',
            'price'=>'required',
        ]);
        
        
       

        //Stores the entry to the db 
        $data = new Product();

        $data->name = $request->input('name');
        $data->price = $request->input('price');
        $data->isAvailable = 1;
        $data->restaurant_id = $request->input('restaurant_id');
        //If the form has a file attached then store the file in the db
        if($request->hasFile('picture')){
            $data['picture'] = $request->file('picture')->store('pictures','public');
        }
        $data->save();

        //Product::create($form);
        

        return redirect()->route('home')->with('message','Product created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        $restaurants = Restaurant::all();
        return view('products.edit',compact('product','restaurants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        //
        $form = $request->validate([
            'name'=>'required',
            'price'=>'required',
            'restaurant_id'=>'required',
        ]);
        //If the form has a file attached then store the file in the db
        if($request->hasFile('picture')){
            $form['picture'] = $request->file('picture')->store('pictures','public');
        }
        //Stores the entry to the db 
        $product->update($form);
        

        return back()->with('message','Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->isAvailable = $request->isAvailable;
        $product->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}
