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
$string['choosereadme'] = 'Everon은 Project Theme용 Boost Union 자식 테마입니다. 기본 Union 모습과 함께 접근성 도구 모음, Launch Pad, 집중 모드, 내 강의 레이아웃, 대시보드 레이아웃 같은 선택 기능을 제공합니다.';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon은 Project Theme용 Boost Union 자식 테마입니다. Union 모양/콘텐츠 설정을 우선하세요. Everon은 접근성 도구 모음, Launch Pad 바로가기, 집중 모드, 내 강의 카드 레이아웃, 대시보드 레이아웃 같은 기능을 추가합니다.';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = '상속';
$string['inheritanceinherit'] = '상속';
$string['inheritanceduplicate'] = '복제';
$string['inheritanceoptionsexplanation'] = '대부분의 경우 상속으로 충분합니다. 그러나 Boost Union에 불완전한 코드가 통합되어 특정 Boost Union 기능의 단순 SCSS 상속이 막힐 수 있습니다. Everon에서도 작동하지 않는 것처럼 보이는 Boost Union 기능 문제가 있으면 이 설정을 \'복제\'로 바꿔 보세요. 문제가 해결되면 Github에 이슈를 보고하세요(보고 방법은 README.md 파일 참조).';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'Pre SCSS 상속';
$string['prescssinheritancesetting_desc'] = '이 설정으로 Boost Union의 pre SCSS 코드를 상속할지 복제할지 제어합니다.';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'Extra SCSS 상속';
$string['extrascssinheritancesetting_desc'] = '이 설정으로 Boost Union의 extra SCSS 코드를 상속할지 복제할지 제어합니다.';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = '접근성';
$string['accessibilityheading'] = '접근성 도구 모음';
$string['accessibilityheading_desc'] = '각 사용자가 콘텐츠, 색상, 보조 도구를 조정할 수 있는 탐색 표시줄 유틸리티입니다. 환경설정은 브라우저(localStorage)에 저장되며 Moodle 사용자 환경설정에는 저장되지 않습니다.';
$string['enableaccessibilitytool'] = '접근성 도구 모음 사용';
$string['enableaccessibilitytool_desc'] = '상단 탐색 표시줄(알림/메시지 옆)에 접근성 아이콘을 표시하고 도구 모음을 로드합니다. 기본값: 예.';
$string['accessibilitymenu'] = '접근성 옵션';
$string['a11ycontentadjustments'] = '콘텐츠 조정';
$string['a11ycoloradjustments'] = '색상 조정';
$string['a11ytools'] = '도구';
$string['a11yadjustfontsize'] = '글꼴 크기 조정';
$string['a11ydecreasefont'] = '글꼴 크기 줄이기';
$string['a11yincreasefont'] = '글꼴 크기 늘리기';
$string['a11yhighlighttitle'] = '제목 강조';
$string['a11yhighlightlinks'] = '링크 강조';
$string['a11ydyslexiafont'] = '난독증 글꼴';
$string['a11yletterspacing'] = '자간';
$string['a11ylineheight'] = '줄 높이';
$string['a11yfontweight'] = '글꼴 두께';
$string['a11ydarkcontrast'] = '어두운 대비';
$string['a11ylightcontrast'] = '밝은 대비';
$string['a11yhighcontrast'] = '고대비';
$string['a11yhighsaturation'] = '높은 채도';
$string['a11ylowsaturation'] = '낮은 채도';
$string['a11ymonochrome'] = '단색';
$string['a11ycolourmode'] = '색상 모드';
$string['a11ycolourmodedark'] = '어두운';
$string['a11ycolourmodelight'] = '밝은';
$string['a11ycolourmodesystem'] = '시스템';
$string['a11yreadingguide'] = '읽기 가이드';
$string['a11ystopanimations'] = '애니메이션 중지';
$string['a11ybigcursor'] = '큰 커서';
$string['a11yresetall'] = '모든 접근성 설정 재설정';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = '역할에 맞는 바로가기 링크를 여는 탐색 표시줄 아이콘입니다. 기본 팩은 사이트 관리자입니다. 필요에 따라 다른 사이트 역할을 추가하세요. 일치하는 팩은 URL로 병합되고 중복 제거됩니다. Launch Pad가 비활성화되었거나 현재 사용자에게 링크가 없으면 아이콘이 숨겨집니다.';
$string['enablelaunchpad'] = 'Launch Pad 사용';
$string['enablelaunchpad_desc'] = '사용자에게 구성된 링크가 하나 이상 있을 때 상단 탐색 표시줄(접근성 도구 뒤, 사용자 메뉴 앞)에 Launch Pad 아이콘을 표시합니다. 기본값: 아니요 — 아래 JSON 링크를 추가한 뒤 켜세요.';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = '<code>label</code>, <code>url</code>(예: <code>/admin/search.php</code> 같은 사이트 상대 경로), 선택적 <code>icon</code>(Font Awesome 클래스, 예: <code>fa-cog</code>)이 있는 객체의 JSON 배열입니다. 외부 URL은 v1에서 거부됩니다. Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = '링크: 사이트 관리자';
$string['launchpadlinks_siteadmin_desc'] = '사용자가 사이트 관리자일 때 표시됩니다(<code>is_siteadmin()</code>).';
$string['launchpadlinks_manager'] = '링크: 관리자';
$string['launchpadlinks_manager_desc'] = '레거시 MVP 설정(가능하면 관리자 역할 팩으로 마이그레이션됨).';
$string['launchpadlinks_authenticated'] = '링크: 인증된 사용자';
$string['launchpadlinks_authenticated_desc'] = '게스트가 아닌 로그인한 모든 사용자를 위한 대체입니다. siteadmin 및 역할 팩 뒤에 병합됩니다.';

