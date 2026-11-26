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
$string['choosereadme'] = 'Everon هو سمة فرعية من Boost Union لمشروع Project Theme. يوفر مظهر Union القياسي بالإضافة إلى ميزات اختيارية مثل شريط إمكانية الوصول وLaunch Pad ووضع التركيز وتخطيط مقرراتي وتخطيط لوحة المعلومات.';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon هو سمة فرعية من Boost Union لمشروع Project Theme. يُفضَّل استخدام إعدادات المظهر/المحتوى في Union؛ تضيف Everon ميزات مثل شريط إمكانية الوصول واختصارات Launch Pad ووضع التركيز وتخطيط بطاقات مقرراتي وتخطيط لوحة المعلومات.';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = 'الوراثة';
$string['inheritanceinherit'] = 'وراثة';
$string['inheritanceduplicate'] = 'تكرار';
$string['inheritanceoptionsexplanation'] = 'في معظم الأحيان تكون الوراثة كافية تمامًا. ومع ذلك، قد يُدمَج رمز غير مكتمل في Boost Union يمنع وراثة SCSS البسيطة لبعض ميزات Boost Union. إذا واجهت أي مشكلات في ميزات Boost Union يبدو أنها لا تعمل أيضًا في Everon، فجرّب تبديل هذا الإعداد إلى «تكرار»، وإذا حلّ ذلك المشكلة فأبلغ عن مشكلة على Github (راجع ملف README.md لمعرفة كيفية الإبلاغ عن مشكلة).';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'وراثة Pre SCSS';
$string['prescssinheritancesetting_desc'] = 'بهذا الإعداد تتحكم فيما إذا كان يجب وراثة شيفرة pre SCSS من Boost Union أو تكرارها.';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'وراثة Extra SCSS';
$string['extrascssinheritancesetting_desc'] = 'بهذا الإعداد تتحكم فيما إذا كان يجب وراثة شيفرة extra SCSS من Boost Union أو تكرارها.';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = 'إمكانية الوصول';
$string['accessibilityheading'] = 'شريط إمكانية الوصول';
$string['accessibilityheading_desc'] = 'أداة في شريط التنقل تتيح لكل مستخدم ضبط المحتوى واللون وأدوات المساعدة. تُخزَّن التفضيلات في المتصفح (localStorage) وليس في تفضيلات مستخدم Moodle.';
$string['enableaccessibilitytool'] = 'تمكين شريط إمكانية الوصول';
$string['enableaccessibilitytool_desc'] = 'إظهار أيقونة إمكانية الوصول في شريط التنقل العلوي (بجانب الإشعارات/الرسائل) وتحميل الشريط. الافتراضي: نعم.';
$string['accessibilitymenu'] = 'خيارات إمكانية الوصول';
$string['a11ycontentadjustments'] = 'ضبط المحتوى';
$string['a11ycoloradjustments'] = 'ضبط الألوان';
$string['a11ytools'] = 'الأدوات';
$string['a11yadjustfontsize'] = 'ضبط حجم الخط';
$string['a11ydecreasefont'] = 'تصغير حجم الخط';
$string['a11yincreasefont'] = 'تكبير حجم الخط';
$string['a11yhighlighttitle'] = 'تمييز العنوان';
$string['a11yhighlightlinks'] = 'تمييز الروابط';
$string['a11ydyslexiafont'] = 'خط عسر القراءة';
$string['a11yletterspacing'] = 'تباعد الحروف';
$string['a11ylineheight'] = 'ارتفاع السطر';
$string['a11yfontweight'] = 'سُمك الخط';
$string['a11ydarkcontrast'] = 'تباين داكن';
$string['a11ylightcontrast'] = 'تباين فاتح';
$string['a11yhighcontrast'] = 'تباين عالٍ';
$string['a11yhighsaturation'] = 'تشبّع عالٍ';
$string['a11ylowsaturation'] = 'تشبّع منخفض';
$string['a11ymonochrome'] = 'أحادي اللون';
$string['a11ydarkmode'] = 'الوضع الداكن';
$string['a11yreadingguide'] = 'دليل القراءة';
$string['a11ystopanimations'] = 'إيقاف الحركات';
$string['a11ybigcursor'] = 'مؤشر كبير';
$string['a11yresetall'] = 'إعادة ضبط جميع إعدادات إمكانية الوصول';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = 'أيقونة في شريط التنقل تفتح روابط اختصار حسب الدور. مديرو الموقع هو الحزمة الافتراضية؛ أضف أي أدوار موقع أخرى حسب الحاجة. تُدمَج الحزم المتطابقة وتُزال التكرارات حسب عنوان URL. تُخفى الأيقونة عندما يكون Launch Pad معطّلًا أو عندما لا يملك المستخدم الحالي أي روابط.';
$string['enablelaunchpad'] = 'تمكين Launch Pad';
$string['enablelaunchpad_desc'] = 'إظهار أيقونة Launch Pad في شريط التنقل العلوي (بعد أداة إمكانية الوصول وقبل قائمة المستخدم) عندما يملك المستخدم رابطًا مكوَّنًا واحدًا على الأقل. الافتراضي: لا — فعّله بعد إضافة روابط JSON أدناه.';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = 'مصفوفة JSON من الكائنات تحتوي على <code>label</code> و<code>url</code> (مسار نسبي للموقع مثل <code>/admin/search.php</code>) و<code>icon</code> اختياري (فئة Font Awesome، مثل <code>fa-cog</code>). تُرفض عناوين URL الخارجية في الإصدار v1. Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = 'الروابط: مديرو الموقع';
$string['launchpadlinks_siteadmin_desc'] = 'تُعرض عندما يكون المستخدم مدير موقع (<code>is_siteadmin()</code>).';
$string['launchpadlinks_manager'] = 'الروابط: المدير';
$string['launchpadlinks_manager_desc'] = 'إعداد MVP قديم (يُرحَّل إلى حزمة دور المدير عند الإمكان).';
$string['launchpadlinks_authenticated'] = 'الروابط: المستخدمون المصادق عليهم';
$string['launchpadlinks_authenticated_desc'] = 'احتياطي لكل مستخدم مسجّل دخول غير ضيف. يُدمَج بعد siteadmin وحزم الأدوار.';

