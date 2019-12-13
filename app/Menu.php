<?php

namespace App;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nommenu', 'descriptionmenu'
    ];

    public function ItemMenus(){
        return $this->hasMany(ItemMenu::class,'id_menu');
    }
}
