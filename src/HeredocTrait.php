<?php

namespace Janisbiz\Heredoc;

trait HeredocTrait
{
    /**
     * @param int|string|null|float|double $value
     *
     * @return int|string|null|float|double
     */
    public function heredoc(mixed $value): mixed
    {
        return Heredoc::heredoc($value);
    }
}
