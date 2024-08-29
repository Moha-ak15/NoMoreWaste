<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collecte extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_collecte';
    protected $table = 'collectes';

    protected $fillable = [
        'date_collecte', 'statut_collecte', 'quantite_collectee', 'commercant_id', 'produit_id'
    ];

    public function commercant()
    {
        return $this->belongsTo(Commercant::class, 'commercant_id');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id', 'produit_id');
    }

    public function benevoles(){
        return $this->belongsToMany(Benevole::class, 'benevole_collecte', 'collecte_id', 'benevole_id');
    }

    public function vehicules()
    {
        return $this->belongsToMany(Vehicule::class, 'collecte_vehicule', 'collecte_id', 'vehicule_id');
    }
}
