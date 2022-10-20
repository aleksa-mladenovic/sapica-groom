<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'appointments';
    protected $fillable =[
        'dog_id',
        'user_id',
        'start',
        'finish',
        'type',
    ];

    public function dog()
    {
        return $this->belongsTo(Dog::class, 'dog_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
