<?php

// app/Models/Registration.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    // Relasi dengan model Event (Setiap Registration terkait dengan satu Event)
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    // Relasi dengan model User (Setiap Registration terkait dengan satu User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
