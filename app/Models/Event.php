<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable= ['name','description','eventtype_od','locationname','address','register_link','city_id','city','starttime','endtime','photoroute'];
}
