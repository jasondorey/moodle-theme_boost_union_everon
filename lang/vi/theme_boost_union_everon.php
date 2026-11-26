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
$string['choosereadme'] = 'Everon là giao diện con của Boost Union cho Project Theme. Nó mang giao diện chuẩn của Union cùng các tính năng tùy chọn như thanh công cụ trợ năng, Launch Pad, Chế độ tập trung, bố cục Khóa học của tôi và bố cục Bảng điều khiển.';
$string['configtitle'] = 'Everon';
$string['settingsoverview_buc_desc'] = 'Everon là giao diện con của Boost Union cho Project Theme. Nên ưu tiên cài đặt Giao diện/Nội dung của Union; Everon bổ sung các tính năng như thanh công cụ trợ năng, lối tắt Launch Pad, Chế độ tập trung, bố cục thẻ Khóa học của tôi và bố cục Bảng điều khiển.';

// Settings: General settings tab.
// ... Section: Inheritance.
$string['inheritanceheading'] = 'Kế thừa';
$string['inheritanceinherit'] = 'Kế thừa';
$string['inheritanceduplicate'] = 'Nhân bản';
$string['inheritanceoptionsexplanation'] = 'Hầu hết thời gian, kế thừa là hoàn toàn ổn. Tuy nhiên, có thể mã chưa hoàn thiện được tích hợp vào Boost Union khiến việc kế thừa SCSS đơn giản không hoạt động với một số tính năng Boost Union. Nếu bạn gặp sự cố với các tính năng Boost Union dường như cũng không hoạt động trong Everon, hãy thử chuyển cài đặt này sang \'Nhân bản\' và nếu điều đó giải quyết vấn đề, hãy báo cáo sự cố trên Github (xem tệp README.md để biết cách báo cáo).';
// ... ... Setting: Pre SCSS inheritance setting.
$string['prescssinheritancesetting'] = 'Kế thừa Pre SCSS';
$string['prescssinheritancesetting_desc'] = 'Với cài đặt này, bạn kiểm soát việc mã pre SCSS từ Boost Union sẽ được kế thừa hay nhân bản.';
// ... ... Setting: Extra SCSS inheritance setting.
$string['extrascssinheritancesetting'] = 'Kế thừa Extra SCSS';
$string['extrascssinheritancesetting_desc'] = 'Với cài đặt này, bạn kiểm soát việc mã extra SCSS từ Boost Union sẽ được kế thừa hay nhân bản.';

/**************************************************************
 * EXTENSION POINT:
 * Add your language strings for your settings here.
 *************************************************************/

// Settings: Accessibility tab (ported from theme_custom).
$string['accessibilitytab'] = 'Trợ năng';
$string['accessibilityheading'] = 'Thanh công cụ trợ năng';
$string['accessibilityheading_desc'] = 'Tiện ích thanh điều hướng cho phép mỗi người dùng điều chỉnh nội dung, màu sắc và công cụ hỗ trợ. Tùy chọn được lưu trong trình duyệt (localStorage), không phải trong tùy chọn người dùng Moodle.';
$string['enableaccessibilitytool'] = 'Bật thanh công cụ trợ năng';
$string['enableaccessibilitytool_desc'] = 'Hiển thị biểu tượng trợ năng trên thanh điều hướng trên cùng (bên cạnh thông báo/tin nhắn) và tải thanh công cụ. Mặc định: Có.';
$string['accessibilitymenu'] = 'Tùy chọn trợ năng';
$string['a11ycontentadjustments'] = 'Điều chỉnh nội dung';
$string['a11ycoloradjustments'] = 'Điều chỉnh màu sắc';
$string['a11ytools'] = 'Công cụ';
$string['a11yadjustfontsize'] = 'Điều chỉnh cỡ chữ';
$string['a11ydecreasefont'] = 'Giảm cỡ chữ';
$string['a11yincreasefont'] = 'Tăng cỡ chữ';
$string['a11yhighlighttitle'] = 'Tô sáng tiêu đề';
$string['a11yhighlightlinks'] = 'Tô sáng liên kết';
$string['a11ydyslexiafont'] = 'Phông chữ chứng khó đọc';
$string['a11yletterspacing'] = 'Khoảng cách chữ';
$string['a11ylineheight'] = 'Chiều cao dòng';
$string['a11yfontweight'] = 'Độ đậm chữ';
$string['a11ydarkcontrast'] = 'Độ tương phản tối';
$string['a11ylightcontrast'] = 'Độ tương phản sáng';
$string['a11yhighcontrast'] = 'Độ tương phản cao';
$string['a11yhighsaturation'] = 'Độ bão hòa cao';
$string['a11ylowsaturation'] = 'Độ bão hòa thấp';
$string['a11ymonochrome'] = 'Đơn sắc';
$string['a11ydarkmode'] = 'Chế độ tối';
$string['a11yreadingguide'] = 'Hướng dẫn đọc';
$string['a11ystopanimations'] = 'Dừng hoạt ảnh';
$string['a11ybigcursor'] = 'Con trỏ lớn';
$string['a11yresetall'] = 'Đặt lại tất cả cài đặt trợ năng';

