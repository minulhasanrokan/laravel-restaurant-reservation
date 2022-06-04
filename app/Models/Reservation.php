<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable =[
        'fast_name',
        'last_name',
        'email',
        'mobile',
        'res_date',
        'guest_number',
        'table_id',
        'status',
        'available_status'

    ];

    protected $dates =[

        'res_date'
    ];

    public function table(){
        return $this->belongsTo(Resarvation::class);
    }
}
