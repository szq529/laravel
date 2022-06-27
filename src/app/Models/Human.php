<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    use HasFactory;
    // protected $table = 'Humans';
    // protected $fillable = ['id'];
    public function getData()
    {
        //     $items = Item::all();
        return $this->id . ':' . $this->name . '(' . $this->age  . ')';
    }

    // ローカルスコープを設定
    public function scopeidEqual($query, $str)
    {
        return $query->where('id', $str);
    }
}
