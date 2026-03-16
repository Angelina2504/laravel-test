<?php

namespace App\Filament\Resources\Bookings\Schemas;

use App\Models\Property;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;

class BookingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->label('Utilisateur')
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                Select::make('property_id')
                    ->label('Propriété')
                    ->options(Property::all()->pluck('name', 'id'))
                    ->searchable()
                    ->required(),
                DatePicker::make('start_date')
                    ->label('Date de début')
                    ->required(),
                DatePicker::make('end_date')
                    ->label('Date de fin')
                    ->required(),
                Textarea::make('note')
                    ->label('note')
                    ->nullable(),
            ]);
    }
}
