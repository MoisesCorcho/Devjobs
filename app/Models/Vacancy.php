<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [];
    protected $guarded = [];

    /**
     * Get the user's first name.
     */
    protected function lastDay(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value),
        );
    }
}
