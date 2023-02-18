<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Food;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;
    // use HasFactory;

    protected $guarded = ['id'];

    public function food(){
        return $this->hasOne(Food::class, 'id','food_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function getCreatedAtAccessor($value){
        return Carbon::parse($value)->timestamp;
    }

    public function getUpdatedAtAccessor($value){
        return Carbon::parse($value)->timestamp;
    }
}
