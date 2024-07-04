@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'bg-[#2D2D2D] text-white' : 'text-[#2D2D2D] hover:bg-[#2D2D2D]   hover:transition hover:duration-700 hover:text-white' }} rounded-full px-4 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
{{--  aria curren digunakan supaya orangdengan tunanetra dpt mampu megakses web --}}
