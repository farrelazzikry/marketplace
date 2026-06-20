<div {{ $attributes->merge([
    'class' => 'bg-[#FFFFFF]/90 backdrop-blur-sm border border-[#CCCCCC]/80 rounded-2xl p-6 shadow-xl shadow-gray-400/20 text-[#000000] transition-all duration-300 hover:border-[#E0E0E0]/50'
]) }}>
    {{ $slot }}
</div>