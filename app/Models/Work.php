<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $table = 'works';
    protected $fillable = [
        'dog_id',
        'title',
        'slug',
        'status',
        'image1',
        'image2',
        'image3',
        'image4',
        'description',
    ];

    public function dog()
    {
        return $this->belongsTo(Dog::class, 'dog_id', 'id');
    }
}
