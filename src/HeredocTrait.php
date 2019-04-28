<?php

namespace Janisbiz\Heredoc;

trait HeredocTrait
{
    /**
     * @param int|string|null|float|double $value
     *
     * @return int|string|null|float|double
     */
    public function heredoc($value)
    {
        return Heredoc::heredoc($value);
    }
}
