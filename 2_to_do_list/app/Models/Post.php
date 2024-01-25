<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [ 'title','description','image','created_at','update_at','price',"address",'rating'];

    protected $dates= ['create_at'];
}
