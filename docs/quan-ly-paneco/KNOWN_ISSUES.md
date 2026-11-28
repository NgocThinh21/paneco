# Lỗi và vấn đề đã biết

## Phạm vi hiện tại

Bản hiện tại là website giới thiệu công ty và đội ngũ 23 người, Admin quản lý nội dung công khai. Không có chức năng quản trị nhân sự nội bộ. Các luồng nội dung đã được nối trong code và test tự động; nghiệm thu trình duyệt/hosting vẫn còn.

Việc còn cần xác nhận/nghiệm thu cho bản đầu: nhập dữ liệu thật của 23 người; xác nhận thông tin liên hệ/logo/nội dung công ty; xem website trên trình duyệt ở desktop và điện thoại; quyết định có cần công khai địa chỉ (bảng `company_infos` hiện chưa có cột địa chỉ). Chưa xác minh tài khoản Admin hiện có trên database.

Danh sách đầy đủ, rủi ro bảo mật và điều chưa xác minh: [06-van-de-va-uu-tien.md](06-van-de-va-uu-tien.md).

## Cập nhật sau lượt code 28/11/2026

- Đã thay trang public hiện dùng `/` theo bố cục Paneco gốc và dữ liệu Admin; thêm trang đội ngũ `/doi-ngu`.
- Đã thêm CRUD nội dung theo bảng sẵn có cho dịch vụ, dự án, banner/điểm nổi bật, tin tức, tuyển dụng, đối tác, văn phòng, giá trị và phần mềm; có thư viện ảnh và hộp thư liên hệ.
- Đã sửa model `Project` theo schema migration hiện có; controller cũ không còn là luồng quản trị chính.
- Bộ test: 15/15 pass trên SQLite `:memory:`. Chưa test trình duyệt.
- Dữ liệu demo/ảnh ngoài mẫu sẽ cần được duyệt hoặc thay bởi Paneco trước khi công khai.

## Ưu tiên cần xử lý trong kế hoạch

1. Quản trị dự án: schema, model/controller/form lệch tên trường; Blade gọi route name sai.
2. Thông tin công ty: thiếu handler của nhiều route resource, view hiện chưa có form phù hợp.
3. Liên hệ: form chưa nối tới route/controller/database.
4. Homepage: dự án/công ty vẫn chủ yếu là nội dung tĩnh dù controller truy vấn dữ liệu; ảnh nền banner có CSS đáng ngờ.
5. Menu Admin có liên kết tới route không tồn tại hoặc sai URL.
6. Thiếu quản lý roles/permissions; tài khoản đã xác thực chưa được phân cấp.
7. Các bảng dịch vụ, phần mềm, nhân viên, văn phòng, giá trị cốt lõi, tuyển dụng, tin và đối tác chưa có CRUD đầy đủ.
8. Test hiện chỉ là ví dụ khởi tạo, chưa bao phủ nghiệp vụ.

Không có mục nào được đánh dấu “đã khắc phục” nếu chưa có thay đổi code được duyệt và kiểm tra tương ứng.
