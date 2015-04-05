<div id="sidr">
    <ul>
        <li class="{{ Active::pattern('/') }}"><a href="/">{!! Lang::get('frontend.home') !!}</a></li>
        <li class="{{ Active::pattern('items') }}">{!! link_to('items', Lang::get('frontend.items')) !!}</li>
        <li class="{{ Active::pattern('about') }}">{!! link_to('about', Lang::get('frontend.about')) !!}</li>
        @if (Auth::check())
            <li class="{{ Active::pattern('items/create') }}">{!! link_to('items/create', Lang::get('frontend.item_create')) !!}</li>
        @else
            <li class="{{ Active::pattern('auth/login') }}">{!! link_to('auth/login', Lang::get('frontend.login')) !!}</li>
        @endif
    </ul>
</div>