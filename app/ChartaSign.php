<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartaSign extends Model
{
    protected $fillable = [
        "text", "name", "user_id"
    ];

    public function charta() {
        return $this->belongsTo(Charta::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
