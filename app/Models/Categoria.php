<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['name', 'order'];

    protected $casts = [
        'order' => 'integer',
    ];

    public function produtos()
    {
        return $this->hasMany(Produto::class, 'category_id');
    }
}
