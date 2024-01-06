<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Job extends Model
{
    use HasFactory;

    public static array $exp = ['entry', 'intermediate', 'senior' ];
    public static array $category = ['IT', 'Sales', 'Finance', 'Marketing' ];

    protected $fillable = ['title', 'description', 'salary', 'category', 'location', 'experience' ];

    public function employer() : BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function jobApplications() : HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function hasUserApplied( Authenticatable|User|int $user )
    {
        return $this->where( 'id', $this->id )
             ->whereHas( 'jobApplications', fn( $query) => $query->where('user_id', '=', $user->id ?? $user ) )
             ->exists(); // returns true if any row exists else false
    }

}
