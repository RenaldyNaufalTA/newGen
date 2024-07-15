@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'bg-[#F8EDE3] text-black' : 'text-white hover:bg-[#F8EDE3]   hover:transition hover:duration-300 hover:text-black' }} rounded-full px-4 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
{{--  aria curren digunakan supaya orangdengan tunanetra dpt mampu megakses web --}}
