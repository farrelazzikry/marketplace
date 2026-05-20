<div {{ $attributes->merge([
    'class' => 'bg-[#111111]/90 backdrop-blur-sm border border-zinc-900/80 rounded-2xl p-6 shadow-xl shadow-black/20 text-white transition-all duration-300 hover:border-zinc-800/50'
]) }}>
    {{ $slot }}
</div>