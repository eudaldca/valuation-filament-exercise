<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum StatusEnum: string implements HasColor, HasLabel
{
    case REQUESTED = 'requested';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case REJECTED = 'rejected';

    public function getLabel(): ?string
    {
      return trans('app.valuations.status.'.$this->value);
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::REQUESTED => 'gray',
            self::IN_PROGRESS => 'warning',
            self::COMPLETED => 'success',
            self::REJECTED => 'danger',
        };
    }
}
