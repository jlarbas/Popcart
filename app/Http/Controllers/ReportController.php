<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderList;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class ReportController extends Controller
{

    //
    public function index(Restaurant $restaurant){
        if(auth()->user()->role_id != 1){
            abort(404);
        }
        return view('reports.index', [
            
            'restaurants' => Restaurant::latest()->filter(request(['search']))->paginate(4)
        ]);
        
    }

    public function display(Order $order){
        if(auth()->user()->role_id != 1){
            abort(404);
        }
        return view ('reports.display',compact('order'));
    }

    public function show(Restaurant $restaurant)
    {
        $startm = Carbon::now()->subWeek()->startOfMonth();
        $endm = Carbon::now()->subWeek()->startOfMonth();
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

        $seven = Order::where('restaurant_id',$restaurant->id)
        ->whereDate('created_at', [Carbon::now()->subDays(7)])
        ->sum('total');

        $thirty = Order::where('restaurant_id',$restaurant->id)
        ->whereDate('created_at', [Carbon::now()->subDays(30)])
        ->sum('total');

        //Last Week Sales//
        $lastweek = Order::where('restaurant_id',$restaurant->id)
        ->whereBetween('created_at', [$start, $end])
        ->sum('total');

        $month = Order::where('restaurant_id',$restaurant->id)
        ->whereBetween('created_at', [$startm, $endm])
        ->sum('total');

        // $chart= Order::select(DB:raw("SUM(total) as sum"),DB::raw("MONTHNAME(created_at) as month_name"))
        // ->where('restaurant_id',$restaurant->id)
        // ->whereYear('created_at',date('Y'))
        // ->groupBy(DB::raw("Month(created_at")) 
        // ->pluck('sum','month');


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
       
        if(auth()->user()->role_id != 1){
            abort(404);
        }    
        return view('reports.show', compact(
            'restaurant',
            'data',
            'week',
            'products',
            'day',
            'lastweek',
            'meddata',
            'highdata',
            'seven',
            'thirty',
            'month',
        ));
    }

    public function purchaseHistory(Request $request, Restaurant $restaurant){
        
        $today = Carbon::today()->format('Y-m-d');
        
        $pass = $restaurant->id;
        $order = Order::when($request->date != null, function($q) use($request){
            return $q->whereDate('created_at',$request->date);
        },function($q) use ($today){
            return $q->whereDate('created_at',$today);
        })->where('restaurant_id',$restaurant->id)
        ->where('status','completed')
        ->get();
       
        if(auth()->user()->role_id != 1){
            abort(404);
        }
        return view('reports.sale',compact('order','pass'));
    }

    public function customDate(Request $request, Restaurant $restaurant){
        
        $today = Carbon::today()->format('Y-m-d');
    
        $order = Order::whereBetween('created_at',[$request->dateone,$request->datetwo])
        ->where('restaurant_id',$restaurant->id)
        ->where('status','completed')
        ->get();
       
        if(auth()->user()->role_id != 1){
            abort(404);
        }
        return view('reports.history',compact('order'));
    }

    public function sales(Request $request, Restaurant $restaurant){
        
        $today = Carbon::today()->format('Y-m-d');
        $pass = $restaurant->id;
        $data = Order::when($request->date != null, function($q) use($request){
            return $q->whereDate('created_at',$request->date);
        },function($q) use ($today){
            return $q->whereDate('created_at',$today);
        })->where('restaurant_id',$restaurant->id)
        ->where('status','completed')
        ->sum('total');

        $products = OrderList::when($request->date != null, function($q) use($request){
            return $q->whereDate('created_at',$request->date);
        },function($q) use ($today){
            return $q->whereDate('created_at',$today);
        })
        ->where('restaurant_id', $restaurant->id)
        ->groupBy('product_name')
        ->select([
        'order_lists.id',
        'order_lists.product_name',
        DB::raw('sum(order_lists.quantity) AS purchases'),
        DB::raw('(sum(order_lists.price)) AS sales'),
        ])
        ->get();

        if(auth()->user()->role_id != 1){
            abort(404);
        }
        return view('reports.salesHistory',compact('data','pass','products'));
    }

    public function customSale(Request $request, Restaurant $restaurant){
        
        $products = OrderList::whereBetween('created_at',[$request->dateone,$request->datetwo])
        ->where('restaurant_id', $restaurant->id)
        ->groupBy('product_name')
        ->select([
        'order_lists.id',
        'order_lists.product_name',
        DB::raw('sum(order_lists.quantity) AS purchases'),
        DB::raw('(sum(order_lists.price)) AS sales'),
        ])
        ->get();

        $data = Order::whereBetween('created_at',[$request->dateone,$request->datetwo])
        ->where('restaurant_id',$restaurant->id)
        ->where('status','completed')
        ->sum('total');
       
        if(auth()->user()->role_id != 1){
            abort(404);
        }
        return view('reports.customSale',compact('data','products'));
    }
    
}

