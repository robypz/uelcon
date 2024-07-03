<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Loan extends Model
{
    use HasFactory;

    public function statement(): BelongsTo
    {
        return $this->belongsTo(Statement::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function fees(): HasMany
    {
        return $this->hasMany(Fee::class);
    }

    public function contract(): HasOne
    {
        return $this->hasOne(Contract::class);
    }

    public function payment(): MorphOne
    {
        return $this->morphOne(Payment::class, 'paymentable');
    }

    public function scopeOfStatement(Builder $query, string $statement_id): void
    {
        $query->where('statement_id', $statement_id);
    }

    public function scopeOfId(Builder $query, string $id): void
    {
        $query->where('id', $id);
    }

    public function scopeOfCreatedAtBetween(Builder $query, $startDate, $endDate)
    {
        return $query->whereBetween('created_at', [Carbon::parse($startDate)->addHours(23),Carbon::parse($endDate)->addHours(23)]);
    }

    public function scopeOfRepresentativeDni(Builder $query, $dni)
    {
        return $query->whereHas('user', function ($query) use ($dni) {
            $query->whereHas('representatives', function ($query) use ($dni){
                $query->where('dni', $dni);
            });
        });
    }
}
