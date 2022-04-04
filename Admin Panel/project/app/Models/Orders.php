<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public $timestamps = true;
    protected $guarded = [];

    public function getCustomerName() {
        return $this->hasOne('App\Models\Customers', 'id', 'customer_id')->first();
    }
}
