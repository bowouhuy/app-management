<?php
use Illuminate\Support\Str;

function str_plural(...$args) {
    return Str::plural(...$args);
}

function str_singular(...$args) {
    return Str::singular(...$args);
}

// function str_contains(...$args) {
//     return Str::contains(...$args);
// }
