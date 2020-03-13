<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    public function challange()
    {
        return $this->belongsTo(challange::class);
    }
}
