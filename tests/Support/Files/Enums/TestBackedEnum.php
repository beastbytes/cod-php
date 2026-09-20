<?php

declare(strict_types=1);

namespace BeastBytes\CodPhp\Tests\Support\Files\Enums;

enum TestBackedEnum: int
{
    public const string BACKED_ENUM_CONSTANT = 'backedEnumConstant';

    case Case1b = 1;
    case Case2b = 2;
    case Case3b = 3;
    case Case4b = 4;
    case Case5b = 5;

    public function backedEnumMethod(TestBackedEnum $enum): string
    {
        return match ($enum) {
            TestBackedEnum::Case1b => 'one',
            TestBackedEnum::Case2b => 'two',
            TestBackedEnum::Case3b => 'three',
            TestBackedEnum::Case4b => 'four',
            TestBackedEnum::Case5b => 'five'
        };
    }
}
