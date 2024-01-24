<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Hours extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Project(): BelongsTo{
        return $this->belongsTo(Project::class);
    }
}
