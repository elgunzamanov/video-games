<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    public $timestamps = true;
    protected $guarded = [];

    public function getCountryName() {
        return $this->hasOne('App\Models\Countries', 'id', 'country_id')->first();
    }
}
