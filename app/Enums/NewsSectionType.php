<?php

namespace App\Enums;

class NewsSectionType
{
    const SUBTITLE = 'subtitle';
    const TEXT = 'text';
    const IMAGE = 'image';
    const QUOTE = 'quote';

    public static function getSectionTypeKey(): array
    {
        return [
            self::SUBTITLE,
            self::TEXT,
            self::IMAGE,
            self::QUOTE,
        ];
    }

    public static function getSectionTypeType(): array
    {
        return [
            self::SUBTITLE => 'Подзаголовок',
            self::TEXT => 'Текст',
            self::IMAGE => 'Изображение',
            self::QUOTE => 'Цитата',
        ];
    }
}
