<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Theme Everon - Language pack
 *
 * @package    theme_boost_union_everon
 * @copyright  2023 Daniel Poggenpohl <daniel.poggenpohl@fernuni-hagen.de> and Alexander Bias <bias@alexanderbias.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Let codechecker ignore some sniffs for this file as it is perfectly well ordered, just not alphabetically.
// phpcs:disable moodle.Files.LangFilesOrdering.UnexpectedComment
// phpcs:disable moodle.Files.LangFilesOrdering.IncorrectOrder

// General.
$string['pluginname'] = 'Everon';
$string['choosereadme'] = 'Everon adalah tema anak Boost Union untuk Project Theme. Menyediakan tampilan standar Union plus fitur opsional seperti bilah alat aksesibilitas, Launch Pad, Mode Fokus, tata letak Kursus Saya, dan tata letak Dasbor.';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon adalah tema anak Boost Union untuk Project Theme. Utamakan pengaturan Tampilan/Konten Union; Everon menambahkan fitur seperti bilah alat aksesibilitas, pintasan Launch Pad, Mode Fokus, tata letak kartu Kursus Saya, dan tata letak Dasbor.';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = 'Pewarisan';
$string['inheritanceinherit'] = 'Warisi';
$string['inheritanceduplicate'] = 'Duplikat';
$string['inheritanceoptionsexplanation'] = 'Sebagian besar waktu, mewarisi sudah sangat memadai. Namun, kode yang belum sempurna mungkin terintegrasi ke Boost Union sehingga mencegah pewarisan SCSS sederhana untuk fitur Boost Union tertentu. Jika Anda mengalami masalah dengan fitur Boost Union yang tampaknya juga tidak berfungsi di Everon, coba ubah pengaturan ini ke \'Duplikat\' dan, jika itu menyelesaikan masalah, laporkan isu di Github (lihat berkas README.md untuk detail cara melaporkan isu).';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'Pewarisan Pre SCSS';
$string['prescssinheritancesetting_desc'] = 'Dengan pengaturan ini, Anda mengontrol apakah kode pre SCSS dari Boost Union harus diwarisi atau diduplikasi.';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'Pewarisan Extra SCSS';
$string['extrascssinheritancesetting_desc'] = 'Dengan pengaturan ini, Anda mengontrol apakah kode extra SCSS dari Boost Union harus diwarisi atau diduplikasi.';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = 'Aksesibilitas';
$string['accessibilityheading'] = 'Bilah alat aksesibilitas';
$string['accessibilityheading_desc'] = 'Utilitas bilah navigasi yang memungkinkan setiap pengguna menyesuaikan konten, warna, dan alat bantu. Preferensi disimpan di peramban (localStorage), bukan di preferensi pengguna Moodle.';
$string['enableaccessibilitytool'] = 'Aktifkan bilah alat aksesibilitas';
$string['enableaccessibilitytool_desc'] = 'Tampilkan ikon aksesibilitas di bilah navigasi atas (di samping notifikasi/pesan) dan muat bilah alat. Default: Ya.';
$string['accessibilitymenu'] = 'Opsi aksesibilitas';
$string['a11ycontentadjustments'] = 'Penyesuaian konten';
$string['a11ycoloradjustments'] = 'Penyesuaian warna';
$string['a11ytools'] = 'Alat';
$string['a11yadjustfontsize'] = 'Sesuaikan ukuran font';
$string['a11ydecreasefont'] = 'Perkecil ukuran font';
$string['a11yincreasefont'] = 'Perbesar ukuran font';
$string['a11yhighlighttitle'] = 'Sorot judul';
$string['a11yhighlightlinks'] = 'Sorot tautan';
$string['a11ydyslexiafont'] = 'Font disleksia';
$string['a11yletterspacing'] = 'Spasi huruf';
$string['a11ylineheight'] = 'Tinggi baris';
$string['a11yfontweight'] = 'Ketebalan font';
$string['a11ydarkcontrast'] = 'Kontras gelap';
$string['a11ylightcontrast'] = 'Kontras terang';
$string['a11yhighcontrast'] = 'Kontras tinggi';
$string['a11yhighsaturation'] = 'Saturasi tinggi';
$string['a11ylowsaturation'] = 'Saturasi rendah';
$string['a11ymonochrome'] = 'Monokrom';
$string['a11ydarkmode'] = 'Mode gelap';
$string['a11yreadingguide'] = 'Panduan membaca';
$string['a11ystopanimations'] = 'Hentikan animasi';
$string['a11ybigcursor'] = 'Kursor besar';
$string['a11yresetall'] = 'Atur ulang semua pengaturan aksesibilitas';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = 'Ikon bilah navigasi yang membuka tautan pintasan sesuai peran. Administrator situs adalah paket default; tambahkan peran situs lain sesuai kebutuhan. Paket yang cocok digabung dan deduplikasi menurut URL. Ikon disembunyikan saat Launch Pad dinonaktifkan atau pengguna saat ini tidak memiliki tautan.';
$string['enablelaunchpad'] = 'Aktifkan Launch Pad';
$string['enablelaunchpad_desc'] = 'Tampilkan ikon Launch Pad di bilah navigasi atas (setelah alat aksesibilitas, sebelum menu pengguna) ketika pengguna memiliki setidaknya satu tautan yang dikonfigurasi. Default: Tidak — aktifkan setelah Anda menambahkan tautan JSON di bawah.';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = 'Array JSON objek dengan <code>label</code>, <code>url</code> (jalur relatif situs seperti <code>/admin/search.php</code>), dan <code>icon</code> opsional (kelas Font Awesome, mis. <code>fa-cog</code>). URL eksternal ditolak di v1. Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = 'Tautan: Administrator situs';
$string['launchpadlinks_siteadmin_desc'] = 'Ditampilkan ketika pengguna adalah administrator situs (<code>is_siteadmin()</code>).';
$string['launchpadlinks_manager'] = 'Tautan: Manajer';
$string['launchpadlinks_manager_desc'] = 'Pengaturan MVP warisan (dimigrasikan ke paket peran manajer jika memungkinkan).';
$string['launchpadlinks_authenticated'] = 'Tautan: Pengguna terautentikasi';
$string['launchpadlinks_authenticated_desc'] = 'Cadangan untuk setiap pengguna masuk non-tamu. Digabung setelah siteadmin dan paket peran.';

