<?php

namespace Janisbiz\Heredoc\Tests\Unit;

use Janisbiz\Heredoc\HeredocTrait;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class HeredocTest extends TestCase
{
    use HeredocTrait;

    /**
     * @param int|string|null|float|double $value
     * @param string $expected
     */
    #[DataProvider('heredocDataProvider')]
    public function testHeredoc($value, $expected)
    {
        $this->assertSame(
            $expected,
            <<<VALUE
{$this->heredoc($value)}
VALUE
        );
    }

    public static function heredocDataProvider()
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
