<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description'];
    
    public function project_images() {
        return $this->hasMany('App\ProjectImage');
    }
}
