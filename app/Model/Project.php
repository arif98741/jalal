<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
  	public function project_category()
    {
        return $this->belongsTo('App\Model\ProjectCategory');
    }
}
