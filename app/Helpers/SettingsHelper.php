<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('get_contact_detail')) {
    function get_contact_detail($key)
    {
        return DB::table('contact_details')->value($key);
    }
}
