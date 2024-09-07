<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CurrencyPair extends Model
{
    use HasFactory;
    use SoftDeletes;

    // protected $dates = [
    //     'delete_at'
    // ];

    protected $fillable = [
        'id_currency',
        'id_source',
        'origin_code_currency',
        'destination_code_currency',
        'name_source',
        'rate_buy',
        'rate_sell',
        'time',
        'status'
    ];


    public function currencies()
    {
        return $this->belongsTo(Currency::class);
    }

    public function sources()
    {
        return $this->belongsTo(Source::class);
    }

    public function authorize()
    {
        return true;
    }
}
