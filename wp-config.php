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
define( 'DB_NAME', 'same' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'admin' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'azuborev' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY', 't^d(!q^lzV&l;FY*[^ESicL>1Il1p8RXWftZP)[mo],!Q|}0-5g68|ER)~{#+lCZ' );
define( 'SECURE_AUTH_KEY', 'L)H[iTH7ZICx554j9AB@V]rpatG-+a_PV/>ZB62ubJWjH+hQ|$:?}26/MtM!A@.e' );
define( 'LOGGED_IN_KEY', 'm@Al`[]N|aoK?u->Img1l-}3gT[dei.q_./8~%:.8Z)iVr:G?YxOzkC:qeaOE[:+' );
define( 'NONCE_KEY', '>-l)SKh;@a?V/c,e+>h-E{nj;]=V1=CU?#G_6:,uBcFYs$$2gNFq)FKBxi*MUDi(' );
define( 'AUTH_SALT', 'g:#&<gp^S ^BZ86Q;dKa)Tfw&G|k ihol|<^$U|-GA6!G&?+lr,yP]T}R?C:yg8X' );
define( 'SECURE_AUTH_SALT', 'YhiHfzj*4L}19$9`4WeM?1MMfHmy=Jd-pdtZxT9Yda-?$PEi+,@ChfP!hFiKk@5`' );
define( 'LOGGED_IN_SALT', 'od$NEnc}74C!3zz4vV6YI7gr X-%K!bO0B?90vCv#znUo7x8IAeTY:+0~{2?Ob`}' );
define( 'NONCE_SALT', 'd:W~GGS+gX:>U~/==w*.p2|]JY U&v8B|#uNJVPOdfUK0~7Iz#)T6~CzqV(Ik^yF' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'sm_';

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
define( 'WP_DEBUG', true );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );

define( 'FS_METHOD', 'direct' );
