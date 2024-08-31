<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'service_id';

    protected $fillable = [
        'nom', 'description', 'statut'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'service_user', 'service_id', 'user_id')->withTimestamps();
    }

    public function benevoles()
    {
        return $this->belongsToMany(Benevole::class, 'benevoles_services', 'service_id', 'benevole_id');
    }

    public function proposals()
    {
        return $this->hasMany(ServiceProposal::class, 'service_id', 'service_id');
    }

    public function plannings()
    {
        return $this->hasMany(ServicePlanning::class, 'service_id', 'service_id');
    }
}
