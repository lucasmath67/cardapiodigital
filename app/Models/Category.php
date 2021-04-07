<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use HasFactory;
    protected $fillable = [
        'name', 'order', 'photo'
    ];

    public function products()
    {

        return $this->hasMany(Product::class);
    }
}
