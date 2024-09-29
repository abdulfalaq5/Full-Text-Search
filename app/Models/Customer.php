<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function scopeSearch(Builder $query, string $keyword): Builder
    {
        // return $query->where('name', 'LIKE', "%{$keyword}%")
        //     ->orWhere('email', 'LIKE', "%{$keyword}%")
        //     ->orWhere('address', 'LIKE', "%{$keyword}%");

        //rata" 2,624.128ms

        return $query->whereFullText(['name', 'email', 'address'], $keyword);

        //rata" 3.056ms
    }
}
