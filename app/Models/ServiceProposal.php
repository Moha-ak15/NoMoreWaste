<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProposal extends Model
{
    use HasFactory;

    protected $table = 'service_proposals';
    protected $primaryKey = 'proposal_id';
    protected $fillable = [
        'proposeur', 'nom', 'description', 'statut', 'user_id'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
