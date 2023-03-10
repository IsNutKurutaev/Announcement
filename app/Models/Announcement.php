<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [ 'name', 'body', 'updated_time', 'heading_id', ];

    static function isDayPast($date)
    {
        return Carbon::create($date)->isSameDay();
    }

    public function heading(): HasMany
    {
        return $this->hasMany(Heading::class);
    }
}
