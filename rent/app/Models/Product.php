<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'status',
        'product_type',
        'category_id', // Adjusted field name to match the column in the database
        'image1',
        'image2',
        'image3',
    ];

    public function lessor()
    {
        return $this->belongsTo(Lessor::class);
    }
}
