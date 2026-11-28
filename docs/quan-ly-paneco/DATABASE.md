# Cấu trúc database

Bảng và trường chi tiết: [04-database.md](04-database.md). Migrations hiện có đều báo đã chạy trên kết nối đang cấu hình; nội dung và số lượng bản ghi chưa được kiểm tra.

Database hiện có nhóm bảng tài khoản/session, nhóm bảng nội dung Paneco, và các bảng cache/queue. Các bảng nội dung phần lớn chưa có foreign key liên kết với nhau. Bảng `projects` hiện không khớp với tên trường model/controller quản trị.

Thiết kế lại schema, thêm bảng role/media/menu/SEO hoặc migration nào khác thuộc Giai đoạn 2, chỉ bắt đầu sau phê duyệt và sau khi tạo/kiểm tra điểm khôi phục. Không chạy migration trong Giai đoạn 1.