$string['launchpadrolelinks'] = 'Paket tautan peran';
$string['launchpadrolelinks_desc'] = 'Konfigurasi daftar tautan JSON. Administrator situs selalu ada (default). Gunakan Tambah peran untuk peran situs lainnya. Paket peran cocok ketika pengguna memiliki peran itu di konteks apa pun. Penyimpanan memakai id peran; label menampilkan nama peran saat ini.';
$string['launchpadbuiltinpacks'] = 'Paket bawaan';
$string['launchpadconfiguredroles'] = 'Paket yang dikonfigurasi';
$string['launchpadaddrole'] = 'Tambah peran';
$string['launchpadremoverole'] = 'Hapus';
$string['launchpadchooserole'] = 'Pilih peran…';
$string['launchpadlinks_role'] = 'Tautan: {$a}';
$string['launchpadrolemissing'] = 'Peran #{$a} (hilang)';
$string['launchpadrolemapinvalid'] = 'Tautan peran Launch Pad harus berupa objek JSON yang memetakan kunci paket ke array tautan.';

$string['launchpadjsoninvalid'] = 'Tautan Launch Pad harus berupa array JSON objek, masing-masing dengan label dan url yang tidak kosong.';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = 'Mode Fokus';
$string['focusmodeheading'] = 'Mode Fokus';
$string['focusmodeheading_desc'] = 'Kontrol mengambang di halaman konten kursus, Dasbor (/my/), Kursus Saya (/my/courses.php), dan halaman beranda kustom MuTMS yang menyembunyikan navigasi sekunder dan laci serta memperlebar konten utama. Preferensi disimpan per kursus atau halaman di peramban (localStorage).';
$string['enablefocusmode'] = 'Aktifkan Mode Fokus';
$string['enablefocusmode_desc'] = 'Tampilkan tombol Mode Fokus (kanan bawah) di halaman beranda kursus, bagian, dan aktivitas serta di Dasbor (/my/), Kursus Saya (/my/courses.php), dan halaman beranda kustom MuTMS. Default: Ya.';
$string['focusmodeenable'] = 'Mode fokus';
$string['focusmodedisable'] = 'Keluar dari mode fokus';
$string['focusmodenotice'] = 'Mode fokus aktif. Klik × di kanan bawah untuk mematikannya.';


// Settings: User menu tiles tab.
$string['usermenutab'] = 'Menu pengguna';
$string['usermenuheading'] = 'Ubin menu pengguna';
$string['usermenuheading_desc'] = 'Menata ulang menu profil sebagai kisi ubin bergaya Launch Pad (tujuan Boost yang sama). Krom panel sudah cocok dengan Aksesibilitas / Launch Pad. Matikan untuk mempertahankan daftar tautan vertikal.';
$string['enableusermenutiles'] = 'Aktifkan ubin menu pengguna';
$string['enableusermenutiles_desc'] = 'Tampilkan item menu profil sebagai kisi ubin 3 kolom dengan ikon Font Awesome. Default: Ya. Setel ke Tidak untuk daftar vertikal.';

