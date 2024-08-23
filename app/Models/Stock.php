<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $table = 'stocks';
    protected $primaryKey = 'stock_id';

    protected $fillable = [
        'produit_id', 'quantite_disponible', 'date_entree_stock'
    ];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id', 'produit_id');
    }

    public function tournees()
    {
        return $this->belongsToMany(Tournee::class, 'tournees_stocks', 'stock_id', 'tournee_id');
    }
}
