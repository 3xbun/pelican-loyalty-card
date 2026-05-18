<?php

namespace Plugins\LoyaltyCard\Filament\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Plugins\LoyaltyCard\Models\LoyaltyCard;

class LoyaltyCardResource extends Resource
{
    protected static ?string $model = LoyaltyCard::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'username')
                    ->searchable()
                    ->required(),
                Forms\Components\TextInput::make('points')
                    ->numeric()
                    ->default(0)
                    ->required(),
                Forms\Components\DateTimePicker::make('last_collected_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.username')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('points')
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_collected_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('add_points')
                    ->form([
                        Forms\Components\TextInput::make('amount')
                            ->numeric()
                            ->required(),
                    ])
                    ->action(function (LoyaltyCard $record, array $data) {
                        $record->increment('points', $data['amount']);
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => LoyaltyCardResource\Pages\ListLoyaltyCards::route('/'),
            'create' => LoyaltyCardResource\Pages\CreateLoyaltyCard::route('/create'),
            'edit' => LoyaltyCardResource\Pages\EditLoyaltyCard::route('/{record}/edit'),
        ];
    }
}