// Settings: Launch Pad tab.
$string['launchpadtab'] = 'Launch Pad';
$string['launchpadheading'] = 'Launch Pad';
$string['launchpadheading_desc'] = 'Biểu tượng thanh điều hướng mở các liên kết lối tắt theo vai trò. Gói mặc định là Quản trị viên trang; thêm các vai trò trang khác khi cần. Các gói khớp được hợp nhất và loại trùng theo URL. Biểu tượng bị ẩn khi Launch Pad tắt hoặc người dùng hiện tại không có liên kết.';
$string['enablelaunchpad'] = 'Bật Launch Pad';
$string['enablelaunchpad_desc'] = 'Hiển thị biểu tượng Launch Pad trên thanh điều hướng trên cùng (sau công cụ trợ năng, trước menu người dùng) khi người dùng có ít nhất một liên kết đã cấu hình. Mặc định: Không — bật sau khi thêm liên kết JSON bên dưới.';
$string['launchpadmenu'] = 'Launch pad';
$string['launchpadlinks_help'] = 'Mảng JSON các đối tượng với <code>label</code>, <code>url</code> (đường dẫn tương đối trang như <code>/admin/search.php</code>) và <code>icon</code> tùy chọn (lớp Font Awesome, ví dụ <code>fa-cog</code>). URL bên ngoài bị từ chối trong v1. Example:<br><pre>[
  {"label": "Site administration", "url": "/admin/search.php", "icon": "fa-cog"},
  {"label": "Users", "url": "/admin/user.php", "icon": "fa-user"}
]</pre>';
$string['launchpadlinks_siteadmin'] = 'Liên kết: Quản trị viên trang';
$string['launchpadlinks_siteadmin_desc'] = 'Hiển thị khi người dùng là quản trị viên trang (<code>is_siteadmin()</code>).';
$string['launchpadlinks_manager'] = 'Liên kết: Quản lý';
$string['launchpadlinks_manager_desc'] = 'Cài đặt MVP cũ (được chuyển sang gói vai trò quản lý khi có thể).';
$string['launchpadlinks_authenticated'] = 'Liên kết: Người dùng đã xác thực';
$string['launchpadlinks_authenticated_desc'] = 'Phương án dự phòng cho mọi người dùng đã đăng nhập không phải khách. Hợp nhất sau siteadmin và các gói vai trò.';

$string['launchpadrolelinks'] = 'Gói liên kết theo vai trò';
$string['launchpadrolelinks_desc'] = 'Cấu hình danh sách liên kết JSON. Quản trị viên trang luôn có (mặc định). Dùng Thêm vai trò cho mọi vai trò trang khác. Gói vai trò khớp khi người dùng có vai trò đó trong bất kỳ ngữ cảnh nào. Lưu trữ dùng id vai trò; nhãn hiển thị tên vai trò hiện tại.';
$string['launchpadbuiltinpacks'] = 'Gói có sẵn';
$string['launchpadconfiguredroles'] = 'Gói đã cấu hình';
$string['launchpadaddrole'] = 'Thêm vai trò';
$string['launchpadremoverole'] = 'Xóa';
$string['launchpadchooserole'] = 'Chọn một vai trò…';
$string['launchpadlinks_role'] = 'Liên kết: {$a}';
$string['launchpadrolemissing'] = 'Vai trò #{$a} (thiếu)';
$string['launchpadrolemapinvalid'] = 'Liên kết vai trò Launch Pad phải là đối tượng JSON ánh xạ khóa gói tới mảng liên kết.';

