<?php

namespace App\Models\delivery;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryStatus extends Model
{
    protected $table = 'delivery_status';

    public $timestamps = false;
    protected $fillable = ['id','uid','name', 'status', 'create_by', 'create_date', 'update_by', 'update_date'];
}
