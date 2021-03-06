<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'serial_number'];


    public function category() {

        return $this->belongsTo('App\Category');
    }
}
