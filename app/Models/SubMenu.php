<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    /*
     * Table : submenus
     */
    protected $table = "submenus";

    /*
     * Get the Menu that owns this Sub menu
     */

    public function menu()
    {
        return $this->hasOne('App\Models\Menu');
    }
}
