<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VoyageOrganiseDate;
use App\Models\Client;
class VoyageOrganiseReservation extends Model
{
    use HasFactory;
    protected $fillable = ['id',"voyage_organise_date_id","client_id","is_paid","paiement_type","paiment_photo","versements","nb_Adulte","nb_Adolescente","nb_Enfant","reduction"];
    public function VoyageOrganiseDate(){
        return $this->belongsTo(VoyageOrganiseDate::class);
    }
    public function Client(){
        return $this->belongsTo(Client::class);
    }
    public function Somme(){
        return $this->nb_Adulte*$this->VoyageOrganiseDate->VoyageOrganise->prixAdulte
        +$this->nb_Adolescente*$this->VoyageOrganiseDate->VoyageOrganise->prixAdolescente
        +$this->nb_Enfant*$this->VoyageOrganiseDate->VoyageOrganise->prixEnfant;
    }
}
