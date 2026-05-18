<?php

namespace Plugins\LoyaltyCard\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Auth;
use Plugins\LoyaltyCard\Models\LoyaltyCard;

class LoyaltyCardWidget extends Widget
{
    protected static string $view = 'loyalty-card::filament.widgets.loyalty-card-widget';

    public ?LoyaltyCard $card = null;

    public function mount(): void
    {
        $this->card = LoyaltyCard::where('user_id', Auth::id())->first();
    }

    public function claim(): void
    {
        if (!$this->card) {
            $this->card = LoyaltyCard::create([
                'user_id' => Auth::id(),
                'points' => 10, // Initial points
            ]);
        }
    }

    public function collect(): void
    {
        if ($this->card) {
            if ($this->card->last_collected_at && $this->card->last_collected_at->diffInHours(now()) < 24) {
                $this->dispatch('notify', [
                    'type' => 'danger',
                    'message' => 'You can only collect points once every 24 hours.',
                ]);
                return;
            }

            $this->card->increment('points', 5);
            $this->card->update(['last_collected_at' => now()]);
            $this->card->refresh();
        }
    }
}
