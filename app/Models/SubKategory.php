<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'kategory_id'];

    public function KategoryForum()
    {
        return $this->belongsTo(KategoryForum::class);
    }
}
