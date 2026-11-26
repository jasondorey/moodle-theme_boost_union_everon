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
$string['choosereadme'] = 'Everon ialah tema anak Boost Union untuk Project Theme. Ia menyediakan rupa standard Union serta ciri pilihan seperti bar alat kebolehaksesan, Launch Pad, Modus Fokus, susun atur Kursus Saya dan susun atur Papan Pemuka.';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon ialah tema anak Boost Union untuk Project Theme. Utamakan tetapan Rupa/Kandungan Union; Everon menambah ciri seperti bar alat kebolehaksesan, pintasan Launch Pad, Modus Fokus, susun atur kad Kursus Saya dan susun atur Papan Pemuka.';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = 'Pewarisan';
$string['inheritanceinherit'] = 'Warisi';
$string['inheritanceduplicate'] = 'Pendua';
$string['inheritanceoptionsexplanation'] = 'Kebanyakan masa, pewarisan sudah memadai. Walau bagaimanapun, kod yang tidak sempurna mungkin digabungkan ke Boost Union yang menghalang pewarisan SCSS mudah untuk ciri Boost Union tertentu. Jika anda menghadapi isu dengan ciri Boost Union yang nampaknya tidak berfungsi dalam Everon juga, cuba tukar tetapan ini kepada \'Pendua\' dan, jika itu menyelesaikan masalah, laporkan isu di Github (lihat fail README.md untuk butiran cara melaporkan isu).';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'Pewarisan Pre SCSS';
$string['prescssinheritancesetting_desc'] = 'Dengan tetapan ini, anda mengawal sama ada kod pre SCSS daripada Boost Union harus diwarisi atau diduakan.';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'Pewarisan Extra SCSS';
$string['extrascssinheritancesetting_desc'] = 'Dengan tetapan ini, anda mengawal sama ada kod extra SCSS daripada Boost Union harus diwarisi atau diduakan.';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = 'Kebolehaksesan';
$string['accessibilityheading'] = 'Bar alat kebolehaksesan';
$string['accessibilityheading_desc'] = 'Utiliti bar navigasi yang membolehkan setiap pengguna melaraskan kandungan, warna dan alat bantuan. Keutamaan disimpan dalam pelayar (localStorage), bukan dalam keutamaan pengguna Moodle.';
$string['enableaccessibilitytool'] = 'Dayakan bar alat kebolehaksesan';
$string['enableaccessibilitytool_desc'] = 'Tunjukkan ikon kebolehaksesan dalam bar navigasi atas (bersebelahan pemberitahuan/mesej) dan muatkan bar alat. Lalai: Ya.';
$string['accessibilitymenu'] = 'Pilihan kebolehaksesan';
$string['a11ycontentadjustments'] = 'Pelarasan kandungan';
$string['a11ycoloradjustments'] = 'Pelarasan warna';
$string['a11ytools'] = 'Alat';
$string['a11yadjustfontsize'] = 'Laraskan saiz fon';
$string['a11ydecreasefont'] = 'Kecilkan saiz fon';
$string['a11yincreasefont'] = 'Besarkan saiz fon';
$string['a11yhighlighttitle'] = 'Serlahkan tajuk';
$string['a11yhighlightlinks'] = 'Serlahkan pautan';
$string['a11ydyslexiafont'] = 'Fon disleksia';
$string['a11yletterspacing'] = 'Jarak huruf';
$string['a11ylineheight'] = 'Ketinggian baris';
$string['a11yfontweight'] = 'Ketebalan fon';
$string['a11ydarkcontrast'] = 'Kontras gelap';
$string['a11ylightcontrast'] = 'Kontras cerah';
$string['a11yhighcontrast'] = 'Kontras tinggi';
$string['a11yhighsaturation'] = 'Ketepuan tinggi';
$string['a11ylowsaturation'] = 'Ketepuan rendah';
$string['a11ymonochrome'] = 'Monokrom';
$string['a11ycolourmode'] = 'Mod warna';
$string['a11ycolourmodedark'] = 'Gelap';
$string['a11ycolourmodelight'] = 'Cerah';
$string['a11ycolourmodesystem'] = 'Sistem';
$string['a11yreadingguide'] = 'Panduan bacaan';
$string['a11ystopanimations'] = 'Hentikan animasi';
$string['a11ybigcursor'] = 'Kursor besar';
$string['a11yresetall'] = 'Tetapkan semula semua tetapan kebolehaksesan';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = 'Ikon bar navigasi yang membuka pautan pintasan mengikut peranan. Pentadbir tapak ialah pek lalai; tambah peranan tapak lain mengikut keperluan. Pek yang sepadan digabungkan dan dinyahgandakan mengikut URL. Ikon disembunyikan apabila Launch Pad dilumpuhkan atau pengguna semasa tiada pautan.';
$string['enablelaunchpad'] = 'Dayakan Launch Pad';
$string['enablelaunchpad_desc'] = 'Tunjukkan ikon Launch Pad dalam bar navigasi atas (selepas alat kebolehaksesan, sebelum menu pengguna) apabila pengguna mempunyai sekurang-kurangnya satu pautan dikonfigurasi. Lalai: Tidak — dayakan selepas anda menambah pautan JSON di bawah.';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = 'Tatasusunan JSON objek dengan <code>label</code>, <code>url</code> (laluan relatif tapak seperti <code>/admin/search.php</code>), dan <code>icon</code> pilihan (kelas Font Awesome, cth. <code>fa-cog</code>). URL luaran ditolak dalam v1. Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = 'Pautan: Pentadbir tapak';
$string['launchpadlinks_siteadmin_desc'] = 'Ditunjukkan apabila pengguna ialah pentadbir tapak (<code>is_siteadmin()</code>).';
$string['launchpadlinks_manager'] = 'Pautan: Pengurus';
$string['launchpadlinks_manager_desc'] = 'Tetapan MVP legasi (dimigrasikan ke pek peranan pengurus apabila boleh).';
$string['launchpadlinks_authenticated'] = 'Pautan: Pengguna disahkan';
$string['launchpadlinks_authenticated_desc'] = 'Sandaran untuk setiap pengguna dilog masuk bukan tetamu. Digabungkan selepas siteadmin dan pek peranan.';

