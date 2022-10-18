<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectFile extends Model
{
    use HasFactory;

    protected $fillable = [
        "path",
        "project_id"
    ];

    public function project()
    {
        $this->belongsTo(Project::class);
    }
}
