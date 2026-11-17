<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Quản Trị - PANECO.VN</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-navy: #0A2540;
            --secondary-blue: #1B365D;
            --accent-amber: #F59E0B;
            --accent-hover: #D97706;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(135deg, rgba(10, 37, 64, 0.9), rgba(27, 54, 93, 0.85)), 
                        url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        h1, h2, h3, h4, h5 {
            font-family: 'Montserrat', sans-serif;
        }
        .login-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
            border-top: 5px solid var(--accent-amber);
        }
        .login-header {
            background-color: var(--primary-navy);
            color: #fff;
            padding: 30px 20px;
            text-align: center;
        }
        .btn-amber {
            background-color: var(--accent-amber);
            color: var(--primary-navy);
            font-weight: 700;
            padding: 10px;
            border-radius: 6px;
            border: none;
            transition: all 0.3s;
        }
        .btn-amber:hover {
            background-color: var(--accent-hover);
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-header">
            <h3><i class="bi bi-buildings-fill text-warning me-2"></i>PANECO<span>.VN</span></h3>
            <p class="small text-light opacity-75 mb-0">Hệ Thống Quản Trị Doanh Nghiệp</p>
        </div>
        
        <div class="card-body p-4">
            <!-- Form xử lý đăng nhập (Sau này trỏ route POST vào đây) -->
            <form action="#" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold small text-secondary">Tên đăng nhập hoặc Email</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-person-fill"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="admin@paneco.vn" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold small text-secondary">Mật khẩu</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="••••••••" required>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4 small">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember">
                        <label class="form-check-label text-muted" for="remember">Ghi nhớ đăng nhập</label>
                    </div>
                    <a href="#" class="text-decoration-none text-primary">Quên mật khẩu?</a>
                </div>

                <button type="submit" class="btn btn-amber w-100 py-2 mb-3">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Đăng Nhập Hệ Thống
                </button>
                
                <div class="text-center">
                    <a href="/" class="text-decoration-none small text-muted"><i class="bi bi-arrow-left me-1"></i>Về trang chủ website</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>