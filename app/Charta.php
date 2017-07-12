<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charta extends Model
{
    protected $fillable = [
        "title", "text", "user_id"
    ];

    public function reports() {
        return $this->hasMany(Report::class);
    }

    public function signs() {
        return $this->hasMany(ChartaSign::class);
    }
}
