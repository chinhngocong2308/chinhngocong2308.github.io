<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
     public $timesstamps = false;
   protected $fillable = [
   		'shipping_name','shipping_address','shipping_phone','shipping_email','shipping_method','shipping_desc','created_at',
   ];
   protected $primaryKey = 'shipping_id';
   protected $table = 'tbl_shipping';
}
