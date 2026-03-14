<?php

use App\Models\Booking;
use function Livewire\Volt\{state, mount};

state([
    'property_id' => null,
    'start_date' => '',
    'end_date' =>'',
    'isReserved' => false,
    'note' => ''
]);

mount (function (int $propertyId) {
    $this->property_id = $propertyId;
});

$reserve = function () {
    Booking::create([
        'user_id'     => auth()->id(),
        'property_id' => $this->property_id,
        'start_date'  => $this->start_date,
        'end_date'    => $this->end_date,
    ]);

    $this->isReserved = true;
    $this->dispatch('booking-status-updated', reserved: true);
};

?>

<div class="p-4 border rounded-xl bg-white shadow-sm space-y-4">
    @if(!$isReserved)
    <div>
        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Note de réservation</label>
        <input type="text" 
               wire:model.live="note" 
               placeholder="Précisez un détail" 
               class="mt-1 block w-full text-sm rounded-lg border-gray-300 focus:ring-primary focus:border-primary">
        
        @if($note)
            <p class="mt-1 text-xs text-blue-600 italic">Note saisie : {{ $note }}</p>
        @endif
    </div>

    <div>
        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Date d'arrivée</label>
        <input type="date" wire:model="start_date"
        class="mt-1 block w-full text-sm rounded-lg border-gray-300 focus:ring-primary focus:border-primary">
    </div>

    <div>
        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider">Date de départ</label>
        <input type="date" wire:model="end_date"
        class="mt-1 block w-full text-sm rounded-lg border-gray-300 focus:ring-primary focus:border-primary">
    </div>

    <x-primary-button 
        wire:click="reserve" 
        type="button"
        class="w-full justify-center bg-primary">
        Réserver maintenant
    </x-primary-button>
    @else
    <p class="text-sm text-green-600 font-semibold text-center"> Réservation confirmer </p>
    @endif
</div>