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
$string['choosereadme'] = 'Everon เป็นธีมลูกของ Boost Union สำหรับ Project Theme มีรูปลักษณ์มาตรฐานของ Union พร้อมฟีเจอร์เสริม เช่น แถบเครื่องมือการเข้าถึง Launch Pad โหมดโฟกัส เลย์เอาต์หลักสูตรของฉัน และเลย์เอาต์แดชบอร์ด';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon เป็นธีมลูกของ Boost Union สำหรับ Project Theme แนะนำให้ใช้การตั้งค่า Look/Content ของ Union; Everon เพิ่มฟีเจอร์ เช่น แถบเครื่องมือการเข้าถึง ทางลัด Launch Pad โหมดโฟกัส เลย์เอาต์การ์ดหลักสูตรของฉัน และเลย์เอาต์แดชบอร์ด';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = 'การสืบทอด';
$string['inheritanceinherit'] = 'สืบทอด';
$string['inheritanceduplicate'] = 'ทำซ้ำ';
$string['inheritanceoptionsexplanation'] = 'โดยส่วนใหญ่การสืบทอดก็เพียงพอแล้ว อย่างไรก็ตาม อาจมีโค้ดที่ไม่สมบูรณ์ถูกผสานเข้า Boost Union ซึ่งขัดขวางการสืบทอด SCSS อย่างง่ายสำหรับฟีเจอร์บางอย่างของ Boost Union หากคุณพบปัญหาฟีเจอร์ Boost Union ที่ดูเหมือนไม่ทำงานใน Everon เช่นกัน ให้ลองเปลี่ยนการตั้งค่านี้เป็น \'ทำซ้ำ\' และหากแก้ปัญหาได้ ให้รายงานปัญหาบน Github (ดูไฟล์ README.md สำหรับรายละเอียดการรายงานปัญหา)';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'การสืบทอด Pre SCSS';
$string['prescssinheritancesetting_desc'] = 'ด้วยการตั้งค่านี้ คุณควบคุมว่าจะสืบทอดหรือทำซ้ำโค้ด pre SCSS จาก Boost Union';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'การสืบทอด Extra SCSS';
$string['extrascssinheritancesetting_desc'] = 'ด้วยการตั้งค่านี้ คุณควบคุมว่าจะสืบทอดหรือทำซ้ำโค้ด extra SCSS จาก Boost Union';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = 'การเข้าถึง';
$string['accessibilityheading'] = 'แถบเครื่องมือการเข้าถึง';
$string['accessibilityheading_desc'] = 'ยูทิลิตี้ในแถบนำทางที่ให้ผู้ใช้แต่ละคนปรับเนื้อหา สี และเครื่องมือช่วยเหลือ ค่ากำหนดถูกเก็บในเบราว์เซอร์ (localStorage) ไม่ใช่ในค่ากำหนดผู้ใช้ Moodle';
$string['enableaccessibilitytool'] = 'เปิดใช้แถบเครื่องมือการเข้าถึง';
$string['enableaccessibilitytool_desc'] = 'แสดงไอคอนการเข้าถึงในแถบนำทางด้านบน (ถัดจาก การแจ้งเตือน/ข้อความ) และโหลดแถบเครื่องมือ ค่าเริ่มต้น: ใช่';
$string['accessibilitymenu'] = 'ตัวเลือกการเข้าถึง';
$string['a11ycontentadjustments'] = 'การปรับเนื้อหา';
$string['a11ycoloradjustments'] = 'การปรับสี';
$string['a11ytools'] = 'เครื่องมือ';
$string['a11yadjustfontsize'] = 'ปรับขนาดตัวอักษร';
$string['a11ydecreasefont'] = 'ลดขนาดตัวอักษร';
$string['a11yincreasefont'] = 'เพิ่มขนาดตัวอักษร';
$string['a11yhighlighttitle'] = 'เน้นชื่อเรื่อง';
$string['a11yhighlightlinks'] = 'เน้นลิงก์';
$string['a11ydyslexiafont'] = 'แบบอักษรสำหรับดิสเล็กเซีย';
$string['a11yletterspacing'] = 'ระยะห่างตัวอักษร';
$string['a11ylineheight'] = 'ความสูงบรรทัด';
$string['a11yfontweight'] = 'น้ำหนักตัวอักษร';
$string['a11ydarkcontrast'] = 'คอนทราสต์มืด';
$string['a11ylightcontrast'] = 'คอนทราสต์สว่าง';
$string['a11yhighcontrast'] = 'คอนทราสต์สูง';
$string['a11yhighsaturation'] = 'ความอิ่มตัวสูง';
$string['a11ylowsaturation'] = 'ความอิ่มตัวต่ำ';
$string['a11ymonochrome'] = 'ขาวดำ';
$string['a11ydarkmode'] = 'โหมดมืด';
$string['a11yreadingguide'] = 'ไกด์การอ่าน';
$string['a11ystopanimations'] = 'หยุดแอนิเมชัน';
$string['a11ybigcursor'] = 'เคอร์เซอร์ใหญ่';
$string['a11yresetall'] = 'รีเซ็ตการตั้งค่าการเข้าถึงทั้งหมด';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = 'ไอคอนแถบนำทางที่เปิดลิงก์ทางลัดตามบทบาท แพ็กเริ่มต้นคือ ผู้ดูแลไซต์; เพิ่มบทบาทไซต์อื่นตามต้องการ แพ็กที่ตรงกันจะถูกรวมและตัดรายการซ้ำตาม URL ไอคอนจะถูกซ่อนเมื่อปิด Launch Pad หรือผู้ใช้ปัจจุบันไม่มีลิงก์';
$string['enablelaunchpad'] = 'เปิดใช้ Launch Pad';
$string['enablelaunchpad_desc'] = 'แสดงไอคอน Launch Pad ในแถบนำทางด้านบน (หลังเครื่องมือการเข้าถึง ก่อนเมนูผู้ใช้) เมื่อผู้ใช้มีลิงก์ที่กำหนดอย่างน้อยหนึ่งรายการ ค่าเริ่มต้น: ไม่ — เปิดใช้หลังจากเพิ่มลิงก์ JSON ด้านล่าง';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = 'อาร์เรย์ JSON ของอ็อบเจ็กต์ที่มี <code>label</code>, <code>url</code> (พาธสัมพัทธ์ไซต์ เช่น <code>/admin/search.php</code>) และ <code>icon</code> ที่เป็นทางเลือก (คลาส Font Awesome เช่น <code>fa-cog</code>) URL ภายนอกจะถูกปฏิเสธใน v1 Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = 'ลิงก์: ผู้ดูแลไซต์';
$string['launchpadlinks_siteadmin_desc'] = 'แสดงเมื่อผู้ใช้เป็นผู้ดูแลไซต์ (<code>is_siteadmin()</code>)';
$string['launchpadlinks_manager'] = 'ลิงก์: ผู้จัดการ';
$string['launchpadlinks_manager_desc'] = 'การตั้งค่า MVP รุ่นเก่า (ย้ายไปเป็นแพ็กบทบาทผู้จัดการเมื่อเป็นไปได้)';
$string['launchpadlinks_authenticated'] = 'ลิงก์: ผู้ใช้ที่ยืนยันตัวตนแล้ว';
$string['launchpadlinks_authenticated_desc'] = 'ทางเลือกสำรองสำหรับผู้ใช้ที่เข้าสู่ระบบทุกคนที่ไม่ใช่แขก รวมหลัง siteadmin และแพ็กบทบาท';

