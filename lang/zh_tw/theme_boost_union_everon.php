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
$string['choosereadme'] = 'Everon 是面向 Project Theme 的 Boost Union 子佈景主題。它提供標準的 Union 外觀，以及無障礙工具列、Launch Pad、專注模式、我的課程版面與儀表板版面等選用功能。';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon 是面向 Project Theme 的 Boost Union 子佈景主題。請優先使用 Union 的外觀／內容設定；Everon 額外提供無障礙工具列、Launch Pad 捷徑、專注模式、我的課程卡片版面與儀表板版面等功能。';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = '繼承';
$string['inheritanceinherit'] = '繼承';
$string['inheritanceduplicate'] = '複製';
$string['inheritanceoptionsexplanation'] = '大多數情況下，使用繼承即可。但 Boost Union 中可能整合了不完善的程式碼，導致某些 Boost Union 功能無法簡單透過 SCSS 繼承。如果您遇到 Boost Union 功能在 Everon 中似乎也不起作用的問題，請嘗試將此設定切換為「複製」；若這樣能解決問題，請在 Github 上回報問題（有關如何回報問題，請參閱 README.md 檔案）。';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'Pre SCSS 繼承';
$string['prescssinheritancesetting_desc'] = '透過此設定，您可控制是否繼承或複製來自 Boost Union 的 pre SCSS 程式碼。';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'Extra SCSS 繼承';
$string['extrascssinheritancesetting_desc'] = '透過此設定，您可控制是否繼承或複製來自 Boost Union 的 extra SCSS 程式碼。';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = '無障礙';
$string['accessibilityheading'] = '無障礙工具列';
$string['accessibilityheading_desc'] = '導覽列公用工具，可讓每位使用者調整內容、色彩與輔助工具。偏好設定儲存在瀏覽器（localStorage）中，而非 Moodle 使用者偏好。';
$string['enableaccessibilitytool'] = '啟用無障礙工具列';
$string['enableaccessibilitytool_desc'] = '在頂部導覽列（通知／訊息旁）顯示無障礙圖示並載入工具列。預設：是。';
$string['accessibilitymenu'] = '無障礙選項';
$string['a11ycontentadjustments'] = '內容調整';
$string['a11ycoloradjustments'] = '色彩調整';
$string['a11ytools'] = '工具';
$string['a11yadjustfontsize'] = '調整字型大小';
$string['a11ydecreasefont'] = '縮小字型';
$string['a11yincreasefont'] = '放大字型';
$string['a11yhighlighttitle'] = '醒目標題';
$string['a11yhighlightlinks'] = '醒目連結';
$string['a11ydyslexiafont'] = '閱讀障礙字型';
$string['a11yletterspacing'] = '字距';
$string['a11ylineheight'] = '行高';
$string['a11yfontweight'] = '字重';
$string['a11ydarkcontrast'] = '深色對比';
$string['a11ylightcontrast'] = '淺色對比';
$string['a11yhighcontrast'] = '高對比';
$string['a11yhighsaturation'] = '高飽和度';
$string['a11ylowsaturation'] = '低飽和度';
$string['a11ymonochrome'] = '單色';
$string['a11ydarkmode'] = '深色模式';
$string['a11yreadingguide'] = '閱讀輔助線';
$string['a11ystopanimations'] = '停止動畫';
$string['a11ybigcursor'] = '大游標';
$string['a11yresetall'] = '重設所有無障礙設定';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = '導覽列圖示，可開啟依權限自動顯示的內建捷徑磚和／或自訂角色連結套件。選擇「內建磚」模式（預設）會依已安裝功能與各使用者權限自動顯示捷徑（MuTMS 網站包含租戶與全域磚）；選擇「僅自訂角色連結」則完全透過 JSON 套件管理。當 Launch Pad 停用或目前使用者無可用連結時，圖示會隱藏。';
$string['enablelaunchpad'] = '啟用 Launch Pad';
$string['enablelaunchpad_desc'] = '當使用者至少有一個可存取的連結時，在頂部導覽列（無障礙工具之後、使用者選單之前）顯示 Launch Pad 圖示。預設：否。';
$string['launchpadmode'] = 'Launch Pad 模式';
$string['launchpadmode_desc'] = '選擇 Launch Pad 連結的產生方式。在「內建磚」模式下，系統會依已安裝外掛與使用者權限（網站管理員，以及 MuTMS 網站中的租戶管理員）自動顯示下方已啟用的磚，並附加其他角色套件。在「僅自訂角色連結」模式下，僅使用下方的 JSON 角色連結套件。';
$string['launchpadmode_builtin'] = '內建磚（依權限）+ 自訂角色連結';
$string['launchpadmode_custom'] = '僅自訂角色連結';
$string['launchpadbuiltintiles'] = '內建 Launch Pad 磚';
$string['launchpadbuiltintiles_desc'] = '選擇在「內建磚」模式啟用時可顯示的內建磚。僅列出此網站已安裝功能對應的磚。每個磚仍會依目前使用者的權限（及 MuTMS 網站中作用中的租戶）進行驗證。';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = '包含物件的 JSON 陣列，物件需有 <code>label</code>、<code>url</code>（網站相對路徑，例如 <code>/admin/search.php</code>），以及選用的 <code>icon</code>（Font Awesome 類別名稱，例如 <code>fa-cog</code>）。v1 會拒絕外部 URL。Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = '連結：網站管理員';
$string['launchpadlinks_siteadmin_desc'] = '當使用者為網站管理員時顯示（<code>is_siteadmin()</code>）。';
$string['launchpadlinks_manager'] = '連結：經理';
$string['launchpadlinks_manager_desc'] = '舊版 MVP 設定（可能時會遷移到經理角色套件）。';
$string['launchpadlinks_authenticated'] = '連結：已驗證使用者';
$string['launchpadlinks_authenticated_desc'] = '適用於每位已登入的非訪客使用者的後備方案。在 siteadmin 與角色套件之後合併。';

