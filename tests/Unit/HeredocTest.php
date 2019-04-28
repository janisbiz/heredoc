<?php

namespace Janisbiz\Heredoc\Tests\Unit;

use Janisbiz\Heredoc\HeredocTrait;
use PHPUnit\Framework\TestCase;

class HeredocTest extends TestCase
{
    use HeredocTrait;

    /**
     * @dataProvider heredocDataProvider
     *
     * @param int|string|null|float|double $value
     * @param string $expected
     */
    public function testHeredoc($value, $expected)
    {
        $this->assertSame(
            $expected,
            <<<VALUE
{$this->heredoc($value)}
VALUE
        );
    }

    public function heredocDataProvider()
    {
        return [
            [
                1,
                '1'
            ],
            [
                1.1,
                '1.1'
            ],
            [
                'string',
                'string'
            ],
            [
                null,
                ''
            ],
            [
                "\n",
                "\n"
            ],
        ];
    }
}
