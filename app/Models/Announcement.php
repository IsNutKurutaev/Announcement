<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'body', 'updated_time', 'heading_id', ];

    public function heading(): HasMany
    {
        return $this->hasMany(Heading::class);
    }
}
