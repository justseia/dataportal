<?php

namespace App\Enums;

class ActionType
{
    const YEAR = 'year';
    const KEY = 'key';
    const THEME = 'theme';
    const QUESTION = 'question';
    const CROSS = 'cross';
    const DOWNLOAD = 'download';
    const RESEARCH = 'research';
    const NEWS = 'news';

    public static function getActionTypeKey(): array
    {
        return [
            self::YEAR,
            self::KEY,
            self::THEME,
            self::QUESTION,
            self::CROSS,
            self::DOWNLOAD,
            self::RESEARCH,
        ];
    }

    public static function getActionType(): array
    {
        return [
            self::YEAR => 'Год',
            self::KEY => 'Ключевое слово',
            self::THEME => 'Тема',
            self::QUESTION => 'Вопрос',
            self::CROSS => 'Корреляция',
            self::DOWNLOAD => 'Выгрузка',
            self::RESEARCH => 'Каталог исследования',
            self::NEWS => 'Публикация',
        ];
    }

    public static function getFormatActionType($key): string
    {
        return self::getActionType()[$key];
    }
}
