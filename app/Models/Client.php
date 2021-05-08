<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VoyageOrganiseReservation;
class Client extends Model
{
    use HasFactory;
    protected $fillable = ['id',"nom","prenom","adresse","telephone","is_whatsapp","is_viber","is_imo","email"];
    public function VoyageOrganiseReservation(){
        return $this->hasOne(VoyageOrganiseReservation::class);
    }
}
