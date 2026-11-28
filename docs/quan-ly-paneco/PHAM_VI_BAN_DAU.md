# Phạm vi website Paneco

## Mục tiêu

Xây dựng website giới thiệu doanh nghiệp Paneco bằng tiếng Việt. Paneco có 23 thành viên; website giới thiệu đội ngũ này như nội dung công khai. Đây **không** phải hệ thống quản lý nhân sự nội bộ: không chấm công, tính lương, quản lý hồ sơ lao động hay vận hành nhân sự.

Admin là công cụ quản lý nội dung website. Phạm vi mong muốn gồm:

1. Thông tin công ty.
2. Nội dung trang chủ.
3. Giới thiệu công ty và đội ngũ 23 thành viên.
4. Dịch vụ và dự án.
5. Hình ảnh/media.
6. Tin tức.
7. Tuyển dụng.
8. Khách hàng và đối tác.
9. Thông tin liên hệ và yêu cầu liên hệ.

Các mục trên mô tả phạm vi sản phẩm cần hướng tới; không có nghĩa toàn bộ đã được lập trình. Mỗi chức năng cần được kiểm tra theo trạng thái trong bảng dưới đây.

## Phân loại chức năng theo bằng chứng hiện có

| Nhóm nội dung | Đã thấy trong source hiện tại | Trạng thái thực tế |
|---|---|---|
| Trang giới thiệu công khai | Trang chủ theo phong cách bố cục xanh navy/vàng của trang gốc; đọc dữ liệu nội dung từ các bảng hiện có | Đã nối code; cần nghiệm thu trình duyệt và nội dung thật |
| Thông tin công ty | `/admin/info`; lưu nội dung và ảnh vào `company_infos` | Đã nối code; cần nghiệm thu trên môi trường chạy thật |
| Đội ngũ 23 thành viên | `/doi-ngu` và `/admin/employees`; quản lý tên, chức danh, ảnh, thứ tự, trạng thái; chặn thêm quá 23 hồ sơ | Đã có code và test; cần nhập 23 hồ sơ được duyệt |
| Nội dung trang chủ | Admin banner, điểm nổi bật, giá trị công ty; nội dung fallback được ghi rõ là minh họa | Đã nối code; cần duyệt nội dung và xem trực tiếp |
| Dịch vụ | CRUD tại `/admin/content/services`; website hiển thị dịch vụ | Đã có code trên bảng `services`; cần nghiệm thu nội dung |
| Dự án | CRUD tại `/admin/content/projects`; dùng đúng cột `title`, `slug`, `scale_value`, `thumbnail`... của bảng `projects` | Đã sửa lệch model/controller cũ và có test; cần nhập dự án được phép công bố |
| Media/thư viện hình ảnh | `/admin/media` quản lý ảnh trong `storage/app/public/gallery`; các mục banner/dự án/tin/đội ngũ có upload riêng | Đã có code; chưa kiểm tra trình duyệt/hosting thực tế |
| Tin tức | CRUD tại `/admin/content/news`; website hiển thị bài đã bật và đến ngày đăng | Đã có code trên bảng `news`; cần nghiệm thu |
| Tuyển dụng | CRUD tại `/admin/content/recruitments`; website chỉ hiện tin tuyển đang bật, chưa hết hạn | Đã có code trên bảng `recruitments`; cần nghiệm thu |
| Khách hàng/đối tác | CRUD tại `/admin/content/partners`; logo/website là tùy chọn | Đã có code trên bảng `partners`; chỉ nhập đối tác được phép công khai |
| Liên hệ | Form công khai lưu vào `contacts`; Admin xem hộp thư và đánh dấu đã xem | Đã có code và test; cần xác định người tiếp nhận/vận hành |
| Đăng nhập Admin | Dùng luồng đăng nhập Laravel hiện có; khu vực Admin yêu cầu đăng nhập | Đã có code và test tự động; quyền chi tiết chưa có |

