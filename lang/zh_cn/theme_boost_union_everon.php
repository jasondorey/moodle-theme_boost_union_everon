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
$string['choosereadme'] = 'Everon 是面向 Project Theme 的 Boost Union 子主题。它提供标准的 Union 外观，以及无访问工具栏、Launch Pad、专注模式、我的课程布局和仪表板布局等可选功能。';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon 是面向 Project Theme 的 Boost Union 子主题。请优先使用 Union 的外观/内容设置；Everon 额外提供无障碍工具栏、Launch Pad 快捷方式、专注模式、我的课程卡片布局和仪表板布局等功能。';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = '继承';
$string['inheritanceinherit'] = '继承';
$string['inheritanceduplicate'] = '复制';
$string['inheritanceoptionsexplanation'] = '大多数情况下，使用继承即可。但 Boost Union 中可能集成了不完善的代码，导致某些 Boost Union 功能无法简单通过 SCSS 继承。如果您遇到 Boost Union 功能在 Everon 中似乎也不起作用的问题，请尝试将此设置切换为“复制”；若这样能解决问题，请在 Github 上报告问题（有关如何报告问题，请参阅 README.md 文件）。';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'Pre SCSS 继承';
$string['prescssinheritancesetting_desc'] = '通过此设置，您可控制是否继承或复制来自 Boost Union 的 pre SCSS 代码。';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'Extra SCSS 继承';
$string['extrascssinheritancesetting_desc'] = '通过此设置，您可控制是否继承或复制来自 Boost Union 的 extra SCSS 代码。';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = '无障碍';
$string['accessibilityheading'] = '无障碍工具栏';
$string['accessibilityheading_desc'] = '导航栏实用工具，可让每位用户调整内容、颜色和辅助工具。偏好设置保存在浏览器（localStorage）中，而非 Moodle 用户偏好。';
$string['enableaccessibilitytool'] = '启用无障碍工具栏';
$string['enableaccessibilitytool_desc'] = '在顶部导航栏（通知/消息旁边）显示无障碍图标并加载工具栏。默认：是。';
$string['accessibilitymenu'] = '无障碍选项';
$string['a11ycontentadjustments'] = '内容调整';
$string['a11ycoloradjustments'] = '颜色调整';
$string['a11ytools'] = '工具';
$string['a11yadjustfontsize'] = '调整字体大小';
$string['a11ydecreasefont'] = '减小字体';
$string['a11yincreasefont'] = '增大字体';
$string['a11yhighlighttitle'] = '高亮标题';
$string['a11yhighlightlinks'] = '高亮链接';
$string['a11ydyslexiafont'] = '阅读障碍字体';
$string['a11yletterspacing'] = '字间距';
$string['a11ylineheight'] = '行高';
$string['a11yfontweight'] = '字重';
$string['a11ydarkcontrast'] = '深色对比';
$string['a11ylightcontrast'] = '浅色对比';
$string['a11yhighcontrast'] = '高对比度';
$string['a11yhighsaturation'] = '高饱和度';
$string['a11ylowsaturation'] = '低饱和度';
$string['a11ymonochrome'] = '单色';
$string['a11ycolourmode'] = '颜色模式';
$string['a11ycolourmodedark'] = '深色';
$string['a11ycolourmodelight'] = '浅色';
$string['a11ycolourmodesystem'] = '系统';
$string['a11yreadingguide'] = '阅读辅助线';
$string['a11ystopanimations'] = '停止动画';
$string['a11ybigcursor'] = '大光标';
$string['a11yresetall'] = '重置所有无障碍设置';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = '导航栏图标，可打开按角色区分的快捷链接。默认包为网站管理员；可按需添加其他网站角色。匹配的包会按 URL 合并并去重。当 Launch Pad 被禁用或当前用户没有链接时，图标会隐藏。';
$string['enablelaunchpad'] = '启用 Launch Pad';
$string['enablelaunchpad_desc'] = '当用户至少有一个已配置的链接时，在顶部导航栏（无障碍工具之后、用户菜单之前）显示 Launch Pad 图标。默认：否 — 在下方添加 JSON 链接后再开启。';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = '包含对象的 JSON 数组，对象需有 <code>label</code>、<code>url</code>（站点相对路径，例如 <code>/admin/search.php</code>），以及可选的 <code>icon</code>（Font Awesome 类名，例如 <code>fa-cog</code>）。v1 会拒绝外部 URL。Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = '链接：网站管理员';
$string['launchpadlinks_siteadmin_desc'] = '当用户为网站管理员时显示（<code>is_siteadmin()</code>）。';
$string['launchpadlinks_manager'] = '链接：经理';
$string['launchpadlinks_manager_desc'] = '旧版 MVP 设置（可能时会迁移到经理角色包）。';
$string['launchpadlinks_authenticated'] = '链接：已认证用户';
$string['launchpadlinks_authenticated_desc'] = '适用于每位已登录的非访客用户的回退方案。在 siteadmin 和角色包之后合并。';