$string['launchpadrolelinks'] = 'حزم روابط الأدوار';
$string['launchpadrolelinks_desc'] = 'كوّن قوائم روابط JSON. مديرو الموقع موجود دائمًا (افتراضي). استخدم إضافة دور لأي دور موقع آخر. تطابق حزم الأدوار عندما يملك المستخدم ذلك الدور في أي سياق. يستخدم التخزين معرّفات الأدوار؛ وتعرض التسميات اسم الدور الحالي.';
$string['launchpadbuiltinpacks'] = 'الحزم المضمّنة';
$string['launchpadconfiguredroles'] = 'الحزم المكوَّنة';
$string['launchpadaddrole'] = 'إضافة دور';
$string['launchpadremoverole'] = 'إزالة';
$string['launchpadchooserole'] = 'اختر دورًا…';
$string['launchpadlinks_role'] = 'الروابط: {$a}';
$string['launchpadrolemissing'] = 'الدور #{$a} (مفقود)';
$string['launchpadrolemapinvalid'] = 'يجب أن تكون روابط أدوار Launch Pad كائن JSON يعيّن مفاتيح الحزم إلى مصفوفات الروابط.';

$string['launchpadjsoninvalid'] = 'يجب أن تكون روابط Launch Pad مصفوفة JSON من الكائنات، لكل منها label وurl غير فارغين.';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = 'وضع التركيز';
$string['focusmodeheading'] = 'وضع التركيز';
$string['focusmodeheading_desc'] = 'عنصر تحكم عائم في صفحات محتوى المقرر ولوحة المعلومات (/my/) ومقرراتي (/my/courses.php) وصفحات البداية المخصّصة لـ MuTMS يخفي التنقل الثانوي والأدراج ويوسّع المحتوى الرئيسي. يُخزَّن التفضيل لكل مقرر أو صفحة في المتصفح (localStorage).';
$string['enablefocusmode'] = 'تمكين وضع التركيز';
$string['enablefocusmode_desc'] = 'إظهار زر وضع التركيز (أسفل اليمين) في صفحات الصفحة الرئيسية للمقرر والقسم والنشاط وكذلك لوحة المعلومات (/my/) ومقرراتي (/my/courses.php) وصفحات البداية المخصّصة لـ MuTMS. الافتراضي: نعم.';
$string['focusmodeenable'] = 'وضع التركيز';
$string['focusmodedisable'] = 'الخروج من وضع التركيز';
$string['focusmodenotice'] = 'وضع التركيز مفعّل. انقر على × في أسفل اليمين لإيقافه.';


