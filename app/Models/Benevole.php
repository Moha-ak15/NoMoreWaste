<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benevole extends Model
{
    use HasFactory;

    protected $primaryKey = 'benevole_id';
    protected $table = 'benevoles';

    protected $fillable = [
        'nom', 'prenom', 'email', 'telephone', 'date_inscription', 'disponibilite'
    ];

    public function collecte(){
        return $this->belongsToMany(Collecte::class, 'benevole_collecte', 'benevole_id', 'collecte_id');
    }

    public function skillBenevole()
    {
        return $this->hasMany(skillBenevole::class, 'benevole_id', 'benevole_id');
    }

    public function tournees()
    {
        return $this->belongsToMany(Tournee::class, 'inscriptions_benevoles', 'benevole_id', 'tournee_id');
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'benevoles_services', 'benevole_id', 'service_id');
    }
}
