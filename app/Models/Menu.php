<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'image',
        'description',
        'price',
        'is_deleted',
        'status',
    ];

    public function categories(){
        return $this->belongsTomany(Category::class,'category_menu');
    }
}