$string['launchpadrolelinks'] = '角色链接包';
$string['launchpadrolelinks_desc'] = '配置 JSON 链接列表。网站管理员始终存在（默认）。对任何其他网站角色使用“添加角色”。当用户在任何上下文中拥有该角色时，角色包会匹配。存储使用角色 id；标签显示当前角色名称。';
$string['launchpadbuiltinpacks'] = '内置包';
$string['launchpadconfiguredroles'] = '已配置的包';
$string['launchpadaddrole'] = '添加角色';
$string['launchpadremoverole'] = '移除';
$string['launchpadchooserole'] = '选择角色…';
$string['launchpadlinks_role'] = '链接：{$a}';
$string['launchpadrolemissing'] = '角色 #{$a}（缺失）';
$string['launchpadrolemapinvalid'] = 'Launch Pad 角色链接必须是将包键映射到链接数组的 JSON 对象。';

$string['launchpadjsoninvalid'] = 'Launch Pad 链接必须是对象的 JSON 数组，每个对象都有非空的 label 和 url。';
$string['launchpad_section_global'] = '全局';
$string['launchpad_item_appearance'] = '外观';
$string['launchpad_item_certifications'] = '认证';
$string['launchpad_item_customreports'] = '自定义报表';
$string['launchpad_item_dynamicrules'] = '动态规则';
$string['launchpad_item_orgstructure'] = '组织架构';
$string['launchpad_item_programs'] = '项目';
$string['launchpad_item_users'] = '用户';
$string['launchpad_item_catalogue'] = '目录';
$string['launchpad_item_customhomepages'] = '自定义首页';
$string['launchpad_item_alltenants'] = '所有租户';
$string['launchpad_item_allusers'] = '所有用户';
$string['launchpad_item_certificates'] = '证书';
$string['launchpad_item_courses'] = '课程';
$string['launchpad_item_custompages'] = '自定义页面';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = '专注模式';
$string['focusmodeheading'] = '专注模式';
$string['focusmodeheading_desc'] = '课程内容页、仪表板（/my/）、“我的课程”（/my/courses.php）和 MuTMS 自定义首页上的浮动控件，可隐藏次级导航和抽屉并加宽主内容。偏好按课程或页面保存在浏览器（localStorage）中。';
$string['enablefocusmode'] = '启用专注模式';
$string['enablefocusmode_desc'] = '在课程主页、章节和活动页面以及仪表板（/my/）、“我的课程”（/my/courses.php）和 MuTMS 自定义首页上显示专注模式按钮（右下角）。默认：是。';
$string['focusmodeenable'] = '专注模式';
$string['focusmodedisable'] = '退出专注模式';
$string['focusmodenotice'] = '专注模式已开启。点击右下角的 × 即可关闭。';


// Settings: User menu tiles tab.
$string['usermenutab'] = '用户菜单';
$string['usermenuheading'] = '用户菜单磁贴';
$string['usermenuheading_desc'] = '将个人资料用户菜单重新样式化为 Launch Pad 风格的磁贴网格（相同的 Boost 目标）。面板外观已与无障碍 / Launch Pad 一致。关闭以保留纵向链接列表。';
$string['enableusermenutiles'] = '启用用户菜单磁贴';
$string['enableusermenutiles_desc'] = '将个人资料用户菜单项显示为带 Font Awesome 图标的三列磁贴网格。默认：是。设为否以使用纵向列表。';

