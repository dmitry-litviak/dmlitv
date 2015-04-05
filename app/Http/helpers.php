<?php

use Illuminate\Support\Facades\Session;

function active_language($lang) {
    if(Session::has('locale')) {

        if (Session::get('locale') == $lang) {
            return 'active';
        }
    }
}