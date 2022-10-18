<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuaranteeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    public function guarantees()
    {
        $this->hasMany(Project::class, "category_id");
    }
}
