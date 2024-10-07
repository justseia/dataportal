<?php


namespace App\Enums;

class AdminPermissions
{
    const CLIENT_GET = 'client_get';
    const CLIENT_CREATE = 'client_create';
    const CLIENT_UPDATE = 'client_update';
    const CLIENT_DELETE = 'client_delete';

    const NEWS_GET = 'news_get';
    const NEWS_CREATE = 'news_create';
    const NEWS_UPDATE = 'news_update';
    const NEWS_DELETE = 'news_delete';

    const REPORT_GET = 'report_get';
    const REPORT_CREATE = 'report_create';
    const REPORT_UPDATE = 'report_update';
    const REPORT_DELETE = 'report_delete';

    const DATABASE_GET = 'database_get';
    const DATABASE_CREATE = 'database_create';
    const DATABASE_UPDATE = 'database_update';
    const DATABASE_DELETE = 'database_delete';

    const ADMIN_GET = 'admin_get';
    const ADMIN_CREATE = 'admin_create';
    const ADMIN_UPDATE = 'admin_update';
    const ADMIN_DELETE = 'admin_delete';

    public static function getAdminPermissionsKey(): array
    {
        return [
            self::CLIENT_GET,
            self::CLIENT_CREATE,
            self::CLIENT_UPDATE,
            self::CLIENT_DELETE,

            self::NEWS_GET,
            self::NEWS_CREATE,
            self::NEWS_UPDATE,
            self::NEWS_DELETE,

            self::REPORT_GET,
            self::REPORT_CREATE,
            self::REPORT_UPDATE,
            self::REPORT_DELETE,

            self::DATABASE_GET,
            self::DATABASE_CREATE,
            self::DATABASE_UPDATE,
            self::DATABASE_DELETE,

            self::ADMIN_GET,
            self::ADMIN_CREATE,
            self::ADMIN_UPDATE,
            self::ADMIN_DELETE,
        ];
    }

    public static function getAdminPermissions(): array
    {
        return [
            [
                self::CLIENT_GET => 'Страница пользователя',
                self::CLIENT_CREATE => 'Создание пользователя',
                self::CLIENT_UPDATE => 'Обновление пользователя',
                self::CLIENT_DELETE => 'Удаление пользователя',
            ],
            [
                self::NEWS_GET => 'Страница публикации',
                self::NEWS_CREATE => 'Создание публикации',
                self::NEWS_UPDATE => 'Обновление публикации',
                self::NEWS_DELETE => 'Удаление публикации',
            ],
            [
                self::REPORT_GET => 'Страница отчета',
                self::REPORT_CREATE => 'Создание отчета',
                self::REPORT_UPDATE => 'Обновление отчета',
                self::REPORT_DELETE => 'Удаление отчета',
            ],
            [
                self::DATABASE_GET => 'Страница датасета',
                self::DATABASE_CREATE => 'Создание датасета',
                self::DATABASE_UPDATE => 'Обновление датасета',
                self::DATABASE_DELETE => 'Удаление датасета',
            ],
            [
                self::ADMIN_GET => 'Страница админ',
                self::ADMIN_CREATE => 'Создание админа',
                self::ADMIN_UPDATE => 'Обновление админа',
                self::ADMIN_DELETE => 'Удаление админа',
            ],
        ];
    }
}
