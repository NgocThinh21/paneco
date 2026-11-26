<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANECO VIỆT NAM - Thiết kế & Triển khai Bản vẽ Kết cấu thép Nhật Bản & BIM</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts: Roboto & Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-navy: #0A2540;
            --secondary-blue: #1B365D;
            --accent-amber: #F59E0B;
            --accent-hover: #D97706;
            --light-bg: #F8FAFC;
            --text-dark: #1E293B;
            --text-muted: #64748B;
        }

        body {
            font-family: 'Roboto', sans-serif;
            color: var(--text-dark);
            scroll-behavior: smooth;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, .navbar-brand {
            font-family: 'Montserrat', sans-serif;
        }

        /* Navbar */
        .navbar {
            background-color: rgba(255, 255, 255, 0.98);
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.08);
            padding: 12px 0;
            transition: all 0.3s ease;
        }
        .navbar-brand {
            font-weight: 800;
            font-size: 1.6rem;
            color: var(--primary-navy) !important;
            letter-spacing: 1px;
        }
        .navbar-brand span {
            color: var(--accent-amber);
        }
        .nav-link {
            font-weight: 500;
            color: var(--primary-navy) !important;
            margin: 0 8px;
            transition: color 0.3s;
            font-size: 0.95rem;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--accent-amber) !important;
        }
        .btn-contact-nav {
            background-color: var(--primary-navy);
            color: #fff !important;
            border-radius: 6px;
            padding: 8px 20px !important;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-contact-nav:hover {
            background-color: var(--accent-amber);
            color: var(--primary-navy) !important;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(10, 37, 64, 0.92), rgba(27, 54, 93, 0.85)), 
                        url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat;
            color: #fff;
            padding: 140px 0 100px;
            position: relative;
        }
        .hero-badge {
            background-color: rgba(245, 158, 11, 0.2);
            color: var(--accent-amber);
            border: 1px solid var(--accent-amber);
            padding: 6px 16px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
        }
        .hero-title {
            font-size: 2.8rem;
            font-weight: 800;
            line-height: 1.25;
            margin-bottom: 20px;
        }
        .hero-subtitle {
            font-size: 1.1rem;
            color: #CBD5E1;
            max-width: 650px;
            margin-bottom: 35px;
            line-height: 1.6;
        }
        .btn-amber {
            background-color: var(--accent-amber);
            color: var(--primary-navy);
            font-weight: 700;
            padding: 12px 28px;
            border-radius: 6px;
            border: none;
            transition: all 0.3s;
        }
        .btn-amber:hover {
            background-color: var(--accent-hover);
            color: #fff;
            transform: translateY(-2px);
        }

        /* Section Common */
        section {
            padding: 80px 0;
        }
        .section-title {
            font-weight: 800;
            color: var(--primary-navy);
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
        }
        .section-title::after {
            content: '';
            width: 60px;
            height: 4px;
            background-color: var(--accent-amber);
            display: block;
            margin: 10px auto 0;
            border-radius: 2px;
        }
        .section-title-left::after {
            margin: 10px 0 0;
        }

        /* Core Values */
        .value-card {
            background: #fff;
            border-radius: 12px;
            padding: 30px 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border-top: 4px solid var(--primary-navy);
            transition: all 0.3s ease;
            height: 100%;
        }
        .value-card:hover {
            transform: translateY(-8px);
            border-top-color: var(--accent-amber);
        }
        .value-icon {
            width: 60px;
            height: 60px;
            background-color: rgba(10, 37, 64, 0.08);
            color: var(--primary-navy);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
        }

        /* Software Grid */
        .software-box {
            background: #fff;
            border: 1px solid #E2E8F0;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s;
            height: 100%;
        }
        .software-box:hover {
            border-color: var(--accent-amber);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
        }
        .software-tag {
            font-size: 0.75rem;
            padding: 3px 10px;
            border-radius: 20px;
            background: #EFF6FF;
            color: #1D4ED8;
            font-weight: 600;
        }

        /* Projects Filter & Cards */
        .filter-btn {
            border: 2px solid var(--primary-navy);
            color: var(--primary-navy);
            background: transparent;
            font-weight: 600;
            padding: 8px 20px;
            border-radius: 6px;
            margin: 5px;
            transition: all 0.3s;
        }
        .filter-btn.active, .filter-btn:hover {
            background-color: var(--primary-navy);
            color: #fff;
        }
        .project-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s;
            height: 100%;
        }
        .project-card:hover {
            transform: translateY(-6px);
        }
        .project-img-wrap {
            height: 210px;
            overflow: hidden;
            position: relative;
            background: #E2E8F0;
        }
        .project-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        .project-card:hover .project-img-wrap img {
            transform: scale(1.06);
        }
        .project-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            background: var(--primary-navy);
            color: #fff;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        .project-scale {
            color: var(--accent-hover);
            font-weight: 700;
            font-size: 0.95rem;
        }

        /* Recruitment */
        .job-card {
            background: #fff;
            border-left: 5px solid var(--accent-amber);
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        /* Floating Zalo Button */
        .zalo-float {
            position: fixed;
            bottom: 25px;
            right: 25px;
            background-color: #0068FF;
            color: #fff;
            width: 58px;
            height: 58px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 0.95rem;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(0, 104, 255, 0.45);
            z-index: 9999;
            animation: pulse 2s infinite;
        }
        .zalo-float:hover {
            color: #fff;
            transform: scale(1.08);
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(0, 104, 255, 0.7); }
            70% { box-shadow: 0 0 0 15px rgba(0, 104, 255, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 104, 255, 0); }
        }

        /* Footer */
        footer {
            background-color: var(--primary-navy);
            color: #CBD5E1;
            padding: 60px 0 25px;
        }
        footer h5 {
            color: #fff;
            font-weight: 700;
            margin-bottom: 20px;
        }

        /* Responsive Tweaks */
        @media (max-width: 768px) {
            .hero-title { font-size: 2rem; }
            .hero-section { padding: 110px 0 70px; }
            section { padding: 55px 0; }
        }
    </style>
