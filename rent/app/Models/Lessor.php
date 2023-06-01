<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lessor extends Model
{
    use HasFactory;
    protected $table = 'lessors';

    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
    ];
    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
