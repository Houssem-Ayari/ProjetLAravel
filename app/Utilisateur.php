<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Utilisateur extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_utilisateur', 'prenom_utilisateur','adresse_utilisateur','email_utilisateur','badge_utilisateur'
    ];

    public function Ordes()
    {
        return $this->hasMany(Order::class);
    }
    
}

