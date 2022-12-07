<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;

    //Search
    public function scopeFilter($query,array $filters){
        if($filters['search'] ?? false){
            $query->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('status', 'like', '%' . request('search') . '%');
        }
    }

    protected $fillable = [
        'name',
        'status',
        'picture',
        'address',
        'contact',
    ];

    public function users(){
        return $this->hasMany(User::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }
    public function order(){
        return $this->hasMany(Order::class);
    }


}

