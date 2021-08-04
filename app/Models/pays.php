<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ville;
class pays extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nom'];
    public function ville(){
        return $this->hasMany(ville::class);
    }
}