$string['launchpadrolelinks'] = '角色連結套件';
$string['launchpadrolelinks_desc'] = '依角色設定 JSON 連結清單。在「內建磚」模式下，上方內建磚負責網站管理員（及 MuTMS 租戶管理員）的捷徑，此處的「網站管理員」套件不生效；已新增的其他角色套件仍會附加（依 URL 去重）。在「僅自訂角色連結」模式下，這些 JSON 套件（包含網站管理員）將完全控制 Launch Pad。';
$string['launchpadbuiltinpacks'] = '內建套件';
$string['launchpadconfiguredroles'] = '已設定的套件';
$string['launchpadaddrole'] = '新增角色';
$string['launchpadremoverole'] = '移除';
$string['launchpadchooserole'] = '選擇角色…';
$string['launchpadlinks_role'] = '連結：{$a}';
$string['launchpadrolemissing'] = '角色 #{$a}（缺失）';
$string['launchpadrolemapinvalid'] = 'Launch Pad 角色連結必須是將套件鍵對應到連結陣列的 JSON 物件。';

$string['launchpadjsoninvalid'] = 'Launch Pad 連結必須是物件的 JSON 陣列，每個物件都有非空的 label 與 url。';
$string['launchpad_section_global'] = '全域';
$string['launchpad_tile_prefix_primary'] = '主要：{$a}';
$string['launchpad_tile_prefix_global'] = '全域：{$a}';
$string['launchpad_item_appearance'] = '外觀';
$string['launchpad_item_browseusers'] = '瀏覽使用者清單';
$string['launchpad_item_managecourses'] = '管理課程與類別';
$string['launchpad_item_plugins'] = '外掛概覽';
$string['launchpad_item_performance'] = '效能概覽';
$string['launchpad_item_debugging'] = '除錯';
$string['launchpad_item_tasks'] = '排程工作';
$string['launchpad_item_certifications'] = '認證';
$string['launchpad_item_customreports'] = '自訂報表';
$string['launchpad_item_dynamicrules'] = '動態規則';
$string['launchpad_item_orgstructure'] = '組織架構';
$string['launchpad_item_programs'] = '專案';
$string['launchpad_item_users'] = '使用者';
$string['launchpad_item_catalogue'] = '目錄';
$string['launchpad_item_customhomepages'] = '自訂首頁';
$string['launchpad_item_alltenants'] = '所有租戶';
$string['launchpad_item_allusers'] = '所有使用者';
$string['launchpad_item_certificates'] = '證書';
$string['launchpad_item_courses'] = '課程';
$string['launchpad_item_custompages'] = '自訂頁面';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = '專注模式';
$string['focusmodeheading'] = '專注模式';
$string['focusmodeheading_desc'] = '課程內容頁、儀表板（/my/）、「我的課程」（/my/courses.php）與 MuTMS 自訂首頁上的浮動控制項，可隱藏次要導覽與抽屜並加寬主要內容。偏好依課程或頁面儲存在瀏覽器（localStorage）中。';
$string['enablefocusmode'] = '啟用專注模式';
$string['enablefocusmode_desc'] = '在課程首頁、章節與活動頁面以及儀表板（/my/）、「我的課程」（/my/courses.php）與 MuTMS 自訂首頁顯示專注模式按鈕（右下角）。預設：是。';
$string['focusmodeenable'] = '專注模式';
$string['focusmodedisable'] = '結束專注模式';
$string['focusmodenotice'] = '專注模式已開啟。點一下右下角的 × 即可關閉。';


// Settings: User menu tiles tab.
$string['usermenutab'] = '使用者選單';
$string['usermenuheading'] = '使用者選單磁貼';
$string['usermenuheading_desc'] = '將個人資料使用者選單重新樣式化為 Launch Pad 風格的磁貼格線（相同的 Boost 目的地）。面板外觀已與無障礙／Launch Pad 一致。關閉以保留垂直連結清單。';
$string['enableusermenutiles'] = '啟用使用者選單磁貼';
$string['enableusermenutiles_desc'] = '將個人資料使用者選單項目顯示為帶 Font Awesome 圖示的三欄磁貼格線。預設：是。設為否以使用垂直清單。';

