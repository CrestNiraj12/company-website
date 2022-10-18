<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuaranteeFile extends Model
{
    use HasFactory;

    protected $fillable = [
        "issued_date",
        "end_date",
        "path",
        "guarantee_id"
    ];

    public function guarantee()
    {
        $this->belongsTo(Guarantee::class);
    }
}
