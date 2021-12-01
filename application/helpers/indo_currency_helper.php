<?php

function indo_currency($value)
{
    $rupiah = 'Rp ' . number_format($value, 0, ',', ',');
    return $rupiah;
}
