<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Job extends Model
{
    use HasFactory;

    public static array $exp = ['entry', 'intermediate', 'senior' ];
    public static array $category = ['IT', 'Sales', 'Finance', 'Marketing' ];

    public function employer() : BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

}