$string['launchpadjsoninvalid'] = 'Liên kết Launch Pad phải là mảng JSON các đối tượng, mỗi đối tượng có label và url không rỗng.';
$string['launchpad_section_global'] = 'Toàn cục';
$string['launchpad_item_appearance'] = 'Giao diện';
$string['launchpad_item_certifications'] = 'Chứng nhận';
$string['launchpad_item_customreports'] = 'Báo cáo tùy chỉnh';
$string['launchpad_item_dynamicrules'] = 'Quy tắc động';
$string['launchpad_item_orgstructure'] = 'Cơ cấu tổ chức';
$string['launchpad_item_programs'] = 'Chương trình';
$string['launchpad_item_users'] = 'Người dùng';
$string['launchpad_item_catalogue'] = 'Danh mục';
$string['launchpad_item_customhomepages'] = 'Trang chủ tùy chỉnh';
$string['launchpad_item_alltenants'] = 'Tất cả tổ chức thuê';
$string['launchpad_item_allusers'] = 'Tất cả người dùng';
$string['launchpad_item_certificates'] = 'Chứng chỉ';
$string['launchpad_item_courses'] = 'Khóa học';
$string['launchpad_item_custompages'] = 'Trang tùy chỉnh';

// Settings: Focus Mode tab (ported from theme_custom course focus).
$string['focusmodetab'] = 'Chế độ tập trung';
$string['focusmodeheading'] = 'Chế độ tập trung';
$string['focusmodeheading_desc'] = 'Điều khiển nổi trên các trang nội dung khóa học, Bảng điều khiển (/my/), Khóa học của tôi (/my/courses.php) và trang chủ tùy chỉnh MuTMS ẩn điều hướng phụ và ngăn kéo, đồng thời mở rộng nội dung chính. Tùy chọn được lưu theo từng khóa học hoặc trang trong trình duyệt (localStorage).';
$string['enablefocusmode'] = 'Bật Chế độ tập trung';
$string['enablefocusmode_desc'] = 'Hiển thị nút Chế độ tập trung (góc dưới bên phải) trên trang chủ khóa học, phần và hoạt động cũng như Bảng điều khiển (/my/), Khóa học của tôi (/my/courses.php) và trang chủ tùy chỉnh MuTMS. Mặc định: Có.';
$string['focusmodeenable'] = 'Chế độ tập trung';
$string['focusmodedisable'] = 'Thoát chế độ tập trung';
$string['focusmodenotice'] = 'Chế độ tập trung đang bật. Nhấp × ở góc dưới bên phải để tắt.';


// Settings: User menu tiles tab.
$string['usermenutab'] = 'Menu người dùng';
$string['usermenuheading'] = 'Ô menu người dùng';
$string['usermenuheading_desc'] = 'Tạo kiểu lại menu hồ sơ thành lưới ô kiểu Launch Pad (cùng đích Boost). Giao diện bảng đã khớp Trợ năng / Launch Pad. Tắt để giữ danh sách liên kết dọc.';
$string['enableusermenutiles'] = 'Bật ô menu người dùng';
$string['enableusermenutiles_desc'] = 'Hiển thị mục menu hồ sơ dưới dạng lưới ô 3 cột với biểu tượng Font Awesome. Mặc định: Có. Đặt Không cho danh sách dọc.';

// Settings: Compact navbar tab.
$string['navbartab'] = 'Thanh điều hướng';
$string['navbarheading'] = 'Thanh điều hướng gọn';
$string['navbarheading_desc'] = 'Thanh trên hơi chặt hơn, gạch chân liên kết đang hoạt động rõ hơn và vùng nhấn biểu tượng tiện ích nhất quán. Logo trang và màu thương hiệu vẫn ở Boost Union → Look (đường đa khách hàng). Bố cục đăng nhập không đổi (chỉ đăng nhập Boost Union).';
$string['enablecompactnavbar'] = 'Bật thanh điều hướng gọn';
$string['enablecompactnavbar_desc'] = 'Áp dụng giao diện thanh điều hướng gọn trên mọi trang trừ đăng nhập. Mặc định: Có. Tắt để dùng chiều cao thanh chuẩn của Boost Union.';

// Settings: My Courses tab (block_myoverview card layout skin).
$string['mycoursestab'] = 'Khóa học của tôi';
$string['mycoursesheading'] = 'Bố cục Khóa học của tôi';
$string['mycoursesheading_desc'] = 'Giao diện lưới thẻ tùy chọn trên trang Khóa học của tôi (/my/courses.php) theo chiều rộng mặc định của Moodle / Boost Union (có thể mở rộng qua Chế độ tập trung). Tạo giao diện cho khối Tổng quan khóa học chuẩn — không thay thế nó. Tìm kiếm, nhóm, sắp xếp và chế độ xem vẫn thuộc Moodle lõi.';
$string['enablemycourseslayout'] = 'Bật bố cục Khóa học của tôi';
$string['enablemycourseslayout_desc'] = 'Hiển thị lưới thẻ đáp ứng (1–3 cột ở chiều rộng mặc định, mở rộng tối đa 5 cột trong Chế độ tập trung) và tạo kiểu lại thẻ (đổ bóng, tiến độ tròn trên ảnh, ngôi sao trên ảnh). Mặc định: Có.';

