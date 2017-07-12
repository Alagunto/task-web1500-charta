<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        "text", "name"
    ];

    public function charta() {
        return $this->belongsTo(Charta::class);
    }
}
