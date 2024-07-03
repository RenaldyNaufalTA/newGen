@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'bg-red-700 text-white' : 'text-gray-300 hover:bg-red-700   hover:transition hover:duration-700 hover:text-white' }} rounded-full px-4 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
{{--  aria curren digunakan supaya orangdengan tunanetra dpt mampu megakses web --}}
