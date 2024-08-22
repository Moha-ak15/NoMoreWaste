<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commercant extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_commercant';
    protected $tab = 'commercants';
    protected $fillable = [
        'nom', 'adresse', 'email', 'telephone', 'date_adhesion', 'date_renouvellement'
    ];

    public function collectes()
    {
        return $this->hasMany(Collecte::class, 'commercant_id', 'commercant_id');
    }
    
}
