<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $fillable = ['project_id', 'project_image_path', 'project_image_caption'];
    
    public function project() {
        return $this->belongsTo('App\Project');
    }
}
