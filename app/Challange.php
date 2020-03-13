<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Challange extends Model
{
     protected $fillable = [
        'title',
        'status',
        'description',

    ];
    protected $dates = ['deadline'];
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
    public function code()
    {
        return $this->hasMany(Code::class);
    }
}
