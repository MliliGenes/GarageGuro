<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'status',
        'startDate',
        'endDate',
        'mechanicNotes',
        'clientNotes',
        'mechanicID',
        'vehicleID',
    ];

    public function mechanic()
    {
        return $this->belongsTo(User::class, 'mechanicID');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicleID');
    }

    public function factures()
    {
        return $this->hasMany(Facture::class, 'repairID');
    }
}