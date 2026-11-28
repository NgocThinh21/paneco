# 6. Rủi ro, lỗi và việc cần xác minh

Đây là các nhận xét dựa trên source/migrations/routes. Mục “chưa xác minh” nghĩa là cần kiểm tra dữ liệu hoặc chạy thử trên môi trường phù hợp; trong đợt kiểm kê này không chạy test và không thao tác ghi database.

## Ưu tiên cao – có dấu hiệu khiến chức năng không dùng được

| Mã | Vấn đề và bằng chứng | Tác động dễ hiểu | Cách xác minh/định hướng xử lý |
|---|---|---|---|
| P1 | **Quản trị dự án lệch schema.** Migration `projects` có `title`, `scale_value`, `scale_unit`, `thumbnail`; model/controller/form dùng `name`, `scale`, `image`. | Tạo/sửa có thể báo lỗi cột không tồn tại; danh sách có thể trống tên/quy mô dù database có dự án. | Chủ sản phẩm xác nhận cấu trúc dự án mong muốn; kỹ thuật đối chiếu dữ liệu thực tế rồi đồng bộ form, controller, model hoặc migration. Sao lưu trước mọi thay đổi schema. |
| P1 | **Route name dự án trong Blade sai.** Route group tạo tên `admin.projects.*`, còn view gọi `projects.*`. | Trang dự án có thể lỗi khi tạo URL/nút, ví dụ nút thêm, sửa, xóa, quay lại hoặc redirect. | Đối chiếu từng tên route bằng `route:list`; cập nhật đồng bộ view và controller, sau đó kiểm thử CRUD. |
| P1 | **Quản lý thông tin công ty chưa hoàn chỉnh.** `CompanyInfoController` chỉ có `index/update`; resource đăng ký thêm create/store/show/edit/destroy. View index gần như trống; create/edit lại có form dự án. | Menu/thao tác thông tin công ty không cung cấp quy trình chỉnh sửa hợp lệ; URL resource khác có thể gọi method không tồn tại. | Xác định nghiệp vụ có cần một bản ghi công ty duy nhất hay nhiều bản ghi; sau đó thiết kế form và route đúng nghiệp vụ. |
| P1 | **Form liên hệ chưa ghi nhận thông tin.** Form nằm trong HTML comment, không có route POST/controller. | Khách không thể gửi yêu cầu vào bảng `contacts` qua website như nội dung trang gợi ý. | Xác nhận ai nhận yêu cầu và cách xử lý/đồng ý quyền riêng tư; triển khai và kiểm thử một luồng gửi/lưu/hiển thị. |

## Ưu tiên vừa – nội dung hoặc điều hướng không khớp

| Mã | Vấn đề và bằng chứng | Tác động |
|---|---|---|
| P2 | **Trang chủ chưa dùng dữ liệu dự án/công ty đã truy vấn.** Controller truyền `$featuredProjects` và `$info`; view hoạt động vẫn dùng thẻ dự án/nội dung công ty tĩnh. | Sửa dữ liệu trong database có thể không đổi nội dung người xem thấy; dự án hiện trên trang có thể khác dự án quản trị. |
| P2 | **Banner có thể không hiện ảnh nền.** Cú pháp CSS trong khu vực hero có chuỗi `{ storage/app/public/banners/$hero->image }`, không phải URL CSS hợp lệ. | Tiêu đề banner có thể hiện nhưng ảnh nền không tải; cần xác nhận trên browser và xem log console. |
| P2 | **Một số liên kết admin trỏ nơi không tồn tại.** `/admin/company-info` khác route thật `/admin/info`; `/admin/dashboard`, `/admin/services`, `/admin/recruitments`, `/admin/news`, `/admin/partners`, `/admin/contacts` không có route trong `web.php`. | Người quản trị bấm menu có thể gặp trang 404. |
| P2 | **Tuyển dụng, tin tức, đối tác bị comment.** Có bảng/model nhưng không có controller/route và đoạn nội dung public hiện bị comment. | Dữ liệu bảng (nếu có) không tự xuất hiện trên website và không có màn hình chỉnh sửa. |
| P2 | **Dashboard là bản demo.** `admin/dashboard.blade.php` có dữ liệu mẫu và thao tác JavaScript phía trình duyệt, nhưng không được route/controller phục vụ; thao tác demo không ghi database. | Không nên dùng dashboard này để báo cáo số liệu hay vận hành dữ liệu thật. |
| P2 | **Nhiều Model để trống.** Contact, CoreValue, Employee, News, Office, Partner, Recruitment, Service, Software chỉ kế thừa Model. | Có bảng không đồng nghĩa đã có nghiệp vụ đọc/ghi hoặc giao diện. |
| P2 | **Bộ test chỉ là ví dụ khởi tạo.** Feature test chỉ yêu cầu trang `/` trả HTTP 200; unit test chỉ khẳng định `true`. Không có test cho đăng nhập, phân quyền, CRUD hay database nghiệp vụ. | Những lỗi nêu trong tài liệu có thể chưa được test tự động phát hiện. Trong đợt kiểm kê này không chạy test. |

