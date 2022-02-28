<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'xeon' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'qkG,BxM+/<=>+[Ey1`A7J2L9k)]~VUFWz:Qk1W}PQkbbD2m[qS,7&w }H!cj.<~Z' );
define( 'SECURE_AUTH_KEY',  '=Ul3$s:{wJ7I<j0fZ0-#.>.hkVE]=FqAzt^1ix)K%1 IP)<4In5zq8#8mXLPe^5*' );
define( 'LOGGED_IN_KEY',    'RnW(@)#_C=7Xf07vJUS_;a-gMZ0kv}2S-g,`i},O7Uu,9vLV(mxnW[Oy,=QPA>}I' );
define( 'NONCE_KEY',        '>VeQx0yV *r[b;jJD>ud+q z(HjbCl?39F,#KF>x%hoCBNu8Nl`)BVf;ZOes4wt%' );
define( 'AUTH_SALT',        'V[?UJctbb>y7.ZIz@]U9$Vs|3G{t=I~AsK~}Ce,Jp{3X^+>cBh+S?[gs,!isfK>`' );
define( 'SECURE_AUTH_SALT', 'G={1]))c6PNIy5gpszymNXLaH:9H [80e`s>12`}}-k&Pd/WG8KJBZQgK8ud uw>' );
define( 'LOGGED_IN_SALT',   'Lw3R<8kuct xgC7N7:}<}n3(ho7X_8%[N_L}:.PM=P.?*U@xX377e$1nL4[8=99#' );
define( 'NONCE_SALT',       'b7tT f/{ O$I/{(X-.w0gl$UzE.~o=?+1 E.!)@y6A<=pDz}V911PX<^ztm1X!$ ' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';

