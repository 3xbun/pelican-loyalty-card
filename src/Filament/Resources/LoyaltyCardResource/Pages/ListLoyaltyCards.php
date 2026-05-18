<?php

namespace Plugins\LoyaltyCard\Filament\Resources\LoyaltyCardResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Plugins\LoyaltyCard\Filament\Resources\LoyaltyCardResource;

class ListLoyaltyCards extends ListRecords
{
    protected static string $resource = LoyaltyCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
