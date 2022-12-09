<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InventoryTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'item_name',
        'quantity',
        'price',
        'measurement',
        'item_code',
        'quantity_used',
        'date_consumed',
        'description',
        'picture',
        ];
}
