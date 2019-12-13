<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class ItemMenu extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom_item_menu', 'description_item_menu','prix', 'image', 'id_menu'
    ];

    public function menu(){
        return $this->belongsTo(Menu::class);
    }
}
