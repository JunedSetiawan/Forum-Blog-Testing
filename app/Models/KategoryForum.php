<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoryForum extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function forum()
    {
        return $this->hasOne(Forum::class);
    }

    public function sub_kategory()
    {
        return $this->belongsTo(SubKategory::class);
    }
}
