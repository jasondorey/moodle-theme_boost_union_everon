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
$string['choosereadme'] = 'Everon は Project Theme 向けの Boost Union 子テーマです。標準の Union の外観に加え、アクセシビリティツールバー、Launch Pad、フォーカスモード、マイコースレイアウト、ダッシュボードレイアウトなどのオプション機能を提供します。';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon は Project Theme 向けの Boost Union 子テーマです。Union の外観／コンテンツ設定を優先してください。Everon はアクセシビリティツールバー、Launch Pad ショートカット、フォーカスモード、マイコースのカードレイアウト、ダッシュボードレイアウトなどの機能を追加します。';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = '継承';
$string['inheritanceinherit'] = '継承';
$string['inheritanceduplicate'] = '複製';
$string['inheritanceoptionsexplanation'] = 'ほとんどの場合、継承で問題ありません。ただし、Boost Union に不完全なコードが統合され、特定の Boost Union 機能で単純な SCSS 継承が妨げられることがあります。Everon でも動作しないように見える Boost Union 機能の問題に遭遇した場合は、この設定を「複製」に切り替えてみてください。それで解決する場合は、Github で問題を報告してください（報告方法の詳細は README.md ファイルを参照）。';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'Pre SCSS の継承';
$string['prescssinheritancesetting_desc'] = 'この設定で、Boost Union の pre SCSS コードを継承するか複製するかを制御します。';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'Extra SCSS の継承';
$string['extrascssinheritancesetting_desc'] = 'この設定で、Boost Union の extra SCSS コードを継承するか複製するかを制御します。';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = 'アクセシビリティ';
$string['accessibilityheading'] = 'アクセシビリティツールバー';
$string['accessibilityheading_desc'] = '各ユーザーがコンテンツ、色、支援ツールを調整できるナビバーユーティリティです。設定はブラウザ（localStorage）に保存され、Moodle のユーザー設定には保存されません。';
$string['enableaccessibilitytool'] = 'アクセシビリティツールバーを有効にする';
$string['enableaccessibilitytool_desc'] = '上部ナビバー（通知／メッセージの隣）にアクセシビリティアイコンを表示し、ツールバーを読み込みます。デフォルト: はい。';
$string['accessibilitymenu'] = 'アクセシビリティオプション';
$string['a11ycontentadjustments'] = 'コンテンツ調整';
$string['a11ycoloradjustments'] = '色の調整';
$string['a11ytools'] = 'ツール';
$string['a11yadjustfontsize'] = 'フォントサイズを調整';
$string['a11ydecreasefont'] = 'フォントサイズを小さくする';
$string['a11yincreasefont'] = 'フォントサイズを大きくする';
$string['a11yhighlighttitle'] = 'タイトルを強調';
$string['a11yhighlightlinks'] = 'リンクを強調';
$string['a11ydyslexiafont'] = 'ディスレクシア用フォント';
$string['a11yletterspacing'] = '文字間隔';
$string['a11ylineheight'] = '行の高さ';
$string['a11yfontweight'] = 'フォントの太さ';
$string['a11ydarkcontrast'] = 'ダークコントラスト';
$string['a11ylightcontrast'] = 'ライトコントラスト';
$string['a11yhighcontrast'] = 'ハイコントラスト';
$string['a11yhighsaturation'] = '高彩度';
$string['a11ylowsaturation'] = '低彩度';
$string['a11ymonochrome'] = 'モノクロ';
$string['a11ydarkmode'] = 'ダークモード';
$string['a11yreadingguide'] = '読書ガイド';
$string['a11ystopanimations'] = 'アニメーションを停止';
$string['a11ybigcursor'] = '大きなカーソル';
$string['a11yresetall'] = 'すべてのアクセシビリティ設定をリセット';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = '役割に応じたショートカットリンクを開くナビバーアイコンです。デフォルトパックはサイト管理者です。必要に応じて他のサイトロールを追加してください。一致するパックは URL でマージおよび重複排除されます。Launch Pad が無効な場合、または現在のユーザーにリンクがない場合、アイコンは非表示になります。';
$string['enablelaunchpad'] = 'Launch Pad を有効にする';
$string['enablelaunchpad_desc'] = 'ユーザーに少なくとも 1 つの設定済みリンクがある場合、上部ナビバー（アクセシビリティツールの後、ユーザーメニューの前）に Launch Pad アイコンを表示します。デフォルト: いいえ — 下の JSON リンクを追加してから有効にしてください。';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = '<code>label</code>、<code>url</code>（<code>/admin/search.php</code> のようなサイト相対パス）、任意の <code>icon</code>（Font Awesome クラス、例: <code>fa-cog</code>）を持つオブジェクトの JSON 配列です。外部 URL は v1 では拒否されます。Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = 'リンク: サイト管理者';
$string['launchpadlinks_siteadmin_desc'] = 'ユーザーがサイト管理者のときに表示されます（<code>is_siteadmin()</code>）。';
$string['launchpadlinks_manager'] = 'リンク: マネージャ';
$string['launchpadlinks_manager_desc'] = 'レガシー MVP 設定（可能な場合はマネージャロールパックに移行されます）。';
$string['launchpadlinks_authenticated'] = 'リンク: 認証済みユーザ';
$string['launchpadlinks_authenticated_desc'] = 'ゲスト以外のログイン済みユーザ全員向けのフォールバックです。siteadmin とロールパックの後にマージされます。';

