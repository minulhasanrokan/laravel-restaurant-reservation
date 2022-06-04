<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'image',
        'description',
        'status',
        'is_deleted'
    ];

    public function menus(){
        return $this->belongsTomany(Menu::class,'category_menu');
    }
}
 