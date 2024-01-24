<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function User(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function Hours(): hasMany{
        return $this->hasMany(Hours::class);
    }

    public function Logs(): hasMany{
        return $this->hasMany(Logs::class);
    }

    #$project = Projects::where('id', 1);
    #$hours = $project->Hours
}