$string['launchpadrolelinks'] = '역할 링크 팩';
$string['launchpadrolelinks_desc'] = 'JSON 링크 목록을 구성합니다. 사이트 관리자는 항상 있습니다(기본). 다른 사이트 역할에는 역할 추가를 사용하세요. 사용자가 어떤 컨텍스트에서든 해당 역할을 가지면 역할 팩이 일치합니다. 저장소는 역할 id를 사용하며, 레이블은 현재 역할 이름을 표시합니다.';
$string['launchpadbuiltinpacks'] = '기본 제공 팩';
$string['launchpadconfiguredroles'] = '구성된 팩';
$string['launchpadaddrole'] = '역할 추가';
$string['launchpadremoverole'] = '제거';
$string['launchpadchooserole'] = '역할 선택…';
$string['launchpadlinks_role'] = '링크: {$a}';
$string['launchpadrolemissing'] = '역할 #{$a}(없음)';
$string['launchpadrolemapinvalid'] = 'Launch Pad 역할 링크는 팩 키를 링크 배열에 매핑하는 JSON 객체여야 합니다.';

$string['launchpadjsoninvalid'] = 'Launch Pad 링크는 각각 비어 있지 않은 label과 url이 있는 객체의 JSON 배열이어야 합니다.';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = '집중 모드';
$string['focusmodeheading'] = '집중 모드';
$string['focusmodeheading_desc'] = '강의 콘텐츠 페이지, 대시보드(/my/), 내 강의(/my/courses.php) 및 MuTMS 사용자 지정 홈 페이지의 플로팅 컨트롤로, 보조 탐색과 서랍을 숨기고 기본 콘텐츠를 넓힙니다. 환경설정은 강의 또는 페이지별로 브라우저(localStorage)에 저장됩니다.';
$string['enablefocusmode'] = '집중 모드 사용';
$string['enablefocusmode_desc'] = '강의 홈, 섹션, 활동 페이지와 대시보드(/my/), 내 강의(/my/courses.php) 및 MuTMS 사용자 지정 홈 페이지에 집중 모드 버튼(오른쪽 아래)을 표시합니다. 기본값: 예.';
$string['focusmodeenable'] = '집중 모드';
$string['focusmodedisable'] = '집중 모드 종료';
$string['focusmodenotice'] = '집중 모드가 켜져 있습니다. 오른쪽 아래 ×를 클릭하여 끄세요.';


// Settings: User menu tiles tab.
$string['usermenutab'] = '사용자 메뉴';
$string['usermenuheading'] = '사용자 메뉴 타일';
$string['usermenuheading_desc'] = '프로필 사용자 메뉴를 Launch Pad 스타일 타일 그리드로 다시 꾸밉니다(동일한 Boost 대상). 패널 외관은 이미 접근성 / Launch Pad와 일치합니다. 끄면 세로 링크 목록을 유지합니다.';
$string['enableusermenutiles'] = '사용자 메뉴 타일 사용';
$string['enableusermenutiles_desc'] = '프로필 사용자 메뉴 항목을 Font Awesome 아이콘이 있는 3열 타일 그리드로 표시합니다. 기본값: 예. 세로 목록은 아니요로 설정하세요.';

