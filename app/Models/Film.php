<?php

namespace App\Models;

use App\Observers\FilmObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'year',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public static function boot(): void
    {
        parent::boot();

        self::observe(FilmObserver::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genres');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'film_actors');
    }
}
