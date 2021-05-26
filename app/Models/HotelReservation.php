<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hotel;
use App\Models\Client;

class HotelReservation extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'hotel_id',"client_id","nb_chambre","nb_Adulte","nb_Adolescente","nb_Enfant","total",'is_paid',"versements","reduction","debut","fin"];
    public function Hotel(){
        return $this->belongsTo(Hotel::class);
    }
    public function Client(){
        return $this->belongsTo(Client::class);
    }
}
