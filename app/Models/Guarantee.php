<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guarantee extends Model
{
    use HasFactory;

    protected $fillable = [
        "guarantee_number",
        "issued_office",
        "category_id",
    ];

    public function category()
    {
        $this->belongsTo(GuaranteeCategory::class, "category_id");
    }

    public function files()
    {
        $this->hasMany(GuaranteeFile::class);
    }
}
