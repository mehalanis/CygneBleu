<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VoyageOrganiseReservation;
use App\Models\HotelReservation;
use App\Models\BilletReservation;
class Client extends Model
{
    use HasFactory;
    protected $fillable = ['id',"nom","prenom","adresse","telephone","is_whatsapp","is_viber","is_imo","email","message"];
    public function VoyageOrganiseReservation(){
        return $this->hasOne(VoyageOrganiseReservation::class);
    }
    public function HotelReservation(){
        return $this->hasOne(HotelReservation::class);
    }
    public function BilletReservation(){
        return $this->hasOne(BilletReservation::class);
    }
}
