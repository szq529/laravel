<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // protected $fillable = ['id', 'category', 'color', 'parts', 'purchase_date'];
    // protected $table = 'items';
    public function getData()
    {
        // $items = Item::all();
        return $this->id . ':' . $this->category . '(' . $this->color  . ')';
    }

    // public function scopeColorEqual($query, $str)
    // {
    //     return $query->where('color', $str);
    // }

    // public function scopeColorEqual($query, $str)
    // {
    //     return $query->where('color', $str);
    // }
}
