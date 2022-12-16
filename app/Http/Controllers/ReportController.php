<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderList;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    
    //
    public function index(Restaurant $restaurant){
        return view('reports.index', [
            
            'restaurants' => Restaurant::latest()->filter(request(['search']))->paginate(4)
        ]);
        
    }

    public function display(Order $order){
        return view ('reports.display',compact('order'));
    }

    public function show(Restaurant $restaurant)
    {
        $start = Carbon::now()->subWeek()->startOfWeek();
        $end = Carbon::now()->subWeek()->endOfWeek();
        $med = Carbon::now()->subDays(7);
        $high = Carbon::now()->subDays(30);
        //Sales Queries//
        //Daily Sales//
        $data = Order::where('restaurant_id',$restaurant->id)
        ->whereDate('created_at', Carbon::today())
        ->sum('total');
        
        //Weekly Sales//
        $week = Order::where('restaurant_id',$restaurant->id)
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(Carbon::SUNDAY), Carbon::now()->endOfWeek(Carbon::SATURDAY)])
        ->sum('total');
        //Last Week Sales//
        $lastweek = Order::where('restaurant_id',$restaurant->id)
        ->whereBetween('created_at', [$start, $end])
        ->sum('total');

        //Total Sales and Count of Product Purchase//
        $products = OrderList::where('restaurant_id', $restaurant->id)
        ->groupBy('product_name')
        ->select([
        'order_lists.id',
        'order_lists.product_name',
        DB::raw('sum(order_lists.quantity) AS purchases'),
        DB::raw('(sum(order_lists.price)) AS sales'),
        ])
        ->get();

        //Daily Total Sales and Count
        $day = OrderList::where('restaurant_id', $restaurant->id)
        ->whereDate('created_at', Carbon::today())
        ->groupBy('product_name')
        ->select([
        'order_lists.id',
        'order_lists.product_name',
        DB::raw('sum(order_lists.quantity) AS purchases'),
        DB::raw('(sum(order_lists.price)) AS sales'),
        ])
        ->get();

        $meddata = OrderList::where('restaurant_id', $restaurant->id)
        ->whereDate('created_at','>=', $med)
        ->groupBy('product_name')
        ->select([
        'order_lists.id',
        'order_lists.product_name',
        DB::raw('sum(order_lists.quantity) AS purchases'),
        DB::raw('(sum(order_lists.price)) AS sales'),
        ])
        ->get();
        
        $highdata = OrderList::where('restaurant_id', $restaurant->id)
        ->whereDate('created_at','>=', $high)
        ->groupBy('product_name')
        ->select([
        'order_lists.id',
        'order_lists.product_name',
        DB::raw('sum(order_lists.quantity) AS purchases'),
        DB::raw('(sum(order_lists.price)) AS sales'),
        ])
        ->get();
       

        return view('reports.show', compact(
            'restaurant',
            'data',
            'week',
            'products',
            'day',
            'lastweek',
            'meddata',
            'highdata'
        ));
    }

    public function purchaseHistory(Request $request, Restaurant $restaurant){
        
        $today = Carbon::today()->format('Y-m-d');
        
        // $order = Order::when($request->date != null, function($q) use($request){
        //     return $q->whereDate('created_at',$request->date);
        // })
        // ->whereDate('created_at', $today)
        // ->get();
        $order = Order::when($request->date != null, function($q) use($request){
            return $q->whereDate('created_at',$request->date);
        },function($q) use ($today){
            return $q->whereDate('created_at',$today);
        })->where('restaurant_id',$restaurant->id)
        ->where('status','completed')
        ->get();
       
        
        return view('reports.sale',compact('order'));
    }

    
}