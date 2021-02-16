<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
     public $timesstamps = false;
   protected $fillable = [
   		'info_map','info_image','info_contact',
   ];
   protected $primaryKey = 'info_id';
   protected $table = 'tbl_information';
}