$string['launchpadrolelinks'] = 'Pek pautan peranan';
$string['launchpadrolelinks_desc'] = 'Konfigurasi senarai pautan JSON. Pentadbir tapak sentiasa ada (lalai). Gunakan Tambah peranan untuk mana-mana peranan tapak lain. Pek peranan sepadan apabila pengguna mempunyai peranan itu dalam mana-mana konteks. Stor menggunakan id peranan; label menunjukkan nama peranan semasa.';
$string['launchpadbuiltinpacks'] = 'Pek terbina dalam';
$string['launchpadconfiguredroles'] = 'Pek dikonfigurasi';
$string['launchpadaddrole'] = 'Tambah peranan';
$string['launchpadremoverole'] = 'Buang';
$string['launchpadchooserole'] = 'Pilih peranan…';
$string['launchpadlinks_role'] = 'Pautan: {$a}';
$string['launchpadrolemissing'] = 'Peranan #{$a} (tiada)';
$string['launchpadrolemapinvalid'] = 'Pautan peranan Launch Pad mestilah objek JSON yang memetakan kunci pek kepada tatasusunan pautan.';

$string['launchpadjsoninvalid'] = 'Pautan Launch Pad mestilah tatasusunan JSON objek, setiap satu dengan label dan url yang tidak kosong.';
$string['launchpad_section_global'] = 'Global';
$string['launchpad_item_appearance'] = 'Penampilan';
$string['launchpad_item_certifications'] = 'Pensijilan';
$string['launchpad_item_customreports'] = 'Laporan tersuai';
$string['launchpad_item_dynamicrules'] = 'Peraturan dinamik';
$string['launchpad_item_orgstructure'] = 'Struktur organisasi';
$string['launchpad_item_programs'] = 'Program';
$string['launchpad_item_users'] = 'Pengguna';
$string['launchpad_item_catalogue'] = 'Katalog';
$string['launchpad_item_customhomepages'] = 'Halaman utama tersuai';
$string['launchpad_item_alltenants'] = 'Semua penyewa';
$string['launchpad_item_allusers'] = 'Semua pengguna';
$string['launchpad_item_certificates'] = 'Sijil';
$string['launchpad_item_courses'] = 'Kursus';
$string['launchpad_item_custompages'] = 'Halaman tersuai';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = 'Modus Fokus';
$string['focusmodeheading'] = 'Modus Fokus';
$string['focusmodeheading_desc'] = 'Kawalan terapung pada halaman kandungan kursus, Papan Pemuka (/my/), Kursus Saya (/my/courses.php), dan halaman utama tersuai MuTMS yang menyembunyikan navigasi sekunder dan laci serta melebarkan kandungan utama. Keutamaan disimpan bagi setiap kursus atau halaman dalam pelayar (localStorage).';
$string['enablefocusmode'] = 'Dayakan Modus Fokus';
$string['enablefocusmode_desc'] = 'Tunjukkan butang Modus Fokus (bahagian bawah kanan) pada halaman utama kursus, bahagian dan aktiviti serta Papan Pemuka (/my/), Kursus Saya (/my/courses.php), dan halaman utama tersuai MuTMS. Lalai: Ya.';
$string['focusmodeenable'] = 'Modus Fokus';
$string['focusmodedisable'] = 'Keluar modus fokus';
$string['focusmodenotice'] = 'Modus Fokus dihidupkan. Klik × di bahagian bawah kanan untuk mematikannya.';


