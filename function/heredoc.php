<?php

use Janisbiz\Heredoc\Heredoc;

if (!function_exists('heredoc')) {
    /**
     * @param null|float|int|string $value
     *
     * @return null|float|int|string
     */
    function heredoc($value)
    {
        return Heredoc::heredoc($value);
    }
}