// Settings: Compact navbar tab.
$string['navbartab'] = '탐색 표시줄';
$string['navbarheading'] = '컴팩트 탐색 표시줄';
$string['navbarheading_desc'] = '조금 더 조밀한 상단 표시줄, 더 명확한 활성 링크 밑줄, 일관된 유틸리티 아이콘 터치 영역. 사이트 로고와 브랜드 색상은 Boost Union → 모양(다중 클라이언트 경로)에 그대로 둡니다. 로그인 레이아웃은 변경되지 않습니다(Boost Union 로그인만).';
$string['enablecompactnavbar'] = '컴팩트 탐색 표시줄 사용';
$string['enablecompactnavbar_desc'] = '로그인을 제외한 모든 페이지에 컴팩트 탐색 표시줄 외관을 적용합니다. 기본값: 예. 끄면 기본 Boost Union 탐색 표시줄 높이를 사용합니다.';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = '내 강의';
$string['mycoursesheading'] = '내 강의 레이아웃';
$string['mycoursesheading_desc'] = '내 강의 페이지(/my/courses.php)에서 기본 Moodle / Boost Union 페이지 너비(집중 모드로 확장 가능)에 적용되는 선택적 카드 그리드 스킨입니다. 기본 강의 개요 블록에 스킨을 적용하며 대체하지 않습니다. 검색, 그룹화, 정렬, 보기 모드는 코어 Moodle 그대로입니다.';
$string['enablemycourseslayout'] = '내 강의 레이아웃 사용';
$string['enablemycourseslayout_desc'] = '반응형 카드 그리드(기본 너비에서 1–3열, 집중 모드에서 최대 5열)를 표시하고 카드를 다시 꾸밉니다(그림자, 이미지 위 원형 진행률, 이미지 위 별). 기본값: 예.';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = '내 강의 통계';
$string['mycoursesstatsheading_desc'] = '현재 사용자를 위한 내 강의(/my/courses.php) 상단의 선택적 통계 띠입니다: 등록, 이수, 배지, 인증서. 각 패널을 독립적으로 사용할 수 있습니다.';
$string['enablemycoursesstats'] = '내 강의 통계 사용';
$string['enablemycoursesstats_desc'] = '내 강의의 강의 개요 위에 통계 띠를 표시합니다. 기본값: 예.';
$string['mycoursesstatsenrolments'] = '등록 패널 표시';
$string['mycoursesstatsenrolments_desc'] = '현재 사용자의 진행 중인 활성 강의 수. 기본값: 예.';
$string['mycoursesstatscompletions'] = '이수 패널 표시';
$string['mycoursesstatscompletions_desc'] = '현재 사용자가 이수한 강의 수. 기본값: 예.';
$string['mycoursesstatsbadges'] = '배지 패널 표시';
$string['mycoursesstatsbadges_desc'] = '현재 사용자에게 수여된 배지 수. 기본값: 예.';
$string['mycoursesstatscertificates'] = '인증서 패널 표시';
$string['mycoursesstatscertificates_desc'] = '현재 사용자에게 수여된 인증서 수(설치된 경우 tool_certificate 또는 mod_customcert, 아니면 0). 기본값: 예.';
$string['mycoursesstatsaria'] = '내 강의 통계';
$string['mycoursesstatsenrolmentstitle'] = '등록';
$string['mycoursesstatsenrolmentssub'] = '{$a}개 진행 중 강의';
$string['mycoursesstatscompletionstitle'] = '이수';
$string['mycoursesstatscompletionssub'] = '{$a}개 이수 강의';
$string['mycoursesstatsbadgestitle'] = '배지';
$string['mycoursesstatsbadgessub'] = '{$a}개 수여';
$string['mycoursesstatscertificatestitle'] = '인증서';
$string['mycoursesstatscertificatessub'] = '{$a}개 수여';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = '대시보드';
$string['dashboardheading'] = '대시보드 레이아웃';
$string['dashboardheading_desc'] = '/my/에서 기본 Moodle / Boost Union 페이지 너비(집중 모드로 확장 가능)에 적용되는 선택적 대시보드 카드 그리드 및 블록 표면 스킨으로, 내 강의와 강의 개요 카드 외관을 공유합니다. 열 레이아웃(오른쪽 캘린더/다가오는 이벤트)은 Boost Union Outside(오른쪽)를 사용합니다 — Feeling → Blocks에서 구성하세요.';
$string['enabledashboardlayout'] = '대시보드 레이아웃 사용';
$string['enabledashboardlayout_desc'] = '대시보드에 내 강의와 같은 강의 개요 카드 외관을 적용합니다(기본 너비에서 1–3열, 집중 모드에서 4열). 또한 타임라인/캘린더/다가오는 블록 표면을 통일하고 빈 상태를 부드럽게 맞춥니다. 기본값: 예. 오른쪽 열에는 Boost Union Outside(오른쪽)를 따로 사용하세요.';
$string['dashboardsurfacesnote'] = '대시보드 레이아웃이 켜지면 Everon은 공유 블록 표면 토큰(부드러운 테두리, 반경, 그림자)과 더 차분한 타임라인/다가오는 빈 상태 스타일도 적용하여 보조 블록이 강의 카드와 맞도록 합니다.';

// Privacy API.
$string['privacy:metadata'] = 'Everon 테마는 어떤 사용자의 개인 데이터도 저장하지 않습니다. 접근성 및 집중 모드 환경설정은 브라우저에만 저장됩니다. Launch Pad 링크, 내 강의 레이아웃, 내 강의 통계, 대시보드 레이아웃, 컴팩트 탐색 표시줄은 사이트 전체 관리자 설정입니다.';
