@props(['active' => false])
<a {{ $attributes }}
    class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700   hover:transition hover:duration-700 hover:text-sky-500' }} rounded-full px-4 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
{{--  aria curren digunakan supaya orangdengan tunanetra dpt mampu megakses web --}}
