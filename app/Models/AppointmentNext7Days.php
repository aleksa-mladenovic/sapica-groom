<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentNext7Days extends Model
{
    use HasFactory;

    protected $table = "view_appointment_next7_days";

    public function dog()
    {
        return $this->belongsTo(Dog::class, 'dog_id', 'id');
    }
}
