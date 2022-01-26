<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = ['user_id','user_name', 'punchIn', 'punchOut','month','day','breakIn','breakOut','workTime','year','id','name'];
    

    
    public function scopeGetMonthAttendance($query,$month) {
        return $query->where('month',$month);
    }

    
    public function scopeGetDayAttendance($query,$day) {
        return $query->where('day',$day);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    use HasFactory;
}