$string['launchpadrolelinks'] = 'แพ็กลิงก์ตามบทบาท';
$string['launchpadrolelinks_desc'] = 'กำหนดรายการลิงก์ JSON ผู้ดูแลไซต์มีอยู่เสมอ (ค่าเริ่มต้น) ใช้ เพิ่มบทบาท สำหรับบทบาทไซต์อื่น แพ็กบทบาทจะตรงเมื่อผู้ใช้มีบทบาทนั้นในบริบทใดก็ได้ ที่เก็บใช้รหัสบทบาท; ป้ายแสดงชื่อบทบาทปัจจุบัน';
$string['launchpadbuiltinpacks'] = 'แพ็กในตัว';
$string['launchpadconfiguredroles'] = 'แพ็กที่กำหนดไว้';
$string['launchpadaddrole'] = 'เพิ่มบทบาท';
$string['launchpadremoverole'] = 'ลบ';
$string['launchpadchooserole'] = 'เลือกบทบาท…';
$string['launchpadlinks_role'] = 'ลิงก์: {$a}';
$string['launchpadrolemissing'] = 'บทบาท #{$a} (ไม่พบ)';
$string['launchpadrolemapinvalid'] = 'ลิงก์บทบาท Launch Pad ต้องเป็นอ็อบเจ็กต์ JSON ที่แมปคีย์แพ็กไปยังอาร์เรย์ลิงก์';

