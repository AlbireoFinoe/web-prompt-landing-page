<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesPage extends Model
{
    use HasFactory;

    // Tambahkan 'theme' ke dalam array ini!
    protected $fillable = [
        'user_id',
        'product_name',
        'product_description',
        'generated_content',
        'theme', 
    ];

    // Beri tahu Laravel kalau generated_content itu formatnya array/json
    protected $casts = [
        'generated_content' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}