<x-filament-widgets::widget>
    <x-filament::section icon="heroicon-o-credit-card" icon-color="primary">
        <x-slot name="heading">
            Loyalty Card
        </x-slot>

        <div class="flex items-center justify-between">
            <div>
                @if($card)
                    <div class="text-2xl font-bold tracking-tight">
                        {{ $card->points }} <span class="text-sm font-medium text-gray-500">Points</span>
                    </div>
                    <p class="text-xs text-gray-400 mt-1">Collect points to redeem rewards!</p>
                @else
                    <p class="text-sm text-gray-500">You don't have a loyalty card yet. Start collecting points today!</p>
                @endif
            </div>
            <div class="flex flex-col gap-2">
                @if(!$card)
                    <x-filament::button wire:click="claim" size="sm" color="primary">
                        Claim Your Card
                    </x-filament::button>
                @else
                    <x-filament::button 
                        wire:click="collect" 
                        size="sm" 
                        color="success"
                        :disabled="$card->last_collected_at && $card->last_collected_at->diffInHours(now()) < 24"
                    >
                        @if($card->last_collected_at && $card->last_collected_at->diffInHours(now()) < 24)
                            Next: {{ $card->last_collected_at->addDay()->diffForHumans() }}
                        @else
                            Collect Daily Points
                        @endif
                    </x-filament::button>
                @endif
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
