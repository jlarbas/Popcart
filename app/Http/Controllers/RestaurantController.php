<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restaurants.index', [
            
            'restaurants' => Restaurant::latest()->filter(request(['search']))->paginate(4)
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restaurants.create');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = $request->validate([
            'name'=>'required',
            'status'=>'required',
            'address'=>'required',
            'contact'=>'required',
        ]);
        //If the form has a file attached then store the file in the db
        if($request->hasFile('picture')){
            $form['picture'] = $request->file('picture')->store('pictures','public');
        }
        //Stores the entry to the db 
        Restaurant::create($form);
        

        return redirect()->route('home')->with('message','Restaurant created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        $data = Order::where('restaurant_id',$restaurant->id)->whereDate('created_at', Carbon::today())
                   ->sum('total');
        $week = Order::where('restaurant_id',$restaurant->id)->whereDate('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->sum('total');
        
        return view('restaurants.show', compact('restaurant','data','week'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        return view('restaurants.edit', ['restaurant' => $restaurant]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $form = $request->validate([
            'name'=>'required',
            'status'=>'required',
            'address'=>'required',
            'contact'=>'required',
        ]);
        //If the form has a file attached then store the file in the db
        if($request->hasFile('picture')){
            $form['picture'] = $request->file('picture')->store('pictures','public');
        }
        //Stores the entry to the db 
        $restaurant->update($form);
        

        return back()->with('message','Restaurant updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
        $restaurant->delete();
        return redirect()->route('home')->with('message','Restaurant deleted successfully!');
    }

    public function staff()
    {
        return view('restaurants.staff', [
            
            'restaurants' => Restaurant::latest()->filter(request(['search']))->paginate(4)
        ]);
        
    }

    public function day(){
        
      }
   
}
