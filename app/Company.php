<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];
    
    public function employees(){
        return $this->hasMany(Employee::class)->orderBy('created_at','desc');
    }
}
