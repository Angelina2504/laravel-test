<?php

use function Livewire\Volt\{state};

state([
    'isReserved' => false,
    'note' => ''
]);

$toggle = function () {
    $this->isReserved = !$this->isReserved;

    $this->dispatch('booking-status-updated', reserved: $this->isReserved);
};

?>

<div class="p-4 border rounded-xl bg-white shadow-sm space-y-4">
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

    <x-primary-button 
        wire:click="toggle" 
        type="button"
        class="w-full justify-center transition-all duration-300 {{ $isReserved ? 'bg-secondary' : 'bg-primary' }}"
    >
        <span>
            {{ $isReserved ? 'Annuler la réservation' : 'Réserver maintenant' }}
        </span>
    </x-primary-button>
</div>