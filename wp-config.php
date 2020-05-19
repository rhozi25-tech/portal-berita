<?php
/**
 * Konfigurasi dasar WordPress.
 *
 * Berkas ini berisi konfigurasi-konfigurasi berikut: Pengaturan MySQL, Awalan Tabel,
 * Kunci Rahasia, Bahasa WordPress, dan ABSPATH. Anda dapat menemukan informasi lebih
 * lanjut dengan mengunjungi Halaman Codex {@link http://codex.wordpress.org/Editing_wp-config.php
 * Menyunting wp-config.php}. Anda dapat memperoleh pengaturan MySQL dari web host Anda.
 *
 * Berkas ini digunakan oleh skrip penciptaan wp-config.php selama proses instalasi.
 * Anda tidak perlu menggunakan situs web, Anda dapat langsung menyalin berkas ini ke
 * "wp-config.php" dan mengisi nilai-nilainya.
 *
 * @package WordPress
 */

// ** Pengaturan MySQL - Anda dapat memperoleh informasi ini dari web host Anda ** //
/** Nama basis data untuk WordPress */
define( 'DB_NAME', 'portal' );

/** Nama pengguna basis data MySQL */
define( 'DB_USER', 'root' );

/** Kata sandi basis data MySQL */
define( 'DB_PASSWORD', '' );

/** Nama host MySQL */
define( 'DB_HOST', 'localhost' );

/** Set Karakter Basis Data yang digunakan untuk menciptakan tabel basis data. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Jenis Collate Basis Data. Jangan ubah ini jika ragu. */
define('DB_COLLATE', '');

/**#@+
 * Kunci Otentifikasi Unik dan Garam.
 *
 * Ubah baris berikut menjadi frase unik!
 * Anda dapat menciptakan frase-frase ini menggunakan {@link https://api.wordpress.org/secret-key/1.1/salt/ Layanan kunci-rahasia WordPress.org}
 * Anda dapat mengubah baris-baris berikut kapanpun untuk mencabut validasi seluruh cookies. Hal ini akan memaksa seluruh pengguna untuk masuk log ulang.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '{#%S;PCA|j}:pBhE=U)(Sxc0TQ9I:_ptLZ1=7_ay;F`9cVY,H&Z4%)7cww8!AV1y' );
define( 'SECURE_AUTH_KEY',  '1H$NN%O!Lra}~yr`S1L/`np[>l2DC#LC^YSiVq[jeK(Jr<~2]b*8%]p;XkdZc`H?' );
define( 'LOGGED_IN_KEY',    'QG$n}4Swn7ze?fCO~(6To-39j]AtO4kd~9%Ik+clB[xfA;p.9$~!bETZY 8$gG9/' );
define( 'NONCE_KEY',        'qPSZ:R9qh^DmV9GJlAeK!@]^MteX,ibg#,Ft%NR3 6T@l1~?sT 6al*aegh|>%~|' );
define( 'AUTH_SALT',        '8gbiRt]|qjq$Vv`#f+wP?MFCn|mSW!Rhj9?d.TmyTCN;`&_wj&j7YdnY9D9Uxs}P' );
define( 'SECURE_AUTH_SALT', '3i$*WlqjPGsM2p_9r!I#^Ez8a!7cuM3tnIJ;]^<4UZwD38?i{Tq-adzy{cdZkxJ#' );
define( 'LOGGED_IN_SALT',   'r[._,s* H3Nt$)BR}U> @|^LTZF+PR,#[mR@a$6k:*Zl$SO=/).`C={tX `ki}]O' );
define( 'NONCE_SALT',       ';8_%%y.Q^7L7Iz?4j1tRB9$l~*BT/2%2O~f~dlqALRJVACrEXBU;-gM? jI%Js.T' );

/**#@-*/

/**
 * Awalan Tabel Basis Data WordPress.
 *
 * Anda dapat memiliki beberapa instalasi di dalam satu basis data jika Anda memberikan awalan unik
 * kepada masing-masing tabel. Harap hanya masukkan angka, huruf, dan garis bawah!
 */
$table_prefix = 'wp_';

/**
 * Untuk pengembang: Moda pengawakutuan WordPress.
 *
 * Ubah ini menjadi "true" untuk mengaktifkan tampilan peringatan selama pengembangan.
 * Sangat disarankan agar pengembang plugin dan tema menggunakan WP_DEBUG
 * di lingkungan pengembangan mereka.
 */
define('WP_DEBUG', false);

/* Cukup, berhenti menyunting! Selamat ngeblog. */

/** Lokasi absolut direktori WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Menentukan variabel-variabel WordPress berkas-berkas yang disertakan. */
require_once(ABSPATH . 'wp-settings.php');
