<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    public function projects()
    {
        return $this->hasMany('App\Model\Project');
    }
}
