# 7. Nhật ký tài liệu

| Ngày | Nội dung | Ảnh hưởng tới code/database |
|---|---|---|
| 28/11/2026 | Tạo bộ tài liệu quản lý Paneco dựa trên route, controller, model, Blade, migrations, cấu hình và trạng thái migration hiện có. Ghi nhận các phần hoàn chỉnh một phần, thiếu luồng và có dấu hiệu không khớp. | Chỉ tạo/sửa tài liệu Markdown trong `docs/quan-ly-paneco/`. Không sửa code, không xóa file, không chạy migration và không thay đổi database. |
| 28/11/2026 | Hoàn thành kiểm kê Giai đoạn 1; bổ sung kiến trúc đề xuất, phụ thuộc giữa các giai đoạn, cổng phê duyệt, điểm khôi phục bắt buộc trước thay đổi lớn, câu hỏi nghiệp vụ và bộ tài liệu tên chuẩn. | Chỉ cập nhật Markdown. Giai đoạn 2–7 chưa bắt đầu; chờ chủ dự án phê duyệt. |
| 28/11/2026 | Chủ dự án xác nhận Paneco nhận dự án từ Nhật tại Việt Nam để triển khai Shop Drawing/bản vẽ chi tiết gia công, yêu cầu website tiếng Việt và tham khảo bố cục NAP-VN. Tạo bản đề xuất ngắn để trình sếp duyệt. | Chỉ cập nhật Markdown; không lấy thông tin/ảnh/thành tích NAP-VN làm dữ liệu Paneco. Giai đoạn 2–7 vẫn chờ phê duyệt. |
| 28/11/2026 | Chủ dự án thu gọn website về thông tin công ty và 23 thành viên, yêu cầu triển khai. Nối trang chủ và Admin vào bảng hiện có; thêm quản lý hồ sơ thành viên, upload ảnh và kiểm thử. | Sao lưu file nguồn vào private checkpoint. Không chạy migration, không thay đổi database production, không nhập dữ liệu giả. Toàn bộ 10 test hiện có pass trên SQLite in-memory. Chưa nghiệm thu bằng trình duyệt. |
| 28/11/2026 | Chủ dự án làm rõ đây là website giới thiệu doanh nghiệp; Admin quản lý các nội dung công khai, không quản lý nội bộ nhân sự. Thay trang chủ public theo bố cục gốc, thêm trang đội ngũ 23 thành viên, CRUD các nhóm nội dung và hộp thư liên hệ. Nội dung/hình demo được ghi nhãn để thay trong Admin. | Tạo checkpoint private `paneco-homepage-rebuild-20261128`; không thay `.env`, không chạy migration, không ghi database thật. 15/15 test (100 assertions) pass trên SQLite in-memory; chưa nghiệm thu trình duyệt/hosting. |

## Quy ước cập nhật nhật ký sau này

Mỗi lần phát hành hoặc sửa nghiệp vụ, ghi ngày, mục tiêu, các màn hình/bảng bị ảnh hưởng, người xác nhận nghiệp vụ và kết quả kiểm tra. Không ghi mật khẩu, token, thông tin kết nối bí mật hoặc nội dung cá nhân của khách hàng vào tài liệu.

## Ghi chú về lịch sử trước thời điểm kiểm kê

Tài liệu này mô tả trạng thái source quan sát được, không suy đoán ai đã thay đổi file hoặc thay đổi vào ngày nào. Muốn biết chính xác lịch sử code cần xem Git commit/log và so sánh với bản triển khai; việc đó không nằm trong phạm vi tài liệu hiện tại.
