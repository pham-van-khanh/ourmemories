# Memories CMS (Starter Project)

Dự án khởi tạo mới theo yêu cầu, với cấu trúc sẵn sàng để phát triển Laravel Memories CMS.

## Cấu trúc hiện tại
- `app/` mô hình MVC cơ bản
- `routes/web.php` định tuyến web mẫu
- `resources/views/layouts/app.blade.php` layout frontend cơ bản
- `config/cms.php` config module CMS
- `database/migrations/` chứa migration mẫu cho `categories`

## Chạy thử nhanh (placeholder)
Vì môi trường hiện tại không cài được dependency từ internet, dự án được khởi tạo ở dạng scaffold thủ công.

Khi chạy trên máy có internet:
1. Cài Laravel 11 đầy đủ
2. Giữ lại cấu trúc và nội dung module trong repo này
3. Chạy migrate + seed
