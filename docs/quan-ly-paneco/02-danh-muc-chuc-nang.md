# 2. Danh mục chức năng

“Có xử lý” nghĩa là có đường đi trong code; chưa có nghĩa là đã chạy thử thành công trên website.

| Nhóm | Chức năng | Trạng thái | Bằng chứng / ghi chú |
|---|---|---|---|
| Website | Mở trang chủ | Có xử lý trong code, chưa xác minh giao diện | `GET /` gọi `HomeController@index`, trả `welcome`. |
| Website | Hiển thị banner đang hoạt động | Một phần / có dấu hiệu lỗi | Controller lấy banner active và view dùng banner đầu tiên; chuỗi CSS nền ảnh trong `welcome.blade.php` không phải cú pháp URL hợp lệ. |
| Website | Hiển thị các điểm nổi bật | Có xử lý trong code, chưa xác minh | Controller lấy `hero_highlights` active; view lặp qua kết quả. |
| Website | Giới thiệu công ty | Tĩnh / chưa nối | Phần nội dung chính được ghi trực tiếp trong Blade; biến `$info` có mặt nhưng vị trí dùng dữ liệu công ty trong bản đang kiểm tra nằm trong iframe đã comment. |
| Website | Dịch vụ và phần mềm | Tĩnh / chưa nối | Nội dung trong `welcome.blade.php`; không thấy controller lấy `services` hoặc `softwares`. |
| Website | Danh sách dự án | Tĩnh / không nối dữ liệu đang truy vấn | `HomeController` có truy vấn dự án nổi bật, nhưng view không dùng `$featuredProjects`; các thẻ dự án là HTML tĩnh. |
| Website | Tuyển dụng và tin tức | Chưa hiển thị như luồng động | Các khu vực tương ứng bị comment trong Blade; không có route/controller public để lấy bảng `recruitments` hoặc `news`. |
| Website | Đối tác | Chưa hiển thị như luồng động | Có bảng/model nhưng không thấy route/controller quản trị hoặc truy vấn trang chủ. |
| Website | Form liên hệ | Chưa nối | Form nhìn thấy trong source nằm trong HTML comment; không có POST route tiếp nhận liên hệ. Bảng `contacts` chưa có luồng ghi nhận. |
| Website | Địa chỉ/bản đồ/footer | Tĩnh | Text, số liên hệ và iframe bản đồ đang được ghi trực tiếp trong Blade. |
| Tài khoản | Xem form đăng nhập | Có route/code | `GET /login`; trang Blade `login/login`. |
| Tài khoản | Đăng nhập email/mật khẩu | Có xử lý trong code, chưa kiểm thử | `POST /login`; Laravel `Auth::attempt`; kiểm tra đầu vào; tạo lại session khi thành công. |
| Tài khoản | Ghi nhớ đăng nhập | Có xử lý trong code, chưa kiểm thử | Checkbox `remember` được gửi đến `Auth::attempt`. |
| Tài khoản | Giới hạn thử đăng nhập | Có cấu hình route | `throttle:5,1` trên `POST /login`; chưa xác minh hành vi giới hạn trong thực tế. |
| Tài khoản | Đăng xuất | Có xử lý trong code | `POST /logout`, xóa xác thực và vô hiệu hóa session/token. |
| Tài khoản | Quên/đặt lại mật khẩu | Chưa hoàn thiện | Không có route/view/controller khôi phục mật khẩu; bảng token chỉ được tạo trong migration. |
| Quản trị | Bảo vệ `/admin` bằng đăng nhập | Có middleware trong code | Nhóm route quản trị gắn middleware `auth`; chưa có phân quyền theo vai trò. |
| Quản trị banner | Liệt kê/thêm/sửa/xóa và tải ảnh | Có xử lý trong code, chưa kiểm thử | `BannerController`, Blade quản trị, `banners`; ảnh lưu ở public disk. Việc ảnh lên trang chủ có dấu hiệu lỗi riêng. |
| Quản trị điểm nổi bật | Liệt kê/thêm/sửa/xóa/bật tắt | Có xử lý trong code, chưa kiểm thử | `HeroHighlightController`, Blade và `hero_highlights`; trang chủ lọc `is_active`. |
| Quản trị dự án | Danh sách/thêm/sửa/xóa | Có dấu hiệu lỗi rõ | Field của controller/model khác migration; view dùng route `projects.*` trong khi tên đăng ký là `admin.projects.*`. Xem [vấn đề](06-van-de-va-uu-tien.md). |
| Quản trị công ty | Xem/cập nhật thông tin công ty | Một phần / chưa hoàn thiện | Controller có `index` và `update`; view index không có form; `create/store/show/edit/destroy` trong resource không có phương thức controller tương ứng. |
| Quản trị dịch vụ/phần mềm | Thêm/sửa/xóa | Chưa có luồng quản trị | Có migration/model nhưng không có route/controller/view tương ứng. |
| Quản trị tuyển dụng/tin/đối tác | Thêm/sửa/xóa | Chưa có luồng quản trị | Có migration/model; thiếu controller/route/view. |
| Quản trị nhân viên/văn phòng/giá trị cốt lõi/liên hệ | Quản lý nội dung | Chưa có luồng quản trị | Có bảng/model nhưng model để trống, không có controller/route/view quản trị. |
| Tổng quan admin | Dashboard thống kê và thao tác | Bản demo chưa nối | `admin/dashboard.blade.php` có nội dung HTML demo nhưng không có route/controller phục vụ nó. Các thao tác demo chạy JavaScript trên trình duyệt, không lưu database. |

## Chức năng trên thanh menu quản trị

Trong layout, menu hiện có các liên kết Banner, Iconic/điểm nổi bật, Thông tin công ty, Dự án, Dịch vụ, Tuyển dụng, Tin tức, Đối tác và Liên hệ. Một số đích không có route: `/admin/company-info` khác với route thực tế `/admin/info`; các mục dịch vụ/tuyển dụng/tin/đối tác/liên hệ không được khai báo. Link Dashboard cũng trỏ `/admin/dashboard` nhưng không có route đó. Vì vậy menu không đồng nghĩa các chức năng này đã tồn tại.
