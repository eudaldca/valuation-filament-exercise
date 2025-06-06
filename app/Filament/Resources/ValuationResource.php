<?php

namespace App\Filament\Resources;

use App\Enums\StatusEnum;
use App\Filament\Resources\ValuationResource\Pages;
use App\Models\Valuation;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Support\Number;

class ValuationResource extends Resource
{
    protected static ?string $model = Valuation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('customerName')
                    ->required()
                    ->label('Customer Name'),
                TextInput::make('customerEmail')
                    ->email()
                    ->required()
                    ->label('Customer Email'),
                TextInput::make('address')
                    ->required(),
                TextInput::make('value')
                    ->numeric(),
                Textarea::make('comments')
                    ->rows(3),
                Select::make('status')
                    ->options(StatusEnum::class)
                    ->default(StatusEnum::REQUESTED)
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customerName')
                    ->label('Customer Name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable()
                    ->sortable()
                    ->limit(20),
                Tables\Columns\TextColumn::make('value')
                    ->formatStateUsing(fn($state) => Number::currency($state, 'EUR', precision: 0))
                    ->sortable(),
                Tables\Columns\TextColumn::make('comments')
                    ->limit(50),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options(StatusEnum::class)
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListValuations::route('/'),
            'create' => Pages\CreateValuation::route('/create'),
            'activities' => Pages\ListValuationActivities::route('/{record}/activities'),
            'view' => Pages\ViewValuation::route('/{record}'),
            'edit' => Pages\EditValuation::route('/{record}/edit'),
        ];
    }
}
