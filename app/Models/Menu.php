<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    /*
     * Table : menus
     */
    protected $table = "menus";

    /*
     * Get the Sub menus for the menu
     */

    public function submenus()
    {
        return $this->hasMany('App\Models\SubMenu');
    }
}
