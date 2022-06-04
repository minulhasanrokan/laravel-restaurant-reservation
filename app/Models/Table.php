<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'image',
        'description',
        'guest_number',
        'available_status',
        'status',
        'location',
        'is_deleted'
    ];

    public function resarvation(){
        return $this->hasMany(Resarvation::class);
    }
}
 