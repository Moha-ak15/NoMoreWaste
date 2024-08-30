<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePlanning extends Model
{
    use HasFactory;

    protected $table = 'service_plannings';
    protected $primaryKey = 'planning_id';
    protected $fillable = [
        'service_id', 'date_debut', 'date_fin', 'lieu'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'service_id');
    }
}