</head>
<body>

    @include('layouts.header')

    <!-- 2. HERO BANNER -->
     @php
        $hero = $banners->first();
    @endphp
    
    @if($hero)
    <section id="home" class="hero-section"style="background: linear-gradient(135deg, rgba(10, 37, 64, 0.92), rgba(27, 54, 93, 0.85)), 
    { storage/app/public/banners/$hero->image }}
      center/cover;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    @if($hero->badge_text)
                        <span class="hero-badge"><i class="bi bi-patch-check-fill me-1"></i> {{ $hero->badge_text }}</span>
                    @endif
                    <h1 class="hero-title">{{ $hero->title }}</h1>
                    <p class="hero-subtitle">
                        {{ $hero->description }}</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ $hero->button1_link }}" class="btn btn-amber"><i class="bi bi-grid-3x3-gap-fill me-2"></i>{{ $hero->button1_text }}</a>
                    <!-- <span class="hero-badge"><i class="bi bi-patch-check-fill me-1"></i> THÀNH LẬP TỪ 07/06/2018 • CHUẨN KỸ THUẬT NHẬT BẢN</span> -->
                    <!-- <h1 class="hero-title">Chúng tôi hỗ trợ công nghệ xây dựng Nhật Bản từ Việt Nam</h1>
                    <p class="hero-subtitle">
                        Công ty TNHH PANECO Việt Nam chuyên sâu triển khai bản vẽ chi tiết kết cấu thép (Shop Drawing), thiết kế và thi công BIM cho các công trình dân dụng & công nghiệp tại Nhật Bản và Việt Nam.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#projects" class="btn btn-amber"><i class="bi bi-grid-3x3-gap-fill me-2"></i>Xem Công Trình Đã Làm</a> -->
                        <!-- <a href="#contact" class="btn btn-outline-light px-4 py-2 fw-semibold d-flex align-items-center">Hợp Tác & Báo Giá</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- 3. GIÁ TRỊ CỐT LÕI (3 CỘT) -->
     @if($heroHighlights->count())
    <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="d-flex flex-column gap-3">
            @foreach($heroHighlights as $item)
                <div class="p-3 rounded-3" style="background: rgba(255,255,255,0.1); backdrop-filter: blur(6px); border: 1px solid rgba(255,255,255,0.15);">
                    <div class="d-flex align-items-center gap-3">
                        <i class="{{ $item->icon }} fs-3 text-warning"></i>
                        <div>
                            <div class="fw-bold text-white">{{ $item->title }}</div>
                            @if($item->subtitle)
                                <div class="small text-white-50">{{ $item->subtitle }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif
    <!-- <section class="py-5 bg-light" style="margin-top: -40px; position: relative; z-index: 2; background: transparent !important;">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon"><i class="bi bi-bullseye"></i></div>
                        <h4 class="fw-bold text-dark">Chính Xác</h4>
                        <p class="text-muted mb-0">Mọi bản vẽ kết cấu thép, mọi thông số kỹ thuật đều được kiểm tra kỹ lưỡng và tuân thủ nghiêm ngặt tiêu chuẩn Nhật Bản.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon"><i class="bi bi-shield-check"></i></div>
                        <h4 class="fw-bold text-dark">Trung Thực</h4>
                        <p class="text-muted mb-0">Cam kết minh bạch, rõ ràng trong giao tiếp, quy trình xử lý kỹ thuật và hợp tác bền vững cùng đối tác.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="value-card">
                        <div class="value-icon"><i class="bi bi-clock-history"></i></div>
                        <h4 class="fw-bold text-dark">Đúng Thời Hạn</h4>
                        <p class="text-muted mb-0">Tôn trọng tuyệt đối tiến độ thi công là cách PANECO thể hiện sự chuyên nghiệp và uy tín trong từng dự án.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- 4. GIỚI THIỆU CÔNG TY -->
    <section id="about">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=900&q=80" alt="Đội ngũ kỹ sư PANECO" class="img-fluid rounded-4 shadow" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h6 class="text-warning fw-bold text-uppercase">Về Chúng Tôi</h6>
                    <h2 class="section-title section-title-left">CÔNG TY TNHH PANECO VIỆT NAM</h2>
                    <p class="text-muted mt-3">
                        Được thành lập vào ngày <strong>07/06/2018</strong>, trải qua hơn 8 năm hình thành và phát triển, PANECO Việt Nam tự hào là đơn vị uy tín chuyên sâu trong lĩnh vực triển khai bản vẽ chi tiết kết cấu thép, kiểm tra kỹ thuật và hoàn thiện hồ sơ BIM.
                    </p>
                    <p class="text-muted">
                        <strong>Tầm nhìn:</strong> Trở thành đơn vị hàng đầu trong lĩnh vực thiết kế – triển khai bản vẽ kết cấu thép và BIM, đáp ứng đầy đủ các tiêu chuẩn quốc tế khắt khe nhất.
                    </p>
                    <div class="bg-light p-3 rounded-3 border-start border-4 border-primary mt-4">
                        <ul class="list-unstyled mb-0 small">
                            <li class="mb-1"><strong>Tên tiếng Anh:</strong> Paneco Viet Nam Company Limited</li>
                            <li class="mb-1"><strong>Mã số doanh nghiệp:</strong> 4201796727 | <strong>Đại diện pháp luật:</strong> Ông Trương Đức Kiệt</li>
                            <li class="mb-1"><strong>Trụ sở TP.HCM:</strong> 231-233 Lê Thánh Tôn, P. Bến Thành, Quận 1, TP.HCM</li>
                            <li><strong>Chi nhánh Phan Rang:</strong> 16 Nguyễn Thị Minh Khai, P. Đô Vinh, TP. Phan Rang - Tháp Chàm, Ninh Thuận</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. LĨNH VỰC HOẠT ĐỘNG & PHẦN MỀM CHUYÊN DỤNG -->
    <section id="services" class="bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">LĨNH VỰC & CÔNG NGHỆ ÁP DỤNG</h2>
                <p class="text-muted">Năng lực kỹ thuật toàn diện kết hợp hệ thống phần mềm chuyên dụng chuẩn Nhật Bản & Quốc tế</p>
            </div>

            <!-- 3 Lĩnh vực -->
            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="fs-1 text-primary mb-3"><i class="bi bi-rulers"></i></div>
                        <h5 class="fw-bold">Tạo Bản Vẽ Kết Cấu Thép</h5>
                        <p class="text-muted small mb-0">Triển khai bản vẽ tổng thể, bản vẽ chi tiết gia công (Shop Drawing), kích thước thực tế cho nhà xưởng, cao ốc, nhà ga tại Nhật Bản.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="fs-1 text-warning mb-3"><i class="bi bi-building-gear"></i></div>
                        <h5 class="fw-bold">Thiết Kế & Thi Công Kết Cấu Thép</h5>
                        <p class="text-muted small mb-0">Tư vấn giải pháp kỹ thuật, gia cố khả năng chống động đất và tối ưu vật liệu xây dựng bằng thép.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm p-4 text-center">
                        <div class="fs-1 text-primary mb-3"><i class="bi bi-boxes"></i></div>
                        <h5 class="fw-bold">Dịch Vụ Hỗ Trợ Thiết Kế BIM</h5>
                        <p class="text-muted small mb-0">Dựng mô hình 3D BIM Revit, Tekla, thiết kế kiến trúc, nội thất và diễn họa phối cảnh công trình dân dụng & công nghiệp.</p>
                    </div>
                </div>
            </div>

            <!-- 6 Phần mềm chuyên dụng -->
            <h5 class="text-center fw-bold mb-4 text-secondary">Phần mềm chuyên dụng công ty đang vận hành</h5>
            <div class="row g-3">
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="software-box">
                        <span class="software-tag">CAD Chuyên sâu</span>
                        <h6 class="fw-bold mt-2 mb-1">S/F REAL4</h6>
                        <small class="text-muted d-block">Dotwell - Nhật Bản</small>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="software-box">
                        <span class="software-tag">CAD Phổ biến</span>
                        <h6 class="fw-bold mt-2 mb-1">Jisshihoushi</h6>
                        <small class="text-muted d-block">Thực Thốn Pháp Sư (JP)</small>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="software-box">
                        <span class="software-tag">CAD Phổ biến</span>
                        <h6 class="fw-bold mt-2 mb-1">S/F FUTURE</h6>
                        <small class="text-muted d-block">Syntech - Nhật Bản</small>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="software-box">
                        <span class="software-tag">BIM 3D</span>
                        <h6 class="fw-bold mt-2 mb-1">Tekla Structures</h6>
                        <small class="text-muted d-block">Trimble - Mỹ</small>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="software-box">
                        <span class="software-tag">BIM Kiến trúc</span>
                        <h6 class="fw-bold mt-2 mb-1">Autodesk Revit</h6>
                        <small class="text-muted d-block">Autodesk - Mỹ</small>
                    </div>
                </div>
                <div class="col-6 col-md-4 col-lg-2">
                    <div class="software-box">
                        <span class="software-tag">CAD Kỹ thuật</span>
                        <h6 class="fw-bold mt-2 mb-1">AutoCAD</h6>
                        <small class="text-muted d-block">Autodesk - Mỹ</small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. CÔNG TRÌNH DOANH NGHIỆP ĐÃ LÀM (CÓ BỘ LỌC JS) -->
    <section id="projects">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="section-title">CÔNG TRÌNH DOANH NGHIỆP ĐÃ LÀM</h2>
                <p class="text-muted">Hàng trăm dự án kết cấu thép trọng điểm tại Nhật Bản và công trình BIM quy mô lớn</p>
            </div>

            <!-- Thanh Filter -->
            <div class="text-center mb-5">
                <button class="filter-btn active" data-filter="all">Tất cả dự án</button>
                <button class="filter-btn" data-filter="steel">Kết cấu thép (Nhật Bản)</button>
                <button class="filter-btn" data-filter="bim">Thiết kế & Thi công BIM</button>
            </div>

            <!-- Lưới Dự Án -->
            <div class="row g-4" id="project-list">
                <!-- Dự án Thép 1 -->
                <div class="col-md-6 col-lg-4 project-item" data-category="steel">
                    <div class="card project-card">
                        <div class="project-img-wrap">
                            <span class="project-badge">Kết cấu thép • 2018</span>
                            <img src="https://images.unsplash.com/photo-1513828583688-c52646db42da?auto=format&fit=crop&w=700&q=80" alt="PALTAR RDC" loading="lazy">
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="fw-bold mb-0">Dự án PALTAR RDC</h5>
                                <span class="project-scale">2.800 tấn</span>
                            </div>
                            <p class="text-muted small mb-0">Triển khai mô hình 3D, bản vẽ tổng thể và bản vẽ chi tiết gia công kết cấu thép trên phần mềm S/F REAL4.</p>
                        </div>
                    </div>
                </div>

                <!-- Dự án Thép 2 -->
                <div class="col-md-6 col-lg-4 project-item" data-category="steel">
                    <div class="card project-card">
                        <div class="project-img-wrap">
                            <span class="project-badge">Kết cấu thép • 2021</span>
                            <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?auto=format&fit=crop&w=700&q=80" alt="Ga Kagoshima Chuo" loading="lazy">
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="fw-bold mb-0">Ga Kagoshima Chuo (Phía Tây)</h5>
                                <span class="project-scale">3.453 tấn</span>
                            </div>
                            <p class="text-muted small mb-0">Dự án phát triển nhà ga quy mô lớn tại Nhật Bản. Thực hiện bản vẽ tập chung bằng REAL4.</p>
                        </div>
                    </div>
                </div>

                <!-- Dự án Thép 3 -->
                <div class="col-md-6 col-lg-4 project-item" data-category="steel">
                    <div class="card project-card">
                        <div class="project-img-wrap">
                            <span class="project-badge">Kết cấu thép • 2020</span>
                            <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?auto=format&fit=crop&w=700&q=80" alt="ĐH Quốc tế Tokyo" loading="lazy">
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="fw-bold mb-0">ĐH Quốc tế Tokyo (Ikebukuro)</h5>
                                <span class="project-scale">1.800 tấn</span>
                            </div>
                            <p class="text-muted small mb-0">Bản vẽ chung, bản vẽ chi tiết và bản vẽ tham khảo bổ sung cho tòa nhà cơ sở Ikebukuro.</p>
                        </div>
                    </div>
                </div>

                <!-- Dự án BIM 1 -->
                <div class="col-md-6 col-lg-4 project-item" data-category="bim">
                    <div class="card project-card">
                        <div class="project-img-wrap">
                            <span class="project-badge bg-warning text-dark">Thiết kế BIM • 2019</span>
                            <img src="https://images.unsplash.com/photo-1586528116311-ad8dd3c8310d?auto=format&fit=crop&w=700&q=80" alt="Nhà máy Kastura" loading="lazy">
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="fw-bold mb-0">Nhà máy Kastura</h5>
                                <span class="project-scale">4.596 m²</span>
                            </div>
                            <p class="text-muted small mb-0">Triển khai mô hình BIM công nghiệp đồng bộ kiến trúc và kết cấu trên nền tảng Autodesk Revit.</p>
                        </div>
                    </div>
                </div>

                <!-- Dự án BIM 2 -->
                <div class="col-md-6 col-lg-4 project-item" data-category="bim">
                    <div class="card project-card">
                        <div class="project-img-wrap">
                            <span class="project-badge bg-warning text-dark">Thiết kế BIM • 2019</span>
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=700&q=80" alt="Khách sạn 9 tầng" loading="lazy">
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="fw-bold mb-0">Khách sạn Cao Tầng (9 Tầng)</h5>
                                <span class="project-scale">2.300 m²</span>
                            </div>
                            <p class="text-muted small mb-0">Thiết kế mô hình BIM Revit kết hợp diễn họa ánh sáng thực tế bằng Enscape.</p>
                        </div>
                    </div>
                </div>

                <!-- Dự án BIM 3 -->
                <div class="col-md-6 col-lg-4 project-item" data-category="bim">
                    <div class="card project-card">
                        <div class="project-img-wrap">
                            <span class="project-badge bg-warning text-dark">Thiết kế BIM • 2018</span>
                            <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=700&q=80" alt="Trường mẫu giáo" loading="lazy">
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h5 class="fw-bold mb-0">Trường Mẫu Giáo Hiện Đại</h5>
                                <span class="project-scale">860 m²</span>
                            </div>
                            <p class="text-muted small mb-0">Thiết kế không gian giáo dục xanh, dựng hình BIM Revit + Render phối cảnh Lumion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. TUYỂN DỤNG & TIN TỨC -->
    <section id="recruitment" class="bg-light">
        <div class="container">
            <div class="row g-5">
                <!-- Cột Tuyển dụng -->
                <div class="col-lg-7">
                    <h2 class="section-title section-title-left mb-4">THÔNG TIN TUYỂN DỤNG</h2>
                    
                    <div class="job-card">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <h5 class="fw-bold text-primary mb-1">Nhân Viên Triển Khai Bản Vẽ Kết Cấu Thép</h5>
                            <span class="badge bg-success">Đang tuyển (5 vị trí)</span>
                        </div>
                        <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger"></i> Làm việc tại: Phan Rang - Tháp Chàm (Ninh Thuận) hoặc Quận 1 (TP.HCM)</p>
                        <p class="small mb-3">Sử dụng phần mềm S/F REAL4, Jissun, FUTURE để triển khai bản vẽ gia công kết cấu thép cho các công trình tại Nhật Bản. Được đào tạo bài bản từ đầu.</p>
                        <a href="#contact" class="btn btn-sm btn-outline-primary fw-semibold">Ứng tuyển vị trí này <i class="bi bi-arrow-right"></i></a>
                    </div>

                    <div class="job-card">
                        <div class="d-flex justify-content-between align-items-start flex-wrap gap-2">
                            <h5 class="fw-bold text-primary mb-1">Kỹ Sư Thiết Kế BIM (Revit / Tekla)</h5>
                            <span class="badge bg-success">Đang tuyển (2 vị trí)</span>
                        </div>
                        <p class="text-muted small mb-2"><i class="bi bi-geo-alt-fill text-danger"></i> Làm việc tại: TP. Hồ Chí Minh / Ninh Thuận</p>
                        <p class="small mb-3">Dựng mô hình BIM 3D kiến trúc, kết cấu, kiểm tra xung đột và xuất hồ sơ kỹ thuật theo tiêu chuẩn quốc tế.</p>
                        <a href="#contact" class="btn btn-sm btn-outline-primary fw-semibold">Ứng tuyển vị trí này <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>

                <!-- Cột Tin tức & Đối tác -->
                <div class="col-lg-5" id="news">
                    <h2 class="section-title section-title-left mb-4">TIN TỨC & ĐỐI TÁC</h2>
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <small class="text-warning fw-bold">15/11/2026 • Hoạt động công ty</small>
                            <h6 class="fw-bold mt-1">PANECO mở rộng đội ngũ kỹ sư kết cấu thép tại chi nhánh Phan Rang</h6>
                            <p class="text-muted small mb-0">Nhằm đáp ứng khối lượng đơn đặt hàng tăng cao từ các đối tác Nhật Bản cuối năm 2026...</p>
                        </div>
                    </div>
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body">
                            <small class="text-warning fw-bold">02/10/2026 • Công nghệ</small>
                            <h6 class="fw-bold mt-1">Ứng dụng quy trình kiểm tra tự động trên S/F REAL4 giúp giảm 30% sai số</h6>
                            <p class="text-muted small mb-0">Nâng cao độ chính xác tuyệt đối cho các cấu kiện dầm, cột phức tạp...</p>
                        </div>
                    </div>

                    <!-- Đối tác tiêu biểu -->
                    <div class="bg-white p-3 rounded-3 shadow-sm">
                        <h6 class="fw-bold text-secondary mb-3">Đối tác & Khách hàng tiêu biểu</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge bg-light text-dark border p-2">Nippon Steel</span>
                            <span class="badge bg-light text-dark border p-2">Nippon Express</span>
                            <span class="badge bg-light text-dark border p-2">Godo Kiko Co., Ltd</span>
                            <span class="badge bg-light text-dark border p-2">Toyota Industries</span>
                            <span class="badge bg-light text-dark border p-2">Equinix Japan</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. LIÊN HỆ & GỬI THÔNG TIN -->
    <section id="contact">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">LIÊN HỆ VỚI PANECO</h2>
                <p class="text-muted">Kết nối với chúng tôi để được tư vấn giải pháp kỹ thuật hoặc nộp hồ sơ ứng tuyển</p>
            </div>

            <div class="row g-4">
                <!-- Thông tin 2 văn phòng -->
                <div class="col-lg-5">
                    <div class="p-4 rounded-4 text-white h-100" style="background-color: var(--primary-navy);">
                        <h4 class="fw-bold mb-4 text-warning">Thông Tin Liên Hệ</h4>
                        
                        <div class="mb-4">
                            <h6 class="fw-bold"><i class="bi bi-geo-alt-fill text-warning me-2"></i>Văn phòng TP. Hồ Chí Minh:</h6>
                            <p class="small text-light opacity-75 mb-0">231-233 Lê Thánh Tôn, Phường Bến Thành, Quận 1, TP. Hồ Chí Minh</p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold"><i class="bi bi-geo-alt-fill text-warning me-2"></i>Chi nhánh Phan Rang:</h6>
                            <p class="small text-light opacity-75 mb-0">16 Nguyễn Thị Minh Khai, Phường Đô Vinh, TP. Phan Rang - Tháp Chàm, Tỉnh Ninh Thuận</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="fw-bold"><i class="bi bi-telephone-fill text-warning me-2"></i>Hotline / Zalo:</h6>
                            <p class="small mb-0">+84-936 270 853 | 0359 122 161</p>
                        </div>

                        <div>
                            <h6 class="fw-bold"><i class="bi bi-envelope-fill text-warning me-2"></i>Email:</h6>
                            <p class="small mb-0">panconsxd@gmail.com</p>
                        </div>
                    </div>
                </div>

                <!-- Form Liên Hệ (Sẽ kết nối vào bảng contacts trong Laravel) -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm p-4 rounded-4">
                        <form id="contactForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Họ và tên *</label>
                                    <input type="text" class="form-control" name="sender_name" placeholder="Nhập họ tên của bạn" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Số điện thoại / Zalo *</label>
                                    <input type="tel" class="form-control" name="sender_phone" placeholder="Nhập số điện thoại" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Email</label>
                                    <input type="email" class="form-control" name="sender_email" placeholder="email@example.com">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Mục đích liên hệ</label>
                                    <select class="form-select" name="type">
                                        <option value="project">Tư vấn / Báo giá dự án</option>
                                        <option value="recruitment">Ứng tuyển việc làm</option>
                                        <option value="partner">Hợp tác đối tác</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-semibold">Nội dung lời nhắn *</label>
                                    <textarea class="form-control" name="message" rows="4" placeholder="Nhập nội dung cần trao đổi hoặc vị trí ứng tuyển..." required></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-amber w-100 py-2">
                                        <i class="bi bi-send-fill me-2"></i>Gửi Thông Tin Về Hệ Thống
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div id="formAlert" class="alert alert-success mt-3 d-none" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>Cảm ơn bạn! Thông tin đã được ghi nhận, bộ phận kỹ thuật PANECO sẽ liên hệ lại sớm nhất.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')

    <!-- NÚT ZALO NỔI GÓC MÀN HÌNH -->
    <a href="https://zalo.me/0936270853" target="_blank" class="zalo-float" title="Chat Zalo với PANECO">
        Zalo
    </a>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript (Xử lý lọc dự án, Active Menu, Thông báo Form) -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Bộ lọc Công trình (Kết cấu thép vs BIM)
            const filterButtons = document.querySelectorAll('.filter-btn');
            const projectItems = document.querySelectorAll('.project-item');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Đổi trạng thái nút active
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');

                    const filterValue = button.getAttribute('data-filter');

                    projectItems.forEach(item => {
                        if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });

            // 2. Xử lý demo gửi Form Liên hệ (Khi vào Laravel sẽ đổi thành POST lên Controller)
            const contactForm = document.getElementById('contactForm');
            const formAlert = document.getElementById('formAlert');

            contactForm.addEventListener('submit', function (e) {
                e.preventDefault(); // Chặn load lại trang khi test giao diện tĩnh
                formAlert.classList.remove('d-none');
                contactForm.reset();
                setTimeout(() => {
                    formAlert.classList.add('d-none');
                }, 5000);
            });

            // 3. Tự động đóng menu mobile khi bấm vào link
            const navLinks = document.querySelectorAll('.nav-link');
            const navbarCollapse = document.getElementById('navbarNav');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (navbarCollapse.classList.contains('show')) {
                        new bootstrap.Collapse(navbarCollapse).hide();
                    }
                });
            });
        });
    </script>
</body>
</html>