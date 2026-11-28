# Luồng nghiệp vụ

Sơ đồ chi tiết: [03-luong-nghiep-vu.md](03-luong-nghiep-vu.md).

Các luồng đã thấy trong code:

1. Khách mở `/` → controller đọc banner, điểm nổi bật, thông tin công ty và dự án → trả Blade. Một số dữ liệu lấy ra nhưng chưa được view dùng.
2. Quản trị viên mở `/login` → gửi email/mật khẩu → Laravel xác thực → session mới → vào trang admin đích.
3. Quản trị viên quản lý Banner/điểm nổi bật → validation → model ghi database → trang chủ chọn nội dung active.
4. Đăng xuất → xóa xác thực, hủy session và token.

Các luồng dự kiến nhưng chưa hoàn chỉnh: dự án, thông tin công ty, liên hệ, tin, tuyển dụng, đối tác, media, menu, SEO và quản lý tài khoản/role. Không có bằng chứng form liên hệ hiện tại lưu thông tin khách hàng.
