<div id="sidr">
    <ul>
        <li class="{{ Active::pattern('/') }}"><a href="/">Home</a></li>
        <li class="{{ Active::pattern('items') }}">{!! link_to('items', 'Portfolio') !!}</li>
        <li class="{{ Active::pattern('about') }}">{!! link_to('about', 'About') !!}</li>
        @if (Auth::check())
            <li class="{{ Active::pattern('items/create') }}">{!! link_to('items/create', 'Create new item') !!}</li>
        @else
            <li class="{{ Active::pattern('auth/login') }}">{!! link_to('auth/login', 'Login') !!}</li>
        @endif
    </ul>
</div>