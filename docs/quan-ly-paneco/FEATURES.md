# Danh mục chức năng

Danh mục chi tiết theo trạng thái: [02-danh-muc-chuc-nang.md](02-danh-muc-chuc-nang.md). Bản đồ từng chức năng với route/controller/model/bảng: [05-ban-do-code.md](05-ban-do-code.md).

## Tóm tắt cho chủ dự án

Website mục tiêu sẽ trình bày Paneco bằng tiếng Việt như đơn vị tại Việt Nam tiếp nhận dự án từ Nhật và triển khai bản vẽ Shop Drawing/bản vẽ chi tiết gia công từ tài liệu thiết kế đầu vào. Cấu trúc tham khảo và sitemap đề xuất nằm trong [DE_XUAT_TRINH_SEP.md](DE_XUAT_TRINH_SEP.md); nội dung công ty/dự án phải được Paneco cung cấp hoặc duyệt.

| Nhóm | Hiện trạng |
|---|---|
| Website công khai | Trang chủ có code; banner và điểm nổi bật có đọc database. Nhiều mục giới thiệu/dịch vụ/phần mềm/dự án đang tĩnh; tuyển dụng/tin/đối tác/form liên hệ có phần bị comment. |
| Đăng nhập | Có luồng email/mật khẩu, session, remember, throttle và logout trong source; chưa kiểm thử thực tế. |
| Admin Banner và điểm nổi bật | Có route/controller/form nối database; cần kiểm thử upload, hiển thị và CRUD. |
| Admin Dự án | Có code nhưng tên route và tên cột không khớp; chưa thể xem là hoàn chỉnh. |
| Admin Thông tin công ty | Một phần controller; form/route chưa khép kín. |
| Admin còn lại | Bảng/model có nhưng thiếu luồng quản lý. Dashboard hiện là giao diện demo không lưu database. |
| Vai trò và phân quyền | Chưa có role/policy; chỉ có chặn khách chưa đăng nhập khỏi `/admin`. |

Không đánh dấu chức năng là hoàn tất trước khi có kiểm thử và nghiệm thu nghiệp vụ. Xem [KNOWN_ISSUES.md](KNOWN_ISSUES.md).
