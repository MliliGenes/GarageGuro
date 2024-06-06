<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
    protected $fillable = [
        'repairID',
        "amount",
        'additionalCharges',
        'totalAmount'
    ];

    public function reparation()
    {
        return $this->belongsTo(Reparation::class, 'repairID');
    }
}