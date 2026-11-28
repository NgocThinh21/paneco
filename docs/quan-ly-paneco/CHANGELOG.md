# Nhật ký thay đổi

Các đợt cập nhật hồ sơ được ghi tại [07-nhat-ky-thay-doi.md](07-nhat-ky-thay-doi.md). Nhật ký này không thay thế Git commit history.

| Ngày | Thay đổi | Trạng thái |
|---|---|---|
| 28/11/2026 | Kiểm kê source và bổ sung kế hoạch kiến trúc/lộ trình 7 giai đoạn vào bộ tài liệu quản lý. | Giai đoạn 1; chỉ thay đổi tài liệu, không sửa code/database. |
| 28/11/2026 | Bổ sung định vị Paneco do chủ dự án cung cấp (đơn vị ở Việt Nam nhận dự án Nhật để triển khai Shop Drawing/bản vẽ chi tiết gia công), yêu cầu website tiếng Việt, và bản đề xuất trình sếp dựa trên cấu trúc nội dung tham khảo NAP-VN. | Chỉ thay đổi tài liệu. Website tham khảo dùng cho ý tưởng phân cấp nội dung; không lấy nội dung hay tài sản của họ làm dữ liệu Paneco. Chưa bắt đầu Giai đoạn 2. |
| 28/11/2026 | Thu gọn bản đầu theo yêu cầu chủ dự án: trang giới thiệu công ty và đội ngũ 23 người; nối homepage/Admin vào `company_infos` và `employees`; thêm test chức năng. | Dùng lại schema hiện có, không chạy migration hoặc ghi dữ liệu thật. Tạo checkpoint file trước khi sửa. Test SQLite in-memory: 10/10 pass. Kiểm tra responsive bằng trình duyệt còn chờ nghiệm thu. |
| 28/11/2026 | Điều chỉnh theo đúng trang chủ Paneco gốc và phạm vi website doanh nghiệp: thêm trang `/doi-ngu`; Admin nội dung cho banner/điểm nổi bật, dịch vụ, dự án, media, tin, tuyển dụng, đối tác, văn phòng và hộp thư liên hệ; dùng ảnh/nội dung demo có nhãn. | Tái sử dụng bảng hiện có, sửa model dự án theo migration; không chạy migration, không thay `.env`, không ghi database thật. Tạo checkpoint `paneco-homepage-rebuild-20261128`. 15/15 test (100 assertions) pass trên SQLite in-memory. Chưa nghiệm thu trình duyệt. |

Khi triển khai sau này, ghi rõ yêu cầu, quyết định nghiệp vụ, file/bảng bị ảnh hưởng, backup/checkpoint, kiểm thử và người nghiệm thu. Không ghi bí mật hoặc thông tin cá nhân khách hàng.
