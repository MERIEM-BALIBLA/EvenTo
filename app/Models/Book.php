<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'event_id', 'reserve'];

    // protected $attributes = [
    //     'automatic' => true, // Définir automatic par défaut sur true
    // ];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::creating(function ($reservation) {
            if ($reservation->automatic) {
                $reservation->reserve = 'accepted';
            }
        });
    }
    
    
    
}
