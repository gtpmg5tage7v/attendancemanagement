<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded  = array('id');

    public static $rules = array (
        'name' => 'required',
        'title' => 'required',
        'message' => 'required',
    );
    
    use HasFactory;
}