// Settings: User menu tiles tab.
$string['usermenutab'] = 'قائمة المستخدم';
$string['usermenuheading'] = 'بلاطات قائمة المستخدم';
$string['usermenuheading_desc'] = 'يعيد تصميم قائمة الملف الشخصي كشبكة بلاطات بأسلوب Launch Pad (نفس وجهات Boost). مظهر اللوحة يطابق بالفعل إمكانية الوصول / Launch Pad. عطّله للاحتفاظ بقائمة الروابط العمودية.';
$string['enableusermenutiles'] = 'تمكين بلاطات قائمة المستخدم';
$string['enableusermenutiles_desc'] = 'عرض عناصر قائمة الملف الشخصي كشبكة بلاطات من 3 أعمدة مع أيقونات Font Awesome. الافتراضي: نعم. عيّنه إلى لا للقائمة العمودية.';

// Settings: Compact navbar tab.
$string['navbartab'] = 'شريط التنقل';
$string['navbarheading'] = 'شريط تنقل مضغوط';
$string['navbarheading_desc'] = 'شريط علوي أضيق قليلًا، وتسطير أوضح للرابط النشط، وأهداف لمس متسقة لأيقونات الأدوات. يبقى شعار الموقع ولون العلامة التجارية في Boost Union ← المظهر (مسار متعدد العملاء). تخطيط تسجيل الدخول دون تغيير (تسجيل دخول Boost Union فقط).';
$string['enablecompactnavbar'] = 'تمكين شريط التنقل المضغوط';
$string['enablecompactnavbar_desc'] = 'تطبيق مظهر شريط التنقل المضغوط على جميع الصفحات باستثناء تسجيل الدخول. الافتراضي: نعم. عطّله لاستخدام ارتفاع شريط Boost Union القياسي.';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = 'مقرراتي';
$string['mycoursesheading'] = 'تخطيط مقرراتي';
$string['mycoursesheading_desc'] = 'مظهر شبكة بطاقات اختياري في صفحة مقرراتي (/my/courses.php) بالعرض الافتراضي لـ Moodle / Boost Union (قابل للتوسيع عبر وضع التركيز). يُطبَّق تنسيق على كتلة نظرة عامة على المقررات القياسية — دون استبدالها. البحث والتجميع والفرز وأوضاع العرض تبقى من Moodle الأساسي.';
$string['enablemycourseslayout'] = 'تمكين تخطيط مقرراتي';
$string['enablemycourseslayout_desc'] = 'يعرض شبكة بطاقات متجاوبة (1–3 أعمدة بالعرض الافتراضي، وتتوسّع حتى 5 أعمدة في وضع التركيز)، ويعيد تنسيق البطاقات (ظل، تقدّم دائري على الصورة، نجمة على الصورة). الافتراضي: نعم.';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = 'إحصاءات مقرراتي';
$string['mycoursesstatsheading_desc'] = 'شريط إحصاءات اختياري في أعلى مقرراتي (/my/courses.php) للمستخدم الحالي: التسجيلات والإكمالات والشارات والشهادات. يمكن تمكين كل لوحة بشكل مستقل.';
$string['enablemycoursesstats'] = 'تمكين إحصاءات مقرراتي';
$string['enablemycoursesstats_desc'] = 'إظهار شريط الإحصاءات فوق نظرة عامة على المقررات في مقرراتي. الافتراضي: نعم.';
$string['mycoursesstatsenrolments'] = 'إظهار لوحة التسجيلات';
$string['mycoursesstatsenrolments_desc'] = 'عدد مقررات المستخدم الحالي النشطة (قيد التقدّم). الافتراضي: نعم.';
$string['mycoursesstatscompletions'] = 'إظهار لوحة الإكمالات';
$string['mycoursesstatscompletions_desc'] = 'عدد المقررات التي أكملها المستخدم الحالي. الافتراضي: نعم.';
$string['mycoursesstatsbadges'] = 'إظهار لوحة الشارات';
$string['mycoursesstatsbadges_desc'] = 'عدد الشارات الممنوحة للمستخدم الحالي. الافتراضي: نعم.';
$string['mycoursesstatscertificates'] = 'إظهار لوحة الشهادات';
$string['mycoursesstatscertificates_desc'] = 'عدد الشهادات الممنوحة للمستخدم الحالي (tool_certificate أو mod_customcert عند تثبيتهما؛ وإلا 0). الافتراضي: نعم.';
$string['mycoursesstatsaria'] = 'إحصاءات مقرراتي';
$string['mycoursesstatsenrolmentstitle'] = 'التسجيلات';
$string['mycoursesstatsenrolmentssub'] = '{$a} مقررات نشطة';
$string['mycoursesstatscompletionstitle'] = 'الإكمالات';
$string['mycoursesstatscompletionssub'] = '{$a} مقررات مكتملة';
$string['mycoursesstatsbadgestitle'] = 'الشارات';
$string['mycoursesstatsbadgessub'] = '{$a} ممنوحة';
$string['mycoursesstatscertificatestitle'] = 'الشهادات';
$string['mycoursesstatscertificatessub'] = '{$a} ممنوحة';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = 'لوحة المعلومات';
$string['dashboardheading'] = 'تخطيط لوحة المعلومات';
$string['dashboardheading_desc'] = 'شبكة بطاقات ومظهر أسطح الكتل الاختياري للوحة المعلومات على /my/ بالعرض الافتراضي لـ Moodle / Boost Union (قابل للتوسيع عبر وضع التركيز)، مع مظهر بطاقات نظرة عامة على المقررات المشترك مع مقرراتي. تخطيط الأعمدة (التقويم / الأحداث القادمة على اليمين) يستخدم Boost Union Outside (يمين) — اضبطه تحت الإحساس ← الكتل.';
$string['enabledashboardlayout'] = 'تمكين تخطيط لوحة المعلومات';
$string['enabledashboardlayout_desc'] = 'يطبّق نفس مظهر بطاقات نظرة عامة على المقررات كما في مقرراتي على لوحة المعلومات (1–3 أعمدة بالعرض الافتراضي، وتتوسّع إلى 4 أعمدة في وضع التركيز). كما يوحّد أسطح كتل المخطط الزمني / التقويم / القادمة ويخفّف حالات الفراغ لتطابقها. الافتراضي: نعم. فعّل Boost Union Outside (يمين) بشكل منفصل للعمود الأيمن.';
$string['dashboardsurfacesnote'] = 'عند تمكين تخطيط لوحة المعلومات، تطبّق Everon أيضًا رموز سطح الكتل المشتركة (حد ناعم، نصف قطر، ظل) وتنسيقًا أكثر هدوءًا لحالات الفراغ في المخطط الزمني / القادمة بحيث تطابق الكتل الداعمة بطاقات المقررات.';

// Privacy API.
$string['privacy:metadata'] = 'لا تخزّن سمة Everon أي بيانات شخصية عن أي مستخدم. تُخزَّن تفضيلات إمكانية الوصول ووضع التركيز في المتصفح فقط. روابط Launch Pad وتخطيط مقرراتي وإحصاءات مقرراتي وتخطيط لوحة المعلومات وشريط التنقل المضغوط هي إعدادات إدارة على مستوى الموقع.';
