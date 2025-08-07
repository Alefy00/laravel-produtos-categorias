<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['name', 'price', 'category_id', 'show_in_showcase'];

    protected $casts = [
        'price' => 'decimal:2',
        'show_in_showcase' => 'boolean',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'category_id');
    }
}
