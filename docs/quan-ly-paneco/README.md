# Hướng dẫn quản lý hệ thống Paneco

> **Phạm vi hiện tại:** website tiếng Việt giới thiệu Paneco và 23 thành viên; Admin quản lý nội dung website gồm thông tin công ty/trang chủ, dịch vụ, dự án, hình ảnh, tin tức, tuyển dụng, đối tác/khách hàng và liên hệ. Không có hệ thống nhân sự nội bộ. Trạng thái thực tế: [PHAM_VI_BAN_DAU.md](PHAM_VI_BAN_DAU.md).

Tài liệu này mô tả **trạng thái đọc được từ mã nguồn tại ngày 28/11/2026**. Mục đích là giúp người quản lý hiểu hệ thống đang có gì, phần nào đang vận hành theo code, phần nào chưa được nối và cần kiểm tra gì tiếp theo.

## Bộ tài liệu quản lý (tên file dùng để trao đổi trong dự án)

Các file dưới đây là điểm vào ngắn gọn; phân tích chi tiết bằng tiếng Việt nằm trong tài liệu đánh số bên dưới.

- [SYSTEM_OVERVIEW.md](SYSTEM_OVERVIEW.md) — tổng quan và kiến trúc.
- [FEATURES.md](FEATURES.md) — chức năng và trạng thái.
- [BUSINESS_FLOWS.md](BUSINESS_FLOWS.md) — luồng nghiệp vụ.
- [DATABASE.md](DATABASE.md) — database.
- [ADMIN_GUIDE.md](ADMIN_GUIDE.md) — hướng dẫn Admin theo trạng thái hiện tại.
- [CHANGELOG.md](CHANGELOG.md) — nhật ký thay đổi.
- [DEVELOPMENT_ROADMAP.md](DEVELOPMENT_ROADMAP.md) — kế hoạch 7 giai đoạn và cổng phê duyệt.
- [KNOWN_ISSUES.md](KNOWN_ISSUES.md) — lỗi/rủi ro đã thấy và việc cần xác minh.
- [DE_XUAT_TRINH_SEP.md](DE_XUAT_TRINH_SEP.md) — bản đề xuất ngắn để trình sếp duyệt trước khi triển khai.

## Phân tích chi tiết

1. [Tổng quan và sơ đồ hệ thống](01-tong-quan.md)
2. [Danh mục chức năng và trạng thái](02-danh-muc-chuc-nang.md)
3. [Các luồng nghiệp vụ](03-luong-nghiep-vu.md)
4. [Database và ý nghĩa các bảng](04-database.md)
5. [Chức năng liên kết với file code](05-ban-do-code.md)
6. [Rủi ro, lỗi và việc cần xác minh](06-van-de-va-uu-tien.md)
7. [Nhật ký tài liệu](07-nhat-ky-thay-doi.md)

> **Tiến độ:** Đã có code cho trang giới thiệu, trang đội ngũ và các màn hình Admin nội dung dùng schema sẵn có. 15/15 test tự động pass trên SQLite tạm. Nghiệm thu trình duyệt, dữ liệu chính thức và vận hành hosting còn chờ.

## Cách hiểu nhãn trạng thái

- **Có xử lý trong code**: đã thấy route, controller và/hoặc view xử lý; chưa đồng nghĩa đã kiểm thử ngoài trình duyệt.
- **Một phần**: có một số mắt xích nhưng người dùng chưa thể hoàn thành toàn bộ quy trình.
- **Tĩnh/chưa nối**: nội dung được viết trực tiếp trong HTML hoặc form không gửi dữ liệu tới Laravel.
- **Có dấu hiệu lỗi**: thấy mâu thuẫn cụ thể trong route, controller, view hoặc cấu trúc bảng.
- **Chưa xác minh**: cần xem dữ liệu thực tế, cấu hình môi trường hoặc thao tác trên trình duyệt để kết luận.

## Phạm vi và giới hạn

Đã kiểm kê các file trong `routes`, `app`, `resources/views`, `database/migrations`, model, cấu hình, route và trạng thái migration. Không đọc giá trị bí mật trong `.env`, không chạy migration và không ghi vào database thật. Code thay đổi cùng lượt cập nhật ngày 28/11/2026; test chạy trên SQLite `:memory:`.

Vì vậy tài liệu mô tả **code và cấu trúc được khai báo**, không khẳng định dữ liệu thực tế đang đầy đủ hoặc website đã được kiểm thử và hoạt động trên môi trường người dùng.