// Settings: Compact navbar tab.
$string['navbartab'] = '導覽列';
$string['navbarheading'] = '精簡導覽列';
$string['navbarheading_desc'] = '稍精簡的頂列、更清楚的作用中連結底線，以及一致的公用圖示點擊區域。網站標誌與品牌色彩仍在 Boost Union → 外觀（多客戶路徑）。登入版面不變（僅 Boost Union 登入）。';
$string['enablecompactnavbar'] = '啟用精簡導覽列';
$string['enablecompactnavbar_desc'] = '在除登入頁外的所有頁面套用精簡導覽列外觀。預設：是。關閉以使用標準 Boost Union 導覽列高度。';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = '我的課程';
$string['mycoursesheading'] = '我的課程版面';
$string['mycoursesheading_desc'] = '在「我的課程」頁面（/my/courses.php）上以預設 Moodle / Boost Union 頁面寬度（可透過專注模式擴展）顯示的可選卡片格線外觀。為標準「課程總覽」區塊換膚——不會取代它。搜尋、分組、排序與檢視模式仍屬 Moodle 核心。';
$string['enablemycourseslayout'] = '啟用我的課程版面';
$string['enablemycourseslayout_desc'] = '顯示響應式卡片格線（預設寬度為 1–3 欄，專注模式下可擴展至 5 欄），並重新樣式化卡片（陰影、圖片上的圓形進度、圖片上的星號）。預設：是。';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = '我的課程統計';
$string['mycoursesstatsheading_desc'] = '在「我的課程」（/my/courses.php）頂部為目前使用者顯示的選用統計列：選課、完成、徽章與證書。每個面板可獨立啟用。';
$string['enablemycoursesstats'] = '啟用我的課程統計';
$string['enablemycoursesstats_desc'] = '在「我的課程」的課程總覽上方顯示統計列。預設：是。';
$string['mycoursesstatsenrolments'] = '顯示選課面板';
$string['mycoursesstatsenrolments_desc'] = '目前使用者進行中的作用中課程數量。預設：是。';
$string['mycoursesstatscompletions'] = '顯示完成面板';
$string['mycoursesstatscompletions_desc'] = '目前使用者已完成的課程數量。預設：是。';
$string['mycoursesstatsbadges'] = '顯示徽章面板';
$string['mycoursesstatsbadges_desc'] = '授予目前使用者的徽章數量。預設：是。';
$string['mycoursesstatscertificates'] = '顯示證書面板';
$string['mycoursesstatscertificates_desc'] = '授予目前使用者的證書數量（已安裝 tool_certificate 或 mod_customcert 時；否則為 0）。預設：是。';
$string['mycoursesstatsaria'] = '我的課程統計';
$string['mycoursesstatsenrolmentstitle'] = '選課';
$string['mycoursesstatsenrolmentssub'] = '{$a} 門進行中的課程';
$string['mycoursesstatscompletionstitle'] = '完成';
$string['mycoursesstatscompletionssub'] = '{$a} 門已完成課程';
$string['mycoursesstatsbadgestitle'] = '徽章';
$string['mycoursesstatsbadgessub'] = '{$a} 已授予';
$string['mycoursesstatscertificatestitle'] = '證書';
$string['mycoursesstatscertificatessub'] = '{$a} 已授予';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = '儀表板';
$string['dashboardheading'] = '儀表板版面';
$string['dashboardheading_desc'] = '在 /my/ 上以預設 Moodle / Boost Union 頁面寬度（可透過專注模式擴展）顯示的可選儀表板卡片格線與區塊表面外觀，並與「我的課程」共用課程總覽卡片樣式。欄位版面（右側日曆／即將到來的活動）使用 Boost Union Outside（右側）— 請在 感受 → 區塊 下設定。';
$string['enabledashboardlayout'] = '啟用儀表板版面';
$string['enabledashboardlayout_desc'] = '在儀表板上套用與「我的課程」相同的課程總覽卡片外觀（預設寬度為 1–3 欄，專注模式下擴展至 4 欄）。同時統一時間軸／日曆／即將到來區塊表面，並柔化空白狀態以相符。預設：是。請另外啟用 Boost Union Outside（右側）以顯示右欄。';
$string['dashboardsurfacesnote'] = '啟用儀表板版面後，Everon 也會套用共用的區塊表面權杖（柔和邊框、圓角、陰影），以及更平靜的時間軸／即將到來空白狀態樣式，使輔助區塊與課程卡片一致。';

// Privacy API.
$string['privacy:metadata'] = 'Everon 佈景主題不會儲存任何使用者的個人資料。無障礙與專注模式偏好僅儲存在瀏覽器中。Launch Pad 連結、我的課程版面、我的課程統計、儀表板版面與精簡導覽列是網站層級管理設定。';
