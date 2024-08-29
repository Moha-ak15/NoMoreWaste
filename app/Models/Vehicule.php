<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;

    protected $primaryKey = 'vehicule_id';
    protected $table = 'vehicules';
    protected $fillable = [
        'immatriculation', 'marque', 'modele', 'type', 'capacite', 'statut'
    ];

    public function collectes()
    {
        return $this->belongsToMany(Collecte::class, 'collecte_vehicule', 'vehicule_id', 'collecte_id');
    }
}
