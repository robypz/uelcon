<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Current;

class PaymentMethod extends Model
{

    use HasFactory;

    protected $fillable = [
        'payment_method',
        'currency_id',
    ];

    public function statement(): BelongsTo
    {
        return $this->belongsTo(Statement::class);
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    function currency() : BelongsTo {
        return $this->belongsTo(Currency::class);
    }
}
