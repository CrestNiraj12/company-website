<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "contract_number",
        "awarded_date",
        "amount",
        "client_name",
        "image",
        "completed",
        "category_id",
    ];

    public function category()
    {
        $this->belongsTo(ProjectCategory::class, "category_id");
    }

    public function files()
    {
        $this->hasMany(ProjectFile::class);
    }
}
