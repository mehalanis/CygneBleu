<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BilletDate;
use App\Models\Client;
class BilletReservation extends Model
{
    use HasFactory;
    protected $fillable = ["id","billet_date_id","client_id","is_paid","versements","nb_persone","reduction"];
    public function billetDate(){
        return $this->belongsTo(BilletDate::class);
    }
    public function Client(){
        return $this->belongsTo(Client::class);
    }
}
