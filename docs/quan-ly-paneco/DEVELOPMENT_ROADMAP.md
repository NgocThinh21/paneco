# Lộ trình phát triển Paneco

**Phạm vi hiện hành:** Website giới thiệu doanh nghiệp bằng tiếng Việt, gồm thông tin công ty, trang chủ/giới thiệu và đội ngũ 23 thành viên; Admin quản lý các nội dung công khai: dịch vụ, dự án, hình ảnh, tin tức, tuyển dụng, khách hàng/đối tác, liên hệ. Đây không phải hệ thống nhân sự nội bộ. Danh sách trạng thái theo bằng chứng code ở [PHAM_VI_BAN_DAU.md](PHAM_VI_BAN_DAU.md).

**Tình trạng đã ghi nhận:** Trang chủ theo bố cục cũ, trang đội ngũ, Admin các nhóm nội dung, upload ảnh và hộp thư liên hệ đã có code; tái sử dụng bảng hiện có. Test tự động 15/15 pass trên SQLite `:memory:`. Chưa kiểm tra trình duyệt/hosting và chưa nhập dữ liệu thật được duyệt.

## Thứ tự đề xuất

1. Xem trang chủ và trang đội ngũ trên máy tính/điện thoại; góp ý bố cục và màu sắc.
2. Thay dữ liệu minh họa bằng thông tin công ty, ảnh, 23 thành viên và dự án/dịch vụ được Paneco duyệt.
3. Thử từng nhóm Admin lưu nội dung → kiểm tra trên website; kiểm tra upload ảnh và hộp thư liên hệ.
4. Xem xét bảo mật tài khoản Admin, giới hạn quyền truy cập và chính sách lưu thông tin liên hệ.
5. Chỉ sau nghiệm thu mới chuẩn bị triển khai lên hosting; sao lưu trước khi có bất kỳ thay đổi database nào.

Không chạy migration, thay `.env`, hoặc tác động database thật nếu chưa được cho phép và chưa có checkpoint/backup phục hồi được.
