<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wards extends Model
{
     public $timesstamps = false;
   protected $fillable = [
   		'name_xaphuongthitran','type','maqh',
   ];
   protected $primaryKey = 'xaid';
   protected $table = 'tbl_xaphuongthitran';
}
