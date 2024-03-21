<?php

namespace Modules\Keyboard\Enums;

enum KeyboardTypeEnum :string
{
    case SearchResult = "SearchResult";

    public static function values()
    {
        return array_map(fn($e) => $e->value, self::cases());
    }
}
