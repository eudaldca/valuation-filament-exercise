<?php

namespace App\Models;

use App\Enums\StatusEnum;
use App\Events\ValuationStatusUpdatedEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Valuation extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'customerName',
        'customerEmail',
        'address',
        'value',
        'comments',
        'status',
    ];

    protected $casts = [
        'status' => StatusEnum::class,
        'value' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updated(function ($valuation) {
            if ($valuation->isDirty('status')) {
                ValuationStatusUpdatedEvent::dispatch($valuation);
            }
        });
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
