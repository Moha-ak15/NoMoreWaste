<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produit extends Model
{
    use HasFactory;

    protected $primaryKey = 'produit_id';
    protected $table = 'produits';
    protected $fillable = [
        'code_barre', 'nom', 'categorie', 'date_peremption', 'quantite', 'commercant_id'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($produit) {
            if (empty($produit->code_barre)) {
                $produit->code_barre = self::generateUniqueCodeBarres();
            }
        });
    }

    private static function generateUniqueCodeBarre()
    {
        do {
            $code_barre = Str::random(12); // Génère une chaîne aléatoire de 12 caractères
        } while (self::where('code_barre', $code_barre)->exists());

        return $code_barre;
    }


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


