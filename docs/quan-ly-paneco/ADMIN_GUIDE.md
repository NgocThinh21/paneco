# Hướng dẫn Admin (trạng thái hiện tại)

Admin dùng để cập nhật nội dung website Paneco, không phải hệ thống quản lý nhân sự nội bộ. Paneco có 23 thành viên; hồ sơ thành viên được đăng ở mục giới thiệu đội ngũ, không có chấm công, tính lương hay quản lý lao động.

## Các màn hình Admin hiện có trong code

- Thông tin công ty và trang chủ.
- Giới thiệu công ty, đội ngũ 23 thành viên.
- Dịch vụ, dự án, hình ảnh/media.
- Tin tức, tuyển dụng.
- Khách hàng, đối tác.
- Thông tin liên hệ và yêu cầu liên hệ.

Sau khi đăng nhập, menu quản trị có các mục sau:

- `/admin/info`: thông tin công ty, lời giới thiệu, logo và ảnh.
- `/admin/content/banners`, `/admin/content/highlights`, `/admin/content/values`: nội dung trang chủ/giới thiệu.
- `/admin/employees`: hồ sơ công khai 23 thành viên; hệ thống không cho tạo hồ sơ thứ 24.
- `/admin/content/services`, `/admin/content/projects`, `/admin/content/news`, `/admin/content/recruitments`, `/admin/content/partners`, `/admin/content/offices`, `/admin/content/softwares`: nội dung tương ứng.
- `/admin/media`: thư viện ảnh dùng chung cho bộ sưu tập; ảnh từng nội dung có thể tải ngay ở form của mục đó.
- `/admin/contacts`: yêu cầu khách gửi từ website; có thể đánh dấu đã xem.

Các màn hình dùng chung một mẫu nhập liệu. Ảnh/nội dung demo có thể thay bằng dữ liệu chính thức. Hãy kiểm tra quyền sử dụng ảnh và quyền công bố tên khách hàng/dự án trước khi đưa website lên công khai.

## Đăng nhập

Mở `/login`, dùng tài khoản đã được tạo, rồi đăng xuất bằng nút trên thanh Admin. Không có tài khoản/mật khẩu mặc định được xác nhận trong tài liệu. Không gửi mật khẩu hoặc thông tin bí mật vào tài liệu quản lý. Hiện tại mọi tài khoản đăng nhập đều vào được các màn hình Admin; chưa chia vai trò/quyền khác nhau.

## Những điểm cần nghiệm thu

Test tự động hiện đạt 15/15 trên SQLite tạm. Chưa xác nhận trực tiếp giao diện trên trình duyệt/hosting. Cần thử thao tác lưu từng loại nội dung rồi kiểm tra nó xuất hiện đúng trên `/`, `/doi-ngu` hoặc hộp thư Admin. Dữ liệu demo và ảnh minh họa phải được thay/duyệt trước khi công bố.
