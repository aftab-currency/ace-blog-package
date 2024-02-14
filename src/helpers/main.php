<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

 define('aceblog_flash_message_key','aceblog_flash_message_key');

if (! function_exists('aceblog_auth')) {
    function  aceblog_auth($user_id=0) {
        ///asdasdsdasdas
      return Auth::user();
    }
}

if (! function_exists('aceblog_flash_message')) {
    function  aceblog_flash_message($message) {

            Session::flash(aceblog_flash_message_key, $message);
    }
}
if (! function_exists('aceblog_has_flashed_message')) {
    function  aceblog_has_flashed_message() {
        
        return Session::has(aceblog_flash_message_key);
    }
}
if (! function_exists('aceblog_pull_flashed_message')) {
    function  aceblog_pull_flashed_message() {
        
        return Session::pull(aceblog_flash_message_key);
    }
}