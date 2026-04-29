@props(['title' => 'Ringkasan'])

<div class="bg-gray-900 border border-gray-800 rounded-xl p-6 sticky top-10">

    <h2 class="text-xl font-bold mb-6">
        {{ $title }}
    </h2>

    <div class="space-y-4 text-gray-400">
        {{ $slot }}
    </div>

    @isset($footer)
        <div class="mt-6">
            {{ $footer }}
        </div>
    @endisset

</div>