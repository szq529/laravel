<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // use HasFactory;

    public function getData()
    {
        return $this->id . ':' . $this->color . '(' . $this->parts  . ')';
    }

    // ローカルスコープを設定
    // public function scopeColorEqual($query, $str)
    // {
    //     return $query->where('color', $str);
    // }
}
