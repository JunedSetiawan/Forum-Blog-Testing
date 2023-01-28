<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Forum extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'kategory_forum_id', 'subkategory_forum_id', 'user_id'];

    public function KategoryForum(): BelongsTo
    {
        return $this->belongsTo(KategoryForum::class);
    }
    public function SubKategoryForum(): BelongsTo
    {
        return $this->belongsTo(SubKategoryForum::class);
    }
    // // in your model
    // public function kategory($query, $value) {
    //     return $query->whereHas('kategory_forum_id', function ($q) use ($value) {
    //         return $q->where('kategory_forum.name', 'LIKE', "%{$value}%")
    //     });
    // }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
