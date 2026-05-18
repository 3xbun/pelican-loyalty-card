<?php

namespace Plugins\LoyaltyCard;

use Filament\Panel;
use Pelican\Foundation\Plugins\Plugin;
use Plugins\LoyaltyCard\Filament\Resources\LoyaltyCardResource;

class LoyaltyCard extends Plugin
{
    public function boot(Panel $panel): void
    {
        $panel
            ->resources([
                LoyaltyCardResource::class,
            ])
            ->widgets([
                \Plugins\LoyaltyCard\Filament\Widgets\LoyaltyCardWidget::class,
            ]);
    }
}
