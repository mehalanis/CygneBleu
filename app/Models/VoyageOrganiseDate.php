<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VoyageOrganise;
use App\Models\VoyageOrganiseReservation;
class VoyageOrganiseDate extends Model
{
    use HasFactory;
    protected $fillable = ['id',"voyage_organise_id","depart","retour","max_personne"];
    protected $dates = [
        'depart',"retour"
    ];
  
    public function VoyageOrganise(){
        return $this->belongsTo(VoyageOrganise::class);
    }
    public function VoyageOrganiseReservation(){
        return $this->hasMany(VoyageOrganiseReservation::class);
    }
}