## Bảo mật và vận hành

| Hạng mục | Đã thấy trong source | Còn cần xác minh |
|---|---|---|
| Đăng nhập | Dùng Laravel Auth, password cast dạng hashed ở User; session được regenerate khi login; đăng xuất invalidate session; route login có throttle; biểu mẫu dùng CSRF. | Tài khoản thực tế có tồn tại/đã đặt mật khẩu chưa; session driver và HTTPS cookie trên môi trường triển khai; hành vi sau nhiều lần đăng nhập sai. Không xem nội dung bảng `users` trong đợt này. |
| Phân quyền | Middleware `auth` chặn khách khỏi nhóm admin. | Không thấy role/policy/permission. Mọi user đăng nhập đều có thể vào toàn bộ route admin hiện khai báo. |
| Khôi phục mật khẩu | Có bảng `password_reset_tokens`. | Không có route/controller/form gửi hoặc xác nhận reset; email config/delivery chưa xác minh. |
| Tài khoản | Seeder tạo/cập nhật một tài khoản khi đủ cấu hình `ADMIN_*`; không tạo mật khẩu mặc định. | Không có màn hình quản lý user; đảm bảo `.env` production có mật khẩu mạnh, không chia sẻ/commit. Seeder dùng `updateOrCreate`, do đó chạy lại với cùng email sẽ cập nhật tên/mật khẩu theo biến cấu hình. |
| Upload banner | Validation có `image` và giới hạn 5120 KB; lưu vào public disk; khi cập nhật/xóa có thao tác xóa file cũ. | MIME/đuôi file và cấu hình web server/storage link ở môi trường production; sao lưu ảnh cùng backup database. |
| Cấu hình môi trường | `.env.example` có `APP_DEBUG=true`, `APP_KEY` trống và SQLite làm ví dụ. | Đây chỉ là mẫu; không kết luận giá trị runtime. Trước production cần kiểm tra APP_DEBUG tắt, APP_KEY được tạo, kết nối DB đúng, HTTPS và quyền file. |
| Dịch vụ ngoài | Views gọi CDN/font/ảnh bên ngoài. | Website có thể thiếu style/font/ảnh nếu mất mạng hoặc CDN không sẵn có; các request này cũng gửi thông tin kết nối trình duyệt tới bên thứ ba. |

## Thiếu bằng chứng để kết luận

- Số user, banner, dự án và các bản ghi thực có trong database.
- Ảnh banner có thực sự được lưu và public storage link đã được tạo hay chưa.
- Website đang triển khai ở máy local, staging hay production; HTTPS, APP_DEBUG và backup cấu hình ra sao.
- Các liên kết ngoài, CDN, bản đồ và form được nhìn thấy thế nào trong trình duyệt.
- Kiểm thử đăng nhập, CRUD, validation, quyền truy cập và giao diện trên điện thoại.
- Lịch sử Git/commit và lý do nghiệp vụ đằng sau schema hiện tại.

## Thứ tự đề nghị quản lý

1. Sao lưu database và file ảnh trước khi xử lý lỗi dữ liệu.
2. Xác nhận nghiệp vụ dự án và thông tin công ty cần quản lý trên website.
3. Khắc phục đồng bộ route/field của dự án và hoàn thiện form thông tin công ty.
4. Quyết định có bật form liên hệ/tuyển dụng/tin tức/đối tác hay không; chỉ sau đó mới nối database.
5. Xác định vai trò quản trị (nếu cần nhiều mức quyền) và quy trình đặt lại mật khẩu.
6. Thực hiện kiểm thử trên staging với bản sao dữ liệu; sau đó người phụ trách nghiệm thu bằng checklist nghiệp vụ.
