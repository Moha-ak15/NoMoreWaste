<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournee extends Model
{
    use HasFactory;

    protected $table = 'tournees';
    protected $primaryKey = 'tournee_id';

    protected $fillable = [
        'date_tournee', 'destination', 'responsable'
    ];

    public function stocks()
    {
        return $this->belongsToMany(Stock::class, 'tournees_stocks', 'tournee_id', 'stock_id');
    }

    public function benevoles()
    {
        return $this->belongsToMany(Benevole::class, 'registration_benevoles', 'tournee_id', 'benevole_id');
    }


}
