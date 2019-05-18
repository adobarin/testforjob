<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'prazd_base' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'prazd_base' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'WjeNNwmrGztx' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         's2gK#QSfoYnr^Cs6?e$jeY^;9|H<B`@gwTYJ+RHnFSTh)?_IvsU`Sgn;<3ui~d;e' );
define( 'SECURE_AUTH_KEY',  'ER?5?@uVh1B6CAdPb(kH@55wnSu( GU3FL/|_|y@zHB@mJqXQ)|9<4%I~G yHej%' );
define( 'LOGGED_IN_KEY',    'fuN3[7zd&Y-hlbRE!kp.GvZ,[.:(y3K5Ry9b38&V_u^{zEEr_!;:!*_js;uRDH=9' );
define( 'NONCE_KEY',        '!Q]>6`Fx$n&m`KX)-Qnm}Hv@%bT|}Cye|w#M,tyzL,c$X=I33oOi_74v3D7spXMD' );
define( 'AUTH_SALT',        'AqCt-UxMQKCACt(sE2a3L:a#<Y3&gi|)+g|J;Q#5(~^G >aR7[$1wb3?G$~0i4Lj' );
define( 'SECURE_AUTH_SALT', '72U1Pv{i<n**_k+S/6nogJ|!*e@!&~cR~.g1!5{H{ 7pAb:EY,Nfc@e2[Qjis8mc' );
define( 'LOGGED_IN_SALT',   '1TMsK^nUqC]mnN}f1H*m5ppH#ao=_%5+I_76W%$0nAsnq%RuNIZtzh+WkII~yP}F' );
define( 'NONCE_SALT',       'M:iXG_I/D:fkU[il.D=,8*-oEBA5wKj8Z5qBD^JAB]T:^g9Eu||Ybz&e?nC|=]5g' );

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
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
