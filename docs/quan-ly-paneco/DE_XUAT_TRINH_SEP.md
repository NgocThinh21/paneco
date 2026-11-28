# Đề xuất website giới thiệu doanh nghiệp Paneco

> **Cập nhật theo yêu cầu chủ dự án ngày 28/11/2026:** Đây là website giới thiệu doanh nghiệp, có trang đội ngũ gồm 23 thành viên. Admin quản lý nội dung website gồm thông tin công ty/trang chủ, giới thiệu/đội ngũ, dịch vụ, dự án, hình ảnh, tin tức, tuyển dụng, khách hàng/đối tác và liên hệ. Không xây hệ thống nhân sự nội bộ (chấm công, lương, hồ sơ lao động). Phạm vi và trạng thái code chi tiết tại [PHAM_VI_BAN_DAU.md](PHAM_VI_BAN_DAU.md); phần mô tả rộng bên dưới phải hiểu theo cập nhật này.

## Mục tiêu

Paneco cần website tiếng Việt giới thiệu doanh nghiệp tại Việt Nam, đội ngũ 23 thành viên và dịch vụ bản vẽ Shop Drawing/bản vẽ chi tiết gia công cho dự án Nhật Bản. Website giúp khách hiểu công ty làm gì, xem nội dung được phép công bố và liên hệ.

## Cấu trúc và Admin

Website có trang chủ, giới thiệu công ty/đội ngũ, dịch vụ, dự án, hình ảnh, tin tức, tuyển dụng, khách hàng/đối tác và liên hệ. Admin quản lý các nội dung công khai này. Đây không phải hệ thống nhân sự nội bộ; không có chấm công, lương hay quản trị lao động.

## Dữ liệu minh họa

Có thể dùng ảnh kỹ thuật và dữ liệu demo phù hợp để sếp xem bố cục. Mục minh họa cần có nhãn và sẽ được thay bằng dữ liệu chính thức trong Admin trước khi công bố. Không biến dữ liệu demo thành thành tích/khách hàng/dự án thật của Paneco.

## Tình trạng và bước tiếp theo

Trang chủ theo bố cục navy/vàng của trang Paneco gốc, trang đội ngũ, Admin nội dung và form liên hệ đã có code. 15/15 test (100 assertions) pass trên SQLite `:memory:`; chưa nghiệm thu trình duyệt/hosting. Sếp xem bản demo, Paneco nhập dữ liệu thật và ảnh 23 thành viên, sau đó kiểm tra desktop/điện thoại trước khi phát hành. Không chạy migration hoặc thay đổi database thật trong lượt này.