// Settings: User menu tiles tab.
$string['usermenutab'] = 'Menu pengguna';
$string['usermenuheading'] = 'Jubin menu pengguna';
$string['usermenuheading_desc'] = 'Gayakan semula menu profil sebagai grid jubin bergaya Launch Pad (destinasi Boost yang sama). Krom panel sudah sepadan dengan Kebolehaksesan / Launch Pad. Matikan untuk mengekalkan senarai pautan menegak.';
$string['enableusermenutiles'] = 'Dayakan jubin menu pengguna';
$string['enableusermenutiles_desc'] = 'Tunjukkan item menu profil sebagai grid jubin 3 lajur dengan ikon Font Awesome. Lalai: Ya. Tetapkan kepada Tidak untuk senarai menegak.';

// Settings: Compact navbar tab.
$string['navbartab'] = 'Bar navigasi';
$string['navbarheading'] = 'Bar navigasi padat';
$string['navbarheading_desc'] = 'Bar atas sedikit lebih ketat, garis bawah pautan aktif lebih jelas, dan sasaran klik ikon utiliti yang konsisten. Logo tapak dan warna jenama kekal dalam Boost Union → Look (laluan berbilang klien). Susun atur log masuk tidak berubah (log masuk Boost Union sahaja).';
$string['enablecompactnavbar'] = 'Dayakan bar navigasi padat';
$string['enablecompactnavbar_desc'] = 'Gunakan krom bar navigasi padat pada semua halaman kecuali log masuk. Lalai: Ya. Matikan untuk menggunakan ketinggian bar standard Boost Union.';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = 'Kursus Saya';
$string['mycoursesheading'] = 'Susun atur Kursus Saya';
$string['mycoursesheading_desc'] = 'Kulit grid kad pilihan pada halaman Kursus Saya (/my/courses.php) pada lebar lalai Moodle / Boost Union (boleh dilebarkan melalui Modus Fokus). Menyelubungi blok Gambaran keseluruhan kursus standard — tidak menggantikannya. Carian, pengelompokan, isihan dan mod paparan kekal Moodle teras.';
$string['enablemycourseslayout'] = 'Dayakan susun atur Kursus Saya';
$string['enablemycourseslayout_desc'] = 'Menunjukkan grid kad responsif (1–3 lajur pada lebar lalai, melebar sehingga 5 lajur dalam Modus Fokus) dan menggayakan semula kad (bayang, kemajuan bulat pada imej, bintang pada imej). Lalai: Ya.';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = 'Statistik Kursus Saya';
$string['mycoursesstatsheading_desc'] = 'Jalur statistik pilihan di bahagian atas Kursus Saya (/my/courses.php) untuk pengguna semasa: Pendaftaran, Penyelesaian, Lencana dan Sijil. Setiap panel boleh didayakan secara berasingan.';
$string['enablemycoursesstats'] = 'Dayakan statistik Kursus Saya';
$string['enablemycoursesstats_desc'] = 'Tunjukkan jalur statistik di atas gambaran keseluruhan kursus pada Kursus Saya. Lalai: Ya.';
$string['mycoursesstatsenrolments'] = 'Tunjukkan panel Pendaftaran';
$string['mycoursesstatsenrolments_desc'] = 'Bilangan kursus aktif (sedang berlangsung) pengguna semasa. Lalai: Ya.';
$string['mycoursesstatscompletions'] = 'Tunjukkan panel Penyelesaian';
$string['mycoursesstatscompletions_desc'] = 'Bilangan kursus yang telah diselesaikan pengguna semasa. Lalai: Ya.';
$string['mycoursesstatsbadges'] = 'Tunjukkan panel Lencana';
$string['mycoursesstatsbadges_desc'] = 'Bilangan lencana yang dianugerahkan kepada pengguna semasa. Lalai: Ya.';
$string['mycoursesstatscertificates'] = 'Tunjukkan panel Sijil';
$string['mycoursesstatscertificates_desc'] = 'Bilangan sijil yang dianugerahkan kepada pengguna semasa (tool_certificate atau mod_customcert apabila dipasang; jika tidak 0). Lalai: Ya.';
$string['mycoursesstatsaria'] = 'Statistik kursus saya';
$string['mycoursesstatsenrolmentstitle'] = 'Pendaftaran';
$string['mycoursesstatsenrolmentssub'] = '{$a} Kursus aktif';
$string['mycoursesstatscompletionstitle'] = 'Penyelesaian';
$string['mycoursesstatscompletionssub'] = '{$a} Kursus selesai';
$string['mycoursesstatsbadgestitle'] = 'Lencana';
$string['mycoursesstatsbadgessub'] = '{$a} Dianugerahkan';
$string['mycoursesstatscertificatestitle'] = 'Sijil';
$string['mycoursesstatscertificatessub'] = '{$a} Dianugerahkan';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = 'Papan Pemuka';
$string['dashboardheading'] = 'Susun atur Papan Pemuka';
$string['dashboardheading_desc'] = 'Kulit grid kad Papan Pemuka dan permukaan blok pilihan pada /my/ pada lebar lalai Moodle / Boost Union (boleh dilebarkan melalui Modus Fokus), berkongsi krom kad Gambaran keseluruhan kursus dengan Kursus Saya. Susun atur lajur (Kalendar / Acara akan datang di kanan) menggunakan Boost Union Outside (kanan) — konfigurasi di bawah Feel → Blocks.';
$string['enabledashboardlayout'] = 'Dayakan susun atur Papan Pemuka';
$string['enabledashboardlayout_desc'] = 'Menggunakan krom kad Gambaran keseluruhan kursus yang sama seperti Kursus Saya pada Papan Pemuka (1–3 lajur pada lebar lalai, melebar kepada 4 lajur dalam Modus Fokus). Juga menyatukan permukaan blok Timeline / Calendar / Upcoming dan melembutkan keadaan kosong agar sepadan. Lalai: Ya. Dayakan Boost Union Outside (kanan) secara berasingan untuk lajur kanan.';
$string['dashboardsurfacesnote'] = 'Apabila susun atur Papan Pemuka didayakan, Everon juga menggunakan token permukaan blok kongsi (sempadan lembut, jejari, bayang) dan gaya keadaan kosong Timeline / Upcoming yang lebih tenang supaya blok sokongan sepadan dengan kad kursus.';

// Privacy API.
$string['privacy:metadata'] = 'Tema Everon tidak menyimpan sebarang data peribadi tentang mana-mana pengguna. Keutamaan Kebolehaksesan dan Modus Fokus disimpan dalam pelayar sahaja. Pautan Launch Pad, susun atur Kursus Saya, statistik Kursus Saya, susun atur Papan Pemuka dan bar navigasi padat ialah tetapan pentadbir seluruh tapak.';
