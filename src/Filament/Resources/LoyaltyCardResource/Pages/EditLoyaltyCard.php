<?php

namespace Plugins\LoyaltyCard\Filament\Resources\LoyaltyCardResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Plugins\LoyaltyCard\Filament\Resources\LoyaltyCardResource;

class EditLoyaltyCard extends EditRecord
{
    protected static string $resource = LoyaltyCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
