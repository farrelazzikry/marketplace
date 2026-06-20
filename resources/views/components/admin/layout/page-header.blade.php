@props(['title', 'subtitle'])

<div class="mb-8 space-y-1">
    <h1 class="text-2xl font-semibold tracking-tight text-[#111827] font-serif-luxury">
        {{ $title }}
    </h1>

    <p class="text-xs text-[#6B7280] tracking-wide uppercase">
        {{ $subtitle }}
    </p>
</div>