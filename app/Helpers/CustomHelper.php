<?php
if (!function_exists('getPhoneNumber')) {   
    function getPhoneNumber()
    {
        // You can cache the settings to avoid querying the database on every call
        $phoneSetting = \DB::table('settings')->where('name', 'phone')->first();

        return $phoneSetting ? $phoneSetting->field_1 : null;
    }
}

?>