# 5. Bản đồ chức năng với file code

Đường dẫn bên dưới tính từ thư mục `paneco/`.

| Chức năng | Giao diện | Route | Controller | Model | Bảng / lưu trữ | Ảnh hưởng khi sửa |
|---|---|---|---|---|---|---|
| Trang chủ | `resources/views/welcome.blade.php`, `layouts/header.blade.php`, `layouts/footer.blade.php` | `GET /` | `HomeController@index` | `CompanyInfo`, `Banner`, `Project`, `HeroHighlight` | `company_infos`, `banners`, `projects`, `hero_highlights` | Banner/highlight ảnh hưởng trực tiếp trang đầu. Nội dung dịch vụ, phần mềm, dự án tĩnh sửa trong Blade. Header/footer ảnh hưởng tất cả trang dùng include. |
| Đăng nhập | `resources/views/login/login.blade.php` | `GET /login`, `POST /login` | `Auth/LoginController@create/store` | `User` và Laravel Auth | `users`, `sessions` | Thay route/controller/view có thể làm toàn bộ đăng nhập admin hỏng; đổi cấu hình session ảnh hưởng phiên đăng nhập. |
| Đăng xuất | Nút trong `resources/views/layouts/admin.blade.php` | `POST /logout` | `Auth/LoginController@destroy` | Laravel Auth | `sessions` | Layout admin dùng chung; thay đổi ảnh hưởng tất cả trang quản trị. |
| Khung admin/menu | `resources/views/layouts/admin.blade.php` | Các route `/admin/*` | Không xử lý dữ liệu riêng | Không | Không | Link menu hiện có vài URL không được khai báo. Khung cũng hiển thị tên người dùng và nút đăng xuất. |
| Banner | `resources/views/admin/banners/index.blade.php` | `admin.banners.index/store/edit/update/destroy` dưới `/admin/banners` | `Admin/BannerController` | `Banner` | `banners`; file ảnh trong public disk, thư mục `banners` | Đổi tên field cần đồng bộ migration, `$fillable`, controller, form và view website. Xóa/sửa ảnh ảnh hưởng file trên public storage. |
| Điểm nổi bật | `resources/views/admin/hero_highlights/index.blade.php` | `admin.hero-highlights.index/store/edit/update/destroy` | `Admin/HeroHighlightController` | `HeroHighlight` | `hero_highlights` | Đổi `icon/title/subtitle/is_active` cần đồng bộ form, controller, migration và phần render trên trang chủ. |
| Dự án | `resources/views/admin/projects/{index,create,edit}.blade.php` | `admin.projects.*` dưới `/admin/projects` | `Admin/ProjectController` | `Project` | `projects` | Đang có mâu thuẫn cột và route name; mọi sửa đổi cần đồng thời xem migration, controller, model, form và truy vấn trang chủ. |
| Thông tin công ty | `resources/views/admin/info/{index,create,edit}.blade.php` | `admin.info.*` dưới `/admin/info` | `Admin/CompanyInfoController` | `CompanyInfo` | `company_infos` | View index hiện trống; create/edit là form dự án sai nghiệp vụ; controller mới có index/update. Đổi cột ảnh hưởng bảng và public content nếu sau này được nối. |
| Dịch vụ | Không có view quản trị; trang chủ có HTML tĩnh | Không có route riêng | Không có controller | `Service` (rỗng) | `services` | Thay nội dung đang thấy phải chỉnh Blade; muốn quản trị động sẽ cần thiết kế đủ chuỗi từ dữ liệu tới giao diện. |
| Phần mềm | Không có view quản trị; trang chủ có HTML tĩnh | Không có route riêng | Không có controller | `Software` (rỗng) | `softwares` | Tương tự dịch vụ; bảng/model hiện chưa được gọi trong luồng trang. |
| Giá trị cốt lõi | Nội dung tĩnh/comment; điểm nổi bật đang dùng view khác | Không có route riêng | Không có controller | `CoreValue` (rỗng) | `core_values` | Không nhầm với `hero_highlights`; hai bảng khác nhau. |
| Văn phòng | Thông tin địa chỉ viết trực tiếp trong trang/footer | Không có route riêng | Không có controller | `Office` (rỗng) | `offices` | Cập nhật bảng này không tự đổi địa chỉ hiển thị cho tới khi Blade/controller nối vào. |
| Nhân sự | Chưa thấy giao diện nối dữ liệu | Không có route riêng | Không có controller | `Employee` (rỗng) | `employees` | Bảng chưa có người dùng/luồng quản trị. |
| Tuyển dụng | Khu vực public bị comment | Không có route riêng | Không có controller | `Recruitment` (rỗng) | `recruitments` | Có thể không hiển thị kể cả khi database có dữ liệu. |
| Tin tức | Khu vực public bị comment | Không có route riêng | Không có controller | `News` (rỗng) | `news` | Tương tự tuyển dụng. |
| Đối tác | Khu vực public bị comment | Không có route riêng | Không có controller | `Partner` (rỗng) | `partners` | Tương tự tuyển dụng. |
| Liên hệ | Form nằm trong comment; thông tin tĩnh và bản đồ vẫn render | Không có POST route | Không có controller | `Contact` (rỗng) | `contacts` | Chỉnh form HTML không làm hệ thống lưu yêu cầu; cần cả endpoint và quy trình xử lý/bảo vệ dữ liệu. |
| Dashboard demo | `resources/views/admin/dashboard.blade.php`, `admin/index.blade.php` | Không có route phục vụ các view này | Không có controller | Không | Nội dung demo không lưu database | Không nhầm với các trang quản trị đang được route khai báo. |

## Route quản trị đã khai báo

Tất cả nhóm `/admin` được bọc `auth`:

- `/admin/info`: resource đầy đủ (index/create/store/show/edit/update/destroy), nhưng controller hiện chỉ có `index` và `update`.
- `/admin/projects`: resource đầy đủ; controller có `index/create/store/edit/update/destroy` nhưng thiếu `show`, đồng thời view gọi route name không đúng tiền tố.
- `/admin/banners`: chỉ có `index/store/edit/update/destroy`; không có trang create riêng vì form đặt ngay trong index.
- `/admin/hero-highlights`: tương tự banner.

## Tệp nền tảng quan trọng

| Tệp/thư mục | Vai trò quản lý |
|---|---|
| `routes/web.php` | Bản đồ URL công khai, đăng nhập và admin. |
| `app/Http/Controllers/` | Nhận yêu cầu, kiểm tra đầu vào, gọi model, chọn view/chuyển trang. |
| `app/Models/` | Định nghĩa cách Laravel truy cập bảng; tên Model thường ánh xạ số nhiều thành tên bảng. |
| `resources/views/` | HTML/Blade giao diện được trả cho trình duyệt. |
| `database/migrations/` | Lịch sử tạo cấu trúc bảng; file migration khai báo chứ không chứa toàn bộ bản ghi. |
| `database/seeders/DatabaseSeeder.php` | Có điều kiện tạo/cập nhật tài khoản từ cấu hình `ADMIN_*`; không tự tạo user khi thiếu cấu hình. |
| `config/auth.php`, `config/session.php`, `config/database.php` | Cấu hình xác thực, phiên và kết nối database. Giá trị môi trường thực tế lấy từ `.env`. |
| `config/admin.php` | Đọc cấu hình `ADMIN_NAME`, `ADMIN_EMAIL`, `ADMIN_PASSWORD` cho seeder. |
| `resources/css`, `resources/js`, `vite.config.js` | Nguồn asset frontend; không phải mọi trang hiện tại đều dùng pipeline này. |