// Settings: Compact navbar tab.
$string['navbartab'] = '导航栏';
$string['navbarheading'] = '紧凑导航栏';
$string['navbarheading_desc'] = '稍紧凑的顶栏、更清晰的活动链接下划线，以及一致的实用图标点击区域。站点徽标和品牌色仍在 Boost Union → 外观（多客户路径）。登录布局不变（仅 Boost Union 登录）。';
$string['enablecompactnavbar'] = '启用紧凑导航栏';
$string['enablecompactnavbar_desc'] = '在除登录页外的所有页面应用紧凑导航栏外观。默认：是。关闭以使用标准 Boost Union 导航栏高度。';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = '我的课程';
$string['mycoursesheading'] = '我的课程布局';
$string['mycoursesheading_desc'] = '在“我的课程”页面（/my/courses.php）上以默认 Moodle / Boost Union 页面宽度（可通过专注模式扩展）显示的可选卡片网格外观。为标准“课程概览”区块换肤——不会替换它。搜索、分组、排序和视图模式仍属 Moodle 核心。';
$string['enablemycourseslayout'] = '启用我的课程布局';
$string['enablemycourseslayout_desc'] = '显示响应式卡片网格（默认宽度为 1–3 列，专注模式下可扩展至 5 列），并重新样式化卡片（阴影、图片上的圆形进度、图片上的星标）。默认：是。';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = '我的课程统计';
$string['mycoursesstatsheading_desc'] = '在“我的课程”（/my/courses.php）顶部为当前用户显示的可选统计条：选课、完成、徽章和证书。每个面板可独立启用。';
$string['enablemycoursesstats'] = '启用我的课程统计';
$string['enablemycoursesstats_desc'] = '在“我的课程”的课程概览上方显示统计条。默认：是。';
$string['mycoursesstatsenrolments'] = '显示选课面板';
$string['mycoursesstatsenrolments_desc'] = '当前用户进行中的活动课程数量。默认：是。';
$string['mycoursesstatscompletions'] = '显示完成面板';
$string['mycoursesstatscompletions_desc'] = '当前用户已完成的课程数量。默认：是。';
$string['mycoursesstatsbadges'] = '显示徽章面板';
$string['mycoursesstatsbadges_desc'] = '授予当前用户的徽章数量。默认：是。';
$string['mycoursesstatscertificates'] = '显示证书面板';
$string['mycoursesstatscertificates_desc'] = '授予当前用户的证书数量（已安装 tool_certificate 或 mod_customcert 时；否则为 0）。默认：是。';
$string['mycoursesstatsaria'] = '我的课程统计';
$string['mycoursesstatsenrolmentstitle'] = '选课';
$string['mycoursesstatsenrolmentssub'] = '{$a} 门进行中的课程';
$string['mycoursesstatscompletionstitle'] = '完成';
$string['mycoursesstatscompletionssub'] = '{$a} 门已完成课程';
$string['mycoursesstatsbadgestitle'] = '徽章';
$string['mycoursesstatsbadgessub'] = '{$a} 已授予';
$string['mycoursesstatscertificatestitle'] = '证书';
$string['mycoursesstatscertificatessub'] = '{$a} 已授予';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = '仪表板';
$string['dashboardheading'] = '仪表板布局';
$string['dashboardheading_desc'] = '在 /my/ 上以默认 Moodle / Boost Union 页面宽度（可通过专注模式扩展）显示的可选仪表板卡片网格与区块表面外观，并与“我的课程”共享课程概览卡片样式。列布局（右侧日历/即将发生的事件）使用 Boost Union Outside（右侧）— 请在 感受 → 区块 下配置。';
$string['enabledashboardlayout'] = '启用仪表板布局';
$string['enabledashboardlayout_desc'] = '在仪表板上应用与“我的课程”相同的课程概览卡片外观（默认宽度为 1–3 列，专注模式下扩展至 4 列）。同时统一时间线/日历/即将发生区块表面，并柔化空状态以匹配。默认：是。请单独启用 Boost Union Outside（右侧）以显示右列。';
$string['dashboardsurfacesnote'] = '启用仪表板布局后，Everon 还会应用共享的区块表面令牌（柔和边框、圆角、阴影），以及更平静的时间线/即将发生空状态样式，使辅助区块与课程卡片一致。';

// Privacy API.
$string['privacy:metadata'] = 'Everon 主题不会存储任何用户的个人数据。无障碍和专注模式偏好仅保存在浏览器中。Launch Pad 链接、我的课程布局、我的课程统计、仪表板布局和紧凑导航栏是站点级管理设置。';
