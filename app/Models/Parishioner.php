<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parishioner extends Model
{
    use HasFactory;
    protected $fillable= ['lastname','firstname','doctype','docnumber','birthday','address','city_id','phonenumber'];
}
