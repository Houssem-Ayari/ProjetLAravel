<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Evaluation extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'note', 'id_utilisateur','id_item_menu'
    ];

    public function itemmenu(){
        return $this->belongsTo(ItemMenu::class);
    }
    public function utilisateur(){
        return $this->belongsTo(Utilisateur::class);
    }
}