“Đã nối code” không đồng nghĩa đã được chủ dự án nghiệm thu trên trình duyệt hoặc đã có nội dung doanh nghiệp thật. Các thẻ dịch vụ/dự án và 23 ô đội ngũ chưa có dữ liệu hiển thị là **minh họa**, có nhãn rõ ràng; Admin sẽ thay thế bằng nội dung chính thức.

## Quy tắc phạm vi

- Website công khai trình bày thông tin doanh nghiệp và nội dung đã được Paneco duyệt.
- Danh sách 23 người là trang công khai `/doi-ngu`. Quản lý hồ sơ ở đây chỉ nhằm đăng nội dung (tên, chức danh/mô tả, ảnh, thứ tự và trạng thái hiển thị), không quản lý quan hệ lao động.
- Admin cần quản lý các nhóm nội dung nêu trên. Tính năng nào chưa có bằng chứng trong code phải ghi là chưa làm/chưa xác minh, không mô tả như đã hoàn thành.
- Giữ nguyên dự án Laravel và dữ liệu hiện có; không xóa chức năng đang hoạt động.
- Không tự sửa `.env`, không chạy migration hoặc thay đổi database production nếu chưa được cho phép và chưa có backup phục hồi được.
- Dùng tiếng Việt; không lấy nội dung, ảnh, thương hiệu hay dữ liệu khách hàng của website tham khảo làm dữ liệu Paneco.

## Kiến trúc nội dung đề xuất

```text
Website công khai
├── Trang chủ
├── Giới thiệu công ty
│   └── Đội ngũ 23 thành viên
├── Dịch vụ → chi tiết dịch vụ
├── Dự án → chi tiết dự án
├── Hình ảnh
├── Tin tức → chi tiết bài viết
├── Tuyển dụng
├── Khách hàng và đối tác
└── Liên hệ

Admin (đăng nhập)
├── Thông tin công ty và nội dung trang chủ
├── Giới thiệu và đội ngũ
├── Dịch vụ
├── Dự án
├── Hình ảnh/media
├── Tin tức
├── Tuyển dụng
├── Khách hàng và đối tác
└── Thông tin/yêu cầu liên hệ
```

Các mục chi tiết chỉ nên đưa lên menu khi nội dung và luồng quản lý tương ứng đã được triển khai, kiểm thử và có dữ liệu được duyệt. Tài khoản/role nên giới hạn theo mức cần thiết; phân quyền nhiều cấp chưa được xác nhận là yêu cầu bắt buộc.

## Tình trạng triển khai đã ghi nhận

- Trang công khai `/`, trang đội ngũ `/doi-ngu`, Admin các nhóm nội dung và hộp thư liên hệ đã có code.
- Tái sử dụng migrations/bảng hiện có; không tạo migration, không chạy migration, không thay `.env` và không ghi dữ liệu vào database thật trong lượt này.
- Bộ test tự động: **15 test / 15 pass / 100 assertions**, chạy trên SQLite `:memory:`. Không thay cho kiểm tra trình duyệt.
- Cần chủ dự án xem bố cục thực tế trên desktop/điện thoại; xác nhận logo, ảnh, dữ liệu demo và nội dung trước công bố.
- Cần Paneco cung cấp nội dung công ty và hồ sơ/ảnh 23 thành viên được phép công khai.

## Điểm khôi phục

Checkpoint file trước lần thay đổi code đã ghi nhận tại:

`storage/app/private/checkpoints/paneco-homepage-rebuild-20261128/` (trước thay đổi lượt này) và `storage/app/private/checkpoints/paneco-scope-20261128/` (checkpoint lượt code trước).

## Hồ sơ liên quan

Xem `FEATURES.md`, `BUSINESS_FLOWS.md`, `DATABASE.md`, `05-ban-do-code.md`, `ADMIN_GUIDE.md`, `KNOWN_ISSUES.md` và `DEVELOPMENT_ROADMAP.md`. Tài liệu phân tích cũ phản ánh những gì được quan sát trong source ở thời điểm kiểm tra; phạm vi sản phẩm hiện tại được định nghĩa tại file này.
