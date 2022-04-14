<?php

if(!function_exists('get_random_css_class')) {
    function get_random_css_class($classes) {
        return $classes[rand(0, count($classes) - 1)];
    }
}

if(!function_exists('get_image_path')) {
    function get_image_path($image) {
        return asset('uploads/rooms/' . $image);
    }
}
