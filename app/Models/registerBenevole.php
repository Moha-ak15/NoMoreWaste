<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registerBenevole extends Model
{
    use HasFactory;

    protected $table = 'registration_benevoles';

    protected $fillable = [
        'benevole_id', 'tournee_id', 'role'
    ];

    public function benevole()
    {
        return $this->belongsTo(Benevole::class, 'benevole_id');
    }

    public function tournee()
    {
        return $this->belongsTo(Tournee::class, 'tournee_id');
    }
}
