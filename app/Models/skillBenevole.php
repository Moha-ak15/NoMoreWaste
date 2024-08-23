<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skillBenevole extends Model
{
    use HasFactory;

    protected $table = 'skills_benevoles';

    protected $fillable = [
        'benevole_id', 'competence'
    ];

    public function benevole()
    {
        return $this->belongsTo(Benevole::class, 'benevole_id', 'benevole_id');
    }


}
