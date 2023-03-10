<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Heading extends Model
{
    use HasFactory;

    protected $fillable = [ 'name' ];

    public function announcements(): BelongsTo
    {
        return $this->belongsTo(Announcement::class);
    }
}
