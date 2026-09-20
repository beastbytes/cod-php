<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Tests\Support\Files\Enums;

enum TestUnitEnum
{
    public const string UNIT_ENUM_CONSTANT = 'unitEnumConstant';

    case Case1u;
    case Case2u;
    case Case3u;
    case Case4u;
    case Case5u;

    public function unitEnumMethod(TestUnitEnum $enum): string
    {
        return match ($enum) {
            TestUnitEnum::Case1u => 'one',
            TestUnitEnum::Case2u => 'two',
            TestUnitEnum::Case3u => 'three',
            TestUnitEnum::Case4u => 'four',
            TestUnitEnum::Case5u => 'five'
        };
    }
}
