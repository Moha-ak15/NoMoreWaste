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
        'commercant_id', 'date_collecte', 'quantite_collectee', 'produit_id'
    ];

    public function commercant()
    {
        return $this->belongsTo(Commercant::class, 'commercant_id', 'commercant_id');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id', 'produit_id');
    }
}
