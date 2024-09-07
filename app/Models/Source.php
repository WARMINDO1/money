<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'time',
        'is_final',
    ];

    public function currency_pairs()
    {
        return $this->hasMany(CurrencyPair::class);
    }
}
