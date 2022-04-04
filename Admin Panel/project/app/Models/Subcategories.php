<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    use HasFactory;
    protected $table = 'subcategories';

    protected $fillable = [
        'category_id',
        'subcategory',
    ];

    public function getCategoryName() {
        return $this->hasOne('App\Models\Categories', 'id', 'category_id')->first();
    }
}
