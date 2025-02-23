<?php

// app/Models/Event.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Relasi dengan model Registration (Event bisa memiliki banyak Registration)
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }

    // Relasi dengan model User (Admin yang membuat event)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