// Settings: My Courses stats strip.
$string['mycoursesstatsheading'] = 'Thống kê Khóa học của tôi';
$string['mycoursesstatsheading_desc'] = 'Dải thống kê tùy chọn ở đầu Khóa học của tôi (/my/courses.php) cho người dùng hiện tại: Ghi danh, Hoàn thành, Huy hiệu và Chứng chỉ. Mỗi bảng có thể bật độc lập.';
$string['enablemycoursesstats'] = 'Bật thống kê Khóa học của tôi';
$string['enablemycoursesstats_desc'] = 'Hiển thị dải thống kê phía trên tổng quan khóa học trên Khóa học của tôi. Mặc định: Có.';
$string['mycoursesstatsenrolments'] = 'Hiển thị bảng Ghi danh';
$string['mycoursesstatsenrolments_desc'] = 'Số khóa học đang hoạt động (đang học) của người dùng hiện tại. Mặc định: Có.';
$string['mycoursesstatscompletions'] = 'Hiển thị bảng Hoàn thành';
$string['mycoursesstatscompletions_desc'] = 'Số khóa học người dùng hiện tại đã hoàn thành. Mặc định: Có.';
$string['mycoursesstatsbadges'] = 'Hiển thị bảng Huy hiệu';
$string['mycoursesstatsbadges_desc'] = 'Số huy hiệu được trao cho người dùng hiện tại. Mặc định: Có.';
$string['mycoursesstatscertificates'] = 'Hiển thị bảng Chứng chỉ';
$string['mycoursesstatscertificates_desc'] = 'Số chứng chỉ được trao cho người dùng hiện tại (tool_certificate hoặc mod_customcert khi đã cài; nếu không thì 0). Mặc định: Có.';
$string['mycoursesstatsaria'] = 'Thống kê khóa học của tôi';
$string['mycoursesstatsenrolmentstitle'] = 'Ghi danh';
$string['mycoursesstatsenrolmentssub'] = '{$a} Khóa học đang học';
$string['mycoursesstatscompletionstitle'] = 'Hoàn thành';
$string['mycoursesstatscompletionssub'] = '{$a} Khóa học đã hoàn thành';
$string['mycoursesstatsbadgestitle'] = 'Huy hiệu';
$string['mycoursesstatsbadgessub'] = '{$a} Đã trao';
$string['mycoursesstatscertificatestitle'] = 'Chứng chỉ';
$string['mycoursesstatscertificatessub'] = '{$a} Đã trao';

// Settings: Dashboard tab (wider shell + shared Course overview cards on /my/).
$string['dashboardtab'] = 'Bảng điều khiển';
$string['dashboardheading'] = 'Bố cục Bảng điều khiển';
$string['dashboardheading_desc'] = 'Giao diện lưới thẻ Bảng điều khiển và bề mặt khối tùy chọn trên /my/ theo chiều rộng mặc định của Moodle / Boost Union (có thể mở rộng qua Chế độ tập trung), dùng chung giao diện thẻ Tổng quan khóa học với Khóa học của tôi. Bố cục cột (Lịch / Sự kiện sắp tới bên phải) dùng Boost Union Outside (phải) — cấu hình trong Feel → Blocks.';
$string['enabledashboardlayout'] = 'Bật bố cục Bảng điều khiển';
$string['enabledashboardlayout_desc'] = 'Áp dụng cùng giao diện thẻ Tổng quan khóa học như Khóa học của tôi trên Bảng điều khiển (1–3 cột ở chiều rộng mặc định, mở rộng thành 4 cột trong Chế độ tập trung). Đồng thời thống nhất bề mặt khối Timeline / Calendar / Upcoming và làm dịu trạng thái trống cho khớp. Mặc định: Có. Bật Boost Union Outside (phải) riêng cho cột phải.';
$string['dashboardsurfacesnote'] = 'Khi bật bố cục Bảng điều khiển, Everon cũng áp dụng token bề mặt khối dùng chung (viền mềm, bo góc, đổ bóng) và kiểu trạng thái trống Timeline / Upcoming dịu hơn để các khối hỗ trợ khớp thẻ khóa học.';

// Privacy API.
$string['privacy:metadata'] = 'Giao diện Everon không lưu bất kỳ dữ liệu cá nhân nào về bất kỳ người dùng nào. Tùy chọn Trợ năng và Chế độ tập trung chỉ được lưu trong trình duyệt. Liên kết Launch Pad, bố cục Khóa học của tôi, thống kê Khóa học của tôi, bố cục Bảng điều khiển và thanh điều hướng gọn là cài đặt quản trị toàn trang.';
