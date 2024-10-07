<?php

namespace App\Models\store;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = 'product_type';

    public $timestamps = false;
    protected $fillable = ['id', 'uid','name','status', 'create_by', 'create_date', 'update_by', 'update_date'];

}
