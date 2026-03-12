@props(['property'])

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200 flex flex-col hover:shadow-md transition duration-200">
    
    <div class="p-6 flex-1 text-gray-900">
        <div class="flex justify-between items-start mb-4">
            <h3 class="text-xl font-semibold">
                {{ $property->name }}
            </h3>
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary text-white">
                Disponible
            </span>
        </div>

        <p class="text-sm text-gray-600 leading-relaxed line-clamp-3">
            {{ $property->description }}
        </p>
    </div>

    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex justify-between items-center mt-auto">
        <div class="text-lg font-bold text-secondary">
            {{ number_format($property->price_per_night, 2) }}€ 
            <span class="text-xs text-gray-500 font-normal">/ nuit</span>
        </div>

        <livewire:booking-manager />
    </div>
</div>