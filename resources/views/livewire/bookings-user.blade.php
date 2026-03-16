<?php

use App\Models\Booking;
use function Livewire\Volt\{computed, on};

$bookings = computed(function () {
    return Booking::where('user_id', auth()->id())
        ->with('property')
        ->latest()
        ->get();
});

$cancel = function (int $bookingId) {
    Booking::where('id', $bookingId)
        ->where('user_id', auth()->id())
        ->delete();
};

on(['booking-status-updated' => function () {
    unset($this->bookings);
}]);

?>


<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 p-6">
    <h2 class="text-lg font-semibold text-gray-900 mb-4">Mes réservations</h2>

    @if($this->bookings->isEmpty())
        <p class="text-sm text-gray-500">Vous n'avez pas encore de réservation.</p>
    @else
        <div class="space-y-3">
            @foreach($this->bookings as $booking)
                    <div wire:key="booking-{{ $booking->id }}" class="border border-gray-100 rounded-lg p-4 flex justify-between items-start">
                    <div>
                        <p class="font-semibold text-gray-800">{{ $booking->property->name }}</p>
                        <p class="text-sm text-gray-500">Du {{ $booking->start_date }} au {{ $booking->end_date }}</p>
                        @if($booking->note)
                            <p class="text-xs text-blue-600 italic mt-1">{{ $booking->note }}</p>
                        @endif
                    </div>
                    <div class="flex items-center gap-2">
                     <span class="text-xs bg-primary text-white px-2 py-1 rounded-full">Confirmée</span>
                     <button wire:click="cancel({{ $booking->id }})" 
                     class="text-xs bg-red-500 text-white px-2 py-1 rounded-full hover:bg-red-600">
                     Annuler
                    </button>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
