<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $primaryKey = 'produit_id';
    protected $table = 'produits';
    protected $fillable = [
        'code_barres', 'nom', 'categorie', 'date_peremption', 'quantite', 'commercant_id'
    ];

    public function collectes()
    {
        return $this->hasMany(Collecte::class, 'produit_id', 'produit_id');
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'produit_id', 'produit_id');
    }

    public function commercant()
    {
        return $this->belongsTo(Commercant::class, 'commercant_id', 'commercant_id');
    }

}


