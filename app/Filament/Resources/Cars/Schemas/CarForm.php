<?php

namespace App\Filament\Resources\Cars\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class CarForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->columnSpan(2),
                        TextInput::make('make')
                            ->required(),
                        TextInput::make('model')
                            ->required(),
                        TextInput::make('year')
                            ->required()
                            ->numeric()
                            ->minValue(1900)
                            ->maxValue(date('Y') + 1),
                        TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$'),
                    ])
                    ->columns(2),

                Section::make('Specifications')
                    ->schema([
                        Select::make('condition')
                            ->required()
                            ->options([
                                'new' => 'New',
                                'used' => 'Used',
                                'certified' => 'Certified Pre-Owned',
                            ]),
                        TextInput::make('mileage')
                            ->numeric()
                            ->suffix('miles'),
                        Select::make('transmission')
                            ->required()
                            ->options([
                                'automatic' => 'Automatic',
                                'manual' => 'Manual',
                            ]),
                        Select::make('fuel_type')
                            ->required()
                            ->options([
                                'petrol' => 'Petrol',
                                'diesel' => 'Diesel',
                                'electric' => 'Electric',
                                'hybrid' => 'Hybrid',
                            ]),
                        Select::make('body_type')
                            ->required()
                            ->options([
                                'sedan' => 'Sedan',
                                'suv' => 'SUV',
                                'truck' => 'Truck',
                                'coupe' => 'Coupe',
                                'hatchback' => 'Hatchback',
                                'van' => 'Van',
                                'convertible' => 'Convertible',
                            ]),
                        TextInput::make('engine_size'),
                        TextInput::make('exterior_color')
                            ->required(),
                        TextInput::make('interior_color'),
                        TextInput::make('doors')
                            ->numeric(),
                        TextInput::make('seats')
                            ->numeric(),
                    ])
                    ->columns(2),

                Section::make('Details')
                    ->schema([
                        Textarea::make('description')
                            ->required()
                            ->rows(5)
                            ->columnSpan(2),
                        TextInput::make('vin')
                            ->label('VIN')
                            ->unique(ignoreRecord: true),
                        TextInput::make('location')
                            ->required(),
                        Select::make('status')
                            ->required()
                            ->options([
                                'available' => 'Available',
                                'reserved' => 'Reserved',
                                'sold' => 'Sold',
                            ])
                            ->default('available'),
                        Toggle::make('is_featured')
                            ->label('Featured Car'),
                    ])
                    ->columns(2),

                // CATERGORY SECTION
                // Section::make('Categories')
                //     ->schema([
                //         Select::make('categories')
                //             ->relationship('categories', 'name')
                //             ->multiple()
                //             ->preload()
                //             ->createOptionForm([
                //                 TextInput::make('name')
                //                     ->required()
                //                     ->unique(),
                //                 TextInput::make('slug')
                //                     ->required()
                //                     ->unique(),
                //             ])
                //             ->columnSpan(2),
                //     ]),

                // IMAGE UPLOAD SECTION
                Section::make('Images')
                    ->schema([
                        FileUpload::make('images')
                            ->label('Car Images')
                            ->multiple()
                            ->image()
                            ->directory('cars')
                            ->disk('public')          // ← CRITICAL: Must be 'public'
                            ->visibility('public')    // ← CRITICAL: Must be 'public'
                            ->maxFiles(10)
                            ->reorderable()
                            ->imageEditor()
                            ->panelLayout('grid')
                            ->helperText('Upload up to 10 images. First image will be the primary thumbnail.')
                            ->columnSpan(2),
                    ]),

                // FEATURES SECTION (Optional)
                Section::make('Features')
                    ->schema([
                        Repeater::make('features')
                            ->relationship()
                            ->schema([
                                TextInput::make('feature')
                                    ->required()
                                    ->placeholder('e.g., Air Conditioning, Sunroof, Leather Seats'),
                            ])
                            ->columnSpan(2)
                            ->addActionLabel('Add Feature')
                            ->defaultItems(0),
                    ]),
            ]);
    }
}
