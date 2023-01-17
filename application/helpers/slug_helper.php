<?php

function slug($slug)
{
    $find = array('ą', 'č', 'ę', 'ç', 'ş', 'ı', 'ə', 'ö', 'ğ', 'ü', ' ', ';', '/', '|', '&');
    $repl = array('a', 'c', 'e', 'c', 's', 'i', 'e', 'o', 'g', 'u', '-', '-', '-', '-', '-',);

    $slug = strtolower($slug);
    $slug = str_replace($find, $repl, $slug);
    return $slug;
}