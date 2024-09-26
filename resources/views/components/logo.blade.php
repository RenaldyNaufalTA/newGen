@props(['height' => 'h-10'])
<a href="/">
    <img {{ $attributes->merge(['class' => 'mx-auto w-auto ' . $height]) }} src="{{ asset('img/Choco2.png') }}"
        alt="Your Company">
</a>