$string['launchpadjsoninvalid'] = 'ลิงก์ Launch Pad ต้องเป็นอาร์เรย์ JSON ของอ็อบเจ็กต์ แต่ละรายการต้องมี label และ url ที่ไม่ว่าง';
$string['launchpad_section_global'] = 'ส่วนกลาง';
$string['launchpad_item_appearance'] = 'รูปลักษณ์';
$string['launchpad_item_certifications'] = 'การรับรอง';
$string['launchpad_item_customreports'] = 'รายงานที่กำหนดเอง';
$string['launchpad_item_dynamicrules'] = 'กฎแบบไดนามิก';
$string['launchpad_item_orgstructure'] = 'โครงสร้างองค์กร';
$string['launchpad_item_programs'] = 'โปรแกรม';
$string['launchpad_item_users'] = 'ผู้ใช้';
$string['launchpad_item_catalogue'] = 'แคตตาล็อก';
$string['launchpad_item_customhomepages'] = 'หน้าแรกแบบกำหนดเอง';
$string['launchpad_item_alltenants'] = 'ผู้เช่าทั้งหมด';
$string['launchpad_item_allusers'] = 'ผู้ใช้ทั้งหมด';
$string['launchpad_item_certificates'] = 'ใบรับรอง';
$string['launchpad_item_courses'] = 'หลักสูตร';
$string['launchpad_item_custompages'] = 'หน้าแบบกำหนดเอง';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = 'โหมดโฟกัส';
$string['focusmodeheading'] = 'โหมดโฟกัส';
$string['focusmodeheading_desc'] = 'ตัวควบคุมลอยบนหน้าเนื้อหาหลักสูตร แดชบอร์ด (/my/) หลักสูตรของฉัน (/my/courses.php) และหน้าแรกแบบกำหนดเองของ MuTMS ที่ซ่อนการนำทางรองและลิ้นชัก และขยายเนื้อหาหลัก ค่ากำหนดถูกเก็บต่อหลักสูตรหรือหน้าในเบราว์เซอร์ (localStorage)';
$string['enablefocusmode'] = 'เปิดใช้โหมดโฟกัส';
$string['enablefocusmode_desc'] = 'แสดงปุ่มโหมดโฟกัส (มุมล่างขวา) บนหน้าหลักหลักสูตร ส่วน และกิจกรรม รวมถึงแดชบอร์ด (/my/) หลักสูตรของฉัน (/my/courses.php) และหน้าแรกแบบกำหนดเองของ MuTMS ค่าเริ่มต้น: ใช่';
$string['focusmodeenable'] = 'โหมดโฟกัส';
$string['focusmodedisable'] = 'ออกจากโหมดโฟกัส';
$string['focusmodenotice'] = 'โหมดโฟกัสเปิดอยู่ คลิก × ที่มุมล่างขวาเพื่อปิด';


// Settings: User menu tiles tab.
$string['usermenutab'] = 'เมนูผู้ใช้';
$string['usermenuheading'] = 'ไทล์เมนูผู้ใช้';
$string['usermenuheading_desc'] = 'ปรับสไตล์เมนูโปรไฟล์เป็นตารางไทล์แบบ Launch Pad (ปลายทาง Boost เดียวกัน) ลักษณะแผงตรงกับ การเข้าถึง / Launch Pad อยู่แล้ว ปิดเพื่อคงรายการลิงก์แนวตั้ง';
$string['enableusermenutiles'] = 'เปิดใช้ไทล์เมนูผู้ใช้';
$string['enableusermenutiles_desc'] = 'แสดงรายการเมนูโปรไฟล์เป็นตารางไทล์ 3 คอลัมน์พร้อมไอคอน Font Awesome ค่าเริ่มต้น: ใช่ ตั้งเป็น ไม่ สำหรับรายการแนวตั้ง';

