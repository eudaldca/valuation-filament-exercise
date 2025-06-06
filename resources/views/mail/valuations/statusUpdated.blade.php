<x-mail::message>
# Status updated

Your valuation for {{ $valuation->address }} has been updated with status {{ trans('app.valuations.status.'
. $valuation->status->value) }}.
    @if($valuation->status === \App\Enums\StatusEnum::COMPLETED && $valuation->value)
        The property has been appraised for {{ Number::currency($valuation->value, 'EUR', precision: 0) }}.
    @endif

</x-mail::message>
