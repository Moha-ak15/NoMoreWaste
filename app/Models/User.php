<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'user_id';
    protected $table = 'users';

    protected $fillable = [ 'name', 'usertype', 'email', 'password',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'service_user', 'user_id', 'service_id')->withTimestamps();
    }

    public function collectes()
    {
        return $this->belongsToMany(Collecte::class, 'collecte_user', 'user_id', 'collecte_id')->withTimestamps();
    }

    public function tournees()
    {
        return $this->belongsToMany(Tournee::class, 'tournee_user', 'user_id', 'tournee_id')->withTimestamps();
    }

    public function commercant()
    {
        return $this->hasOne(Commercant::class, 'commercant_id');  // ou 'commercant_id' selon ta clé étrangère
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