$string['launchpadrolelinks'] = 'ロールリンクパック';
$string['launchpadrolelinks_desc'] = 'JSON リンクリストを設定します。サイト管理者は常に存在します（デフォルト）。他のサイトロールには「ロールを追加」を使用します。ユーザがそのロールを任意のコンテキストで持っている場合にロールパックが一致します。保存にはロール ID を使用し、ラベルには現在のロール名が表示されます。';
$string['launchpadbuiltinpacks'] = '組み込みパック';
$string['launchpadconfiguredroles'] = '設定済みパック';
$string['launchpadaddrole'] = 'ロールを追加';
$string['launchpadremoverole'] = '削除';
$string['launchpadchooserole'] = 'ロールを選択…';
$string['launchpadlinks_role'] = 'リンク: {$a}';
$string['launchpadrolemissing'] = 'ロール #{$a}（欠落）';
$string['launchpadrolemapinvalid'] = 'Launch Pad のロールリンクは、パックキーをリンク配列にマッピングする JSON オブジェクトである必要があります。';

$string['launchpadjsoninvalid'] = 'Launch Pad リンクは、それぞれ空でない label と url を持つオブジェクトの JSON 配列である必要があります。';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = 'フォーカスモード';
$string['focusmodeheading'] = 'フォーカスモード';
$string['focusmodeheading_desc'] = 'コースコンテンツページ、ダッシュボード（/my/）、マイコース（/my/courses.php）、MuTMS カスタムホームページ上のフローティングコントロールで、セカンダリナビゲーションとドロワーを非表示にし、メインコンテンツを広げます。設定はコースまたはページごとにブラウザ（localStorage）に保存されます。';
$string['enablefocusmode'] = 'フォーカスモードを有効にする';
$string['enablefocusmode_desc'] = 'コースホーム、セクション、活動ページに加え、ダッシュボード（/my/）、マイコース（/my/courses.php）、MuTMS カスタムホームページにフォーカスモードボタン（右下）を表示します。デフォルト: はい。';
$string['focusmodeenable'] = 'フォーカスモード';
$string['focusmodedisable'] = 'フォーカスモードを終了';
$string['focusmodenotice'] = 'フォーカスモードがオンです。右下の × をクリックしてオフにしてください。';


// Settings: User menu tiles tab.
$string['usermenutab'] = 'ユーザメニュー';
$string['usermenuheading'] = 'ユーザメニュータイル';
$string['usermenuheading_desc'] = 'プロフィールのユーザメニューを Launch Pad 風のタイルグリッドに再スタイルします（同じ Boost の遷移先）。パネルの外観はすでにアクセシビリティ／Launch Pad と一致しています。オフにすると縦のリンク一覧のままになります。';
$string['enableusermenutiles'] = 'ユーザメニュータイルを有効にする';
$string['enableusermenutiles_desc'] = 'プロフィールのユーザメニュー項目を Font Awesome アイコン付きの 3 列タイルグリッドとして表示します。デフォルト: はい。縦一覧にする場合は「いいえ」に設定してください。';

