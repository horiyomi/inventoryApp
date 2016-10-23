<?php

function getValue($name, $default = '') {
    return isset($name) ? $name : $default;
}

function dd($value)
{
    var_dump($value);die();
}

/**
 * @return string
 */
function randColor()
{
    return '#' . dechex(rand(0x000000, 0xFFFFFF));
}


function convertToCommaSeparatedString($fieldNames)
{
    return trim(implode(", ", $fieldNames));
}


function setActiveWhen($page)
{
    return ($_SERVER["PHP_SELF"] === $page) ? ' class="active"' : '';
}

function inDollars($amount)
{
    return '$' . formatNumber($amount);
}


function formatNumber($amount)
{
    return number_format($amount, 2);
}
function formatDate($date)
{
    return date("F j, Y, g:i a", strtotime($date));
}