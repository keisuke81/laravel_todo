<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['content','created_at','updated_at'];

    public static $rules =array(
        'content' =>'required|min:1|max:191',
    );
}