// Settings: Compact navbar tab.
$string['navbartab'] = 'ナビバー';
$string['navbarheading'] = 'コンパクトナビバー';
$string['navbarheading_desc'] = 'ややコンパクトなトップバー、より明確なアクティブリンクの下線、一貫したユーティリティアイコンのヒット領域。サイトロゴとブランドカラーは Boost Union → 外観（マルチクライアントパス）のままです。ログインレイアウトは変更されません（Boost Union ログインのみ）。';
$string['enablecompactnavbar'] = 'コンパクトナビバーを有効にする';
$string['enablecompactnavbar_desc'] = 'ログイン以外のすべてのページにコンパクトナビバーの外観を適用します。デフォルト: はい。オフにすると標準の Boost Union ナビバー高さを使用します。';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = 'マイコース';
$string['mycoursesheading'] = 'マイコースレイアウト';
$string['mycoursesheading_desc'] = 'マイコースページ（/my/courses.php）のオプションのカードグリッドスキンです。Moodle / Boost Union のデフォルト幅を使用します（フォーカスモードで拡張可能）。標準のコース概要ブロックにスキンを適用します — 置き換えではありません。検索、グループ化、並べ替え、表示モードはコア Moodle のままです。';
$string['enablemycourseslayout'] = 'マイコースレイアウトを有効にする';
$string['enablemycourseslayout_desc'] = 'レスポンシブなカードグリッド（デフォルト幅では 1〜3 列、フォーカスモードでは最大 5 列）を表示し、カードを再スタイルします（影、画像上の円形進捗、画像上の星）。デフォルト: はい。';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = 'マイコース統計';
$string['mycoursesstatsheading_desc'] = '現在のユーザ向けにマイコース（/my/courses.php）上部に表示するオプションの統計ストリップです: 登録、完了、バッジ、証明書。各パネルは個別に有効にできます。';
$string['enablemycoursesstats'] = 'マイコース統計を有効にする';
$string['enablemycoursesstats_desc'] = 'マイコースのコース概要の上に統計ストリップを表示します。デフォルト: はい。';
$string['mycoursesstatsenrolments'] = '登録パネルを表示';
$string['mycoursesstatsenrolments_desc'] = '現在のユーザの進行中のアクティブコース数。デフォルト: はい。';
$string['mycoursesstatscompletions'] = '完了パネルを表示';
$string['mycoursesstatscompletions_desc'] = '現在のユーザが完了したコース数。デフォルト: はい。';
$string['mycoursesstatsbadges'] = 'バッジパネルを表示';
$string['mycoursesstatsbadges_desc'] = '現在のユーザに授与されたバッジ数。デフォルト: はい。';
$string['mycoursesstatscertificates'] = '証明書パネルを表示';
$string['mycoursesstatscertificates_desc'] = '現在のユーザに授与された証明書数（インストール済みの場合は tool_certificate または mod_customcert、それ以外は 0）。デフォルト: はい。';
$string['mycoursesstatsaria'] = 'マイコース統計';
$string['mycoursesstatsenrolmentstitle'] = '登録';
$string['mycoursesstatsenrolmentssub'] = '{$a} 件の進行中コース';
$string['mycoursesstatscompletionstitle'] = '完了';
$string['mycoursesstatscompletionssub'] = '{$a} 件の完了コース';
$string['mycoursesstatsbadgestitle'] = 'バッジ';
$string['mycoursesstatsbadgessub'] = '{$a} 件授与';
$string['mycoursesstatscertificatestitle'] = '証明書';
$string['mycoursesstatscertificatessub'] = '{$a} 件授与';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = 'ダッシュボード';
$string['dashboardheading'] = 'ダッシュボードレイアウト';
$string['dashboardheading_desc'] = '/my/ 上のオプションのダッシュボードカードグリッドおよびブロック表面スキンです。Moodle / Boost Union のデフォルト幅を使用し（フォーカスモードで拡張可能）、マイコースとコース概要カードの外観を共有します。列レイアウト（右側のカレンダー／今後のイベント）は Boost Union Outside（右）を使用します — フィーリング → ブロックで設定してください。';
$string['enabledashboardlayout'] = 'ダッシュボードレイアウトを有効にする';
$string['enabledashboardlayout_desc'] = 'ダッシュボードにマイコースと同じコース概要カードの外観を適用します（デフォルト幅では 1〜3 列、フォーカスモードでは 4 列）。また、タイムライン／カレンダー／今後のブロック表面を統一し、空の状態を穏やかに揃えます。デフォルト: はい。右列には Boost Union Outside（右）を別途有効にしてください。';
$string['dashboardsurfacesnote'] = 'ダッシュボードレイアウトが有効な場合、Everon は共有ブロック表面トークン（ソフトな境界線、半径、影）と、より落ち着いたタイムライン／今後の空状態スタイルも適用し、補助ブロックがコースカードと揃うようにします。';

// Privacy API.
$string['privacy:metadata'] = 'Everon テーマはユーザーに関する個人データを一切保存しません。アクセシビリティとフォーカスモードの設定はブラウザにのみ保存されます。Launch Pad リンク、マイコースレイアウト、マイコース統計、ダッシュボードレイアウト、コンパクトナビバーはサイト全体の管理設定です。';
