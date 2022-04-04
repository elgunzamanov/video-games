<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table = 'sales';
    public $timestamps = true;
    protected $guarded = [];

    public function getGameInfo() {
        return $this->hasOne('App\Models\Games', 'id', 'game_id')->first();
    }
}