// Settings: Compact navbar tab.
$string['navbartab'] = 'Bilah navigasi';
$string['navbarheading'] = 'Bilah navigasi ringkas';
$string['navbarheading_desc'] = 'Bilah atas sedikit lebih rapat, garis bawah tautan aktif lebih jelas, dan area klik ikon utilitas yang konsisten. Logo situs dan warna merek tetap di Boost Union → Tampilan (jalur multi-klien). Tata letak masuk tidak berubah (hanya masuk Boost Union).';
$string['enablecompactnavbar'] = 'Aktifkan bilah navigasi ringkas';
$string['enablecompactnavbar_desc'] = 'Terapkan krom bilah navigasi ringkas di semua halaman kecuali masuk. Default: Ya. Matikan untuk memakai tinggi bilah standar Boost Union.';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = 'Kursus Saya';
$string['mycoursesheading'] = 'Tata letak Kursus Saya';
$string['mycoursesheading_desc'] = 'Tampilan kisi kartu opsional di halaman Kursus Saya (/my/courses.php) pada lebar default Moodle / Boost Union (dapat diperlebar lewat Mode Fokus). Memberi kulit pada blok Ikhtisar kursus standar — tidak menggantikannya. Pencarian, pengelompokan, pengurutan, dan mode tampilan tetap Moodle inti.';
$string['enablemycourseslayout'] = 'Aktifkan tata letak Kursus Saya';
$string['enablemycourseslayout_desc'] = 'Menampilkan kisi kartu responsif (1–3 kolom pada lebar default, melebar hingga 5 kolom di Mode Fokus) dan menata ulang kartu (bayangan, progres melingkar pada gambar, bintang pada gambar). Default: Ya.';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = 'Statistik Kursus Saya';
$string['mycoursesstatsheading_desc'] = 'Pita statistik opsional di bagian atas Kursus Saya (/my/courses.php) untuk pengguna saat ini: Pendaftaran, Penyelesaian, Lencana, dan Sertifikat. Setiap panel dapat diaktifkan secara mandiri.';
$string['enablemycoursesstats'] = 'Aktifkan statistik Kursus Saya';
$string['enablemycoursesstats_desc'] = 'Tampilkan pita statistik di atas ikhtisar kursus pada Kursus Saya. Default: Ya.';
$string['mycoursesstatsenrolments'] = 'Tampilkan panel Pendaftaran';
$string['mycoursesstatsenrolments_desc'] = 'Jumlah kursus aktif (sedang berlangsung) pengguna saat ini. Default: Ya.';
$string['mycoursesstatscompletions'] = 'Tampilkan panel Penyelesaian';
$string['mycoursesstatscompletions_desc'] = 'Jumlah kursus yang telah diselesaikan pengguna saat ini. Default: Ya.';
$string['mycoursesstatsbadges'] = 'Tampilkan panel Lencana';
$string['mycoursesstatsbadges_desc'] = 'Jumlah lencana yang diberikan kepada pengguna saat ini. Default: Ya.';
$string['mycoursesstatscertificates'] = 'Tampilkan panel Sertifikat';
$string['mycoursesstatscertificates_desc'] = 'Jumlah sertifikat yang diberikan kepada pengguna saat ini (tool_certificate atau mod_customcert jika terpasang; jika tidak 0). Default: Ya.';
$string['mycoursesstatsaria'] = 'Statistik kursus saya';
$string['mycoursesstatsenrolmentstitle'] = 'Pendaftaran';
$string['mycoursesstatsenrolmentssub'] = '{$a} Kursus aktif';
$string['mycoursesstatscompletionstitle'] = 'Penyelesaian';
$string['mycoursesstatscompletionssub'] = '{$a} Kursus selesai';
$string['mycoursesstatsbadgestitle'] = 'Lencana';
$string['mycoursesstatsbadgessub'] = '{$a} Diberikan';
$string['mycoursesstatscertificatestitle'] = 'Sertifikat';
$string['mycoursesstatscertificatessub'] = '{$a} Diberikan';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = 'Dasbor';
$string['dashboardheading'] = 'Tata letak Dasbor';
$string['dashboardheading_desc'] = 'Tampilan kisi kartu Dasbor dan permukaan blok opsional di /my/ pada lebar default Moodle / Boost Union (dapat diperlebar lewat Mode Fokus), berbagi krom kartu Ikhtisar kursus dengan Kursus Saya. Tata letak kolom (Kalender / Acara mendatang di kanan) menggunakan Boost Union Outside (kanan) — konfigurasi di Feel → Blocks.';
$string['enabledashboardlayout'] = 'Aktifkan tata letak Dasbor';
$string['enabledashboardlayout_desc'] = 'Menerapkan krom kartu Ikhtisar kursus yang sama seperti Kursus Saya di Dasbor (1–3 kolom pada lebar default, melebar menjadi 4 kolom di Mode Fokus). Juga menyatukan permukaan blok Timeline / Calendar / Upcoming dan memperlembut keadaan kosong agar cocok. Default: Ya. Aktifkan Boost Union Outside (kanan) secara terpisah untuk kolom kanan.';
$string['dashboardsurfacesnote'] = 'Saat tata letak Dasbor diaktifkan, Everon juga menerapkan token permukaan blok bersama (batas lembut, radius, bayangan) dan gaya keadaan kosong Timeline / Upcoming yang lebih tenang agar blok pendukung cocok dengan kartu kursus.';

// Privacy API.
$string['privacy:metadata'] = 'Tema Everon tidak menyimpan data pribadi apa pun tentang pengguna mana pun. Preferensi Aksesibilitas dan Mode Fokus hanya disimpan di peramban. Tautan Launch Pad, tata letak Kursus Saya, statistik Kursus Saya, tata letak Dasbor, dan bilah navigasi ringkas adalah pengaturan admin di seluruh situs.';
