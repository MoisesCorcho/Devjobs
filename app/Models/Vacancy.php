<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function salary(): BelongsTo
    {
        return $this->belongsTo(Salary::class);
    }

    public function applicants(): HasMany
    {
        return $this->hasMany(Applicant::class)->orderBy('created_at', 'desc');
    }

    public function recruiter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeCategory(Builder $query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeSalary(Builder $query, $salaryId)
    {
        return $query->where('salary_id', $salaryId);
    }
}
