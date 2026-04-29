@props(['name', 'variant', 'price'])

<div class="flex justify-between items-center border-b border-gray-800 pb-4">
    <div>
        <h3 class="font-semibold">{{ $name }}</h3>
        <p class="text-sm text-gray-400">{{ $variant }}</p>
    </div>
    <span>{{ $price }}</span>
</div>