// Settings: Compact navbar tab.
$string['navbartab'] = 'แถบนำทาง';
$string['navbarheading'] = 'แถบนำทางแบบกะทัดรัด';
$string['navbarheading_desc'] = 'แถบบนที่แน่นขึ้นเล็กน้อย เส้นใต้ลิงก์ที่ใช้งานชัดขึ้น และเป้าหมายการแตะไอคอนยูทิลิตี้ที่สม่ำเสมอ โลโก้ไซต์และสีแบรนด์ยังอยู่ที่ Boost Union → Look (เส้นทางหลายไคลเอนต์) เลย์เอาต์เข้าสู่ระบบไม่เปลี่ยน (เฉพาะการเข้าสู่ระบบ Boost Union)';
$string['enablecompactnavbar'] = 'เปิดใช้แถบนำทางแบบกะทัดรัด';
$string['enablecompactnavbar_desc'] = 'ใช้ลักษณะแถบนำทางแบบกะทัดรัดกับทุกหน้า ยกเว้นหน้าเข้าสู่ระบบ ค่าเริ่มต้น: ใช่ ปิดเพื่อใช้ความสูงแถบมาตรฐานของ Boost Union';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = 'หลักสูตรของฉัน';
$string['mycoursesheading'] = 'เลย์เอาต์หลักสูตรของฉัน';
$string['mycoursesheading_desc'] = 'สกินตารางการ์ด (ไม่บังคับ) ในหน้าหลักสูตรของฉัน (/my/courses.php) ที่ความกว้างเริ่มต้นของ Moodle / Boost Union (ขยายได้ด้วยโหมดโฟกัส) ปรับสกินบล็อกภาพรวมหลักสูตรมาตรฐาน — ไม่ได้แทนที่ การค้นหา การจัดกลุ่ม การเรียง และโหมดมุมมองยังเป็นของ Moodle หลัก';
$string['enablemycourseslayout'] = 'เปิดใช้เลย์เอาต์หลักสูตรของฉัน';
$string['enablemycourseslayout_desc'] = 'แสดงตารางการ์ดแบบตอบสนอง (1–3 คอลัมน์ที่ความกว้างเริ่มต้น ขยายได้สูงสุด 5 คอลัมน์ในโหมดโฟกัส) และปรับสไตล์การ์ด (เงา ความคืบหน้าวงกลมบนภาพ ดาวบนภาพ) ค่าเริ่มต้น: ใช่';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = 'สถิติหลักสูตรของฉัน';
$string['mycoursesstatsheading_desc'] = 'แถบสถิติเสริมด้านบนของหลักสูตรของฉัน (/my/courses.php) สำหรับผู้ใช้ปัจจุบัน: การลงทะเบียน การสำเร็จ ตราสัญลักษณ์ และใบรับรอง แต่ละแผงเปิดใช้ได้อิสระ';
$string['enablemycoursesstats'] = 'เปิดใช้สถิติหลักสูตรของฉัน';
$string['enablemycoursesstats_desc'] = 'แสดงแถบสถิติเหนือภาพรวมหลักสูตรในหลักสูตรของฉัน ค่าเริ่มต้น: ใช่';
$string['mycoursesstatsenrolments'] = 'แสดงแผงการลงทะเบียน';
$string['mycoursesstatsenrolments_desc'] = 'จำนวนหลักสูตรที่กำลังดำเนินอยู่ของผู้ใช้ปัจจุบัน ค่าเริ่มต้น: ใช่';
$string['mycoursesstatscompletions'] = 'แสดงแผงการสำเร็จ';
$string['mycoursesstatscompletions_desc'] = 'จำนวนหลักสูตรที่ผู้ใช้ปัจจุบันเรียนจบแล้ว ค่าเริ่มต้น: ใช่';
$string['mycoursesstatsbadges'] = 'แสดงแผงตราสัญลักษณ์';
$string['mycoursesstatsbadges_desc'] = 'จำนวนตราสัญลักษณ์ที่มอบให้ผู้ใช้ปัจจุบัน ค่าเริ่มต้น: ใช่';
$string['mycoursesstatscertificates'] = 'แสดงแผงใบรับรอง';
$string['mycoursesstatscertificates_desc'] = 'จำนวนใบรับรองที่มอบให้ผู้ใช้ปัจจุบัน (tool_certificate หรือ mod_customcert เมื่อติดตั้ง; ไม่เช่นนั้นเป็น 0) ค่าเริ่มต้น: ใช่';
$string['mycoursesstatsaria'] = 'สถิติหลักสูตรของฉัน';
$string['mycoursesstatsenrolmentstitle'] = 'การลงทะเบียน';
$string['mycoursesstatsenrolmentssub'] = '{$a} หลักสูตรที่กำลังเรียน';
$string['mycoursesstatscompletionstitle'] = 'การสำเร็จ';
$string['mycoursesstatscompletionssub'] = '{$a} หลักสูตรที่เรียนจบ';
$string['mycoursesstatsbadgestitle'] = 'ตราสัญลักษณ์';
$string['mycoursesstatsbadgessub'] = '{$a} ที่ได้รับ';
$string['mycoursesstatscertificatestitle'] = 'ใบรับรอง';
$string['mycoursesstatscertificatessub'] = '{$a} ที่ได้รับ';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = 'แดชบอร์ด';
$string['dashboardheading'] = 'เลย์เอาต์แดชบอร์ด';
$string['dashboardheading_desc'] = 'สกินตารางการ์ดแดชบอร์ดและพื้นผิวบล็อก (ไม่บังคับ) บน /my/ ที่ความกว้างเริ่มต้นของ Moodle / Boost Union (ขยายได้ด้วยโหมดโฟกัส) ใช้ลักษณะการ์ดภาพรวมหลักสูตรร่วมกับหลักสูตรของฉัน เลย์เอาต์คอลัมน์ (ปฏิทิน / กิจกรรมที่จะมาถึงทางขวา) ใช้ Boost Union Outside (ขวา) — ตั้งค่าภายใต้ Feel → Blocks';
$string['enabledashboardlayout'] = 'เปิดใช้เลย์เอาต์แดชบอร์ด';
$string['enabledashboardlayout_desc'] = 'ใช้ลักษณะการ์ดภาพรวมหลักสูตรแบบเดียวกับหลักสูตรของฉันบนแดชบอร์ด (1–3 คอลัมน์ที่ความกว้างเริ่มต้น ขยายเป็น 4 คอลัมน์ในโหมดโฟกัส) รวมพื้นผิวบล็อก Timeline / Calendar / Upcoming และทำสถานะว่างให้อ่อนลงให้เข้ากัน ค่าเริ่มต้น: ใช่ เปิด Boost Union Outside (ขวา) แยกต่างหากสำหรับคอลัมน์ขวา';
$string['dashboardsurfacesnote'] = 'เมื่อเปิดเลย์เอาต์แดชบอร์ด Everon จะใช้โทเค็นพื้นผิวบล็อกร่วมกันด้วย (ขอบนุ่ม รัศมี เงา) และสไตล์สถานะว่างของ Timeline / Upcoming ที่สงบขึ้น เพื่อให้บล็อกรองเข้ากับการ์ดหลักสูตร';

// Privacy API.
$string['privacy:metadata'] = 'ธีม Everon ไม่เก็บข้อมูลส่วนบุคคลของผู้ใช้ใด ๆ ค่ากำหนดการเข้าถึงและโหมดโฟกัสถูกเก็บในเบราว์เซอร์เท่านั้น ลิงก์ Launch Pad เลย์เอาต์หลักสูตรของฉัน สถิติหลักสูตรของฉัน เลย์เอาต์แดชบอร์ด และแถบนำทางแบบกะทัดรัดเป็นการตั้งค่าผู้ดูแลระดับไซต์';
