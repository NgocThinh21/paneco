<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - PANECO VIỆT NAM</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-navy: #0A2540;
            --secondary-blue: #1B365D;
            --accent-amber: #F59E0B;
            --accent-hover: #D97706;
            --bg-light: #F1F5F9;
            --sidebar-width: 260px;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: var(--bg-light);
            color: #1E293B;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, .brand-logo {
            font-family: 'Montserrat', sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--primary-navy);
            color: #fff;
            transition: all 0.3s ease;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .brand-logo {
            font-weight: 800;
            font-size: 1.4rem;
            color: #fff;
            text-decoration: none;
            letter-spacing: 1px;
        }

        .brand-logo span {
            color: var(--accent-amber);
        }

        .sidebar-menu {
            padding: 15px 0;
            flex-grow: 1;
            overflow-y: auto;
        }

        .menu-label {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #94A3B8;
            padding: 10px 20px 5px;
            font-weight: 700;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 11px 20px;
            color: #CBD5E1;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.93rem;
            transition: all 0.2s;
            border-left: 4px solid transparent;
        }

        .sidebar-link i {
            font-size: 1.1rem;
            margin-right: 12px;
            width: 20px;
            text-align: center;
        }

        .sidebar-link:hover, .sidebar-link.active {
            background-color: rgba(255, 255, 255, 0.08);
            color: #fff;
            border-left-color: var(--accent-amber);
        }

        .sidebar-link.active i {
            color: var(--accent-amber);
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            transition: all 0.3s ease;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Top Navbar */
        .topbar {
            background-color: #fff;
            padding: 12px 25px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.04);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        /* Stat Cards */
        .stat-card {
            background: #fff;
            border-radius: 12px;
            padding: 22px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            border-left: 4px solid var(--primary-navy);
            transition: transform 0.2s;
            height: 100%;
        }
        .stat-card:hover {
            transform: translateY(-3px);
        }
        .stat-card.amber { border-left-color: var(--accent-amber); }
        .stat-card.success { border-left-color: #10B981; }
        .stat-card.info { border-left-color: #0EA5E9; }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }

        /* Buttons */
        .btn-amber {
            background-color: var(--accent-amber);
            color: var(--primary-navy);
            font-weight: 700;
            border: none;
        }
        .btn-amber:hover {
            background-color: var(--accent-hover);
            color: #fff;
        }

        /* Table Card */
        .content-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.03);
            padding: 22px;
        }

        /* Responsive Mobile */
        @media (max-width: 991.98px) {
            .sidebar {
                left: calc(var(--sidebar-width) * -1);
            }
            .sidebar.show {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- 1. SIDEBAR MENU (Khớp 100% các bảng Database của PANECO) -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="/dashboard" class="brand-logo">
                <i class="bi bi-buildings-fill text-warning me-1"></i>PANECO<span>.ADMIN</span>
            </a>
            <div class="small text-light opacity-50 mt-1" style="font-size: 0.75rem;">Quản trị hệ thống nội bộ</div>
        </div>

        <div class="sidebar-menu">
            <div class="menu-label">Tổng quan</div>
            <a href="/dashboard" class="sidebar-link active">
                <i class="bi bi-speedometer2"></i> Bảng điều khiển
            </a>
            <a href="/" target="_blank" class="sidebar-link">
                <i class="bi bi-box-arrow-up-right"></i> Xem trang khách hàng
            </a>

            <div class="menu-label">Quản lý nội dung Web</div>
            <a href="#sec-projects" class="sidebar-link">
                <i class="bi bi-building-check"></i> Công trình (Thép & BIM)
            </a>
            <a href="#sec-services" class="sidebar-link">
                <i class="bi bi-cpu"></i> Lĩnh vực & Phần mềm
            </a>
            <a href="#sec-recruitment" class="sidebar-link">
                <i class="bi bi-person-badge"></i> Tin tuyển dụng
            </a>
            <a href="#sec-news" class="sidebar-link">
                <i class="bi bi-newspaper"></i> Tin tức & Sự kiện
            </a>
            <a href="#sec-partners" class="sidebar-link">
                <i class="bi bi-award"></i> Đối tác & Khách hàng
            </a>

            <div class="menu-label">Tương tác & Cấu hình</div>
            <a href="#sec-contacts" class="sidebar-link">
                <i class="bi bi-inbox-fill"></i> Hòm thư liên hệ / CV
                <span class="badge bg-warning text-dark ms-auto">3 mới</span>
            </a>
            <a href="#sec-company" class="sidebar-link">
                <i class="bi bi-gear-fill"></i> Thông tin công ty
            </a>
        </div>

        <div class="p-3 border-top border-secondary">
            <a href="/login" class="btn btn-outline-light btn-sm w-100">
                <i class="bi bi-box-arrow-left me-1"></i> Đăng xuất
            </a>
        </div>
    </aside>

    <!-- 2. MAIN CONTENT -->
    <div class="main-content">
        <!-- Topbar -->
        <header class="topbar">
            <div class="d-flex align-items-center">
                <button class="btn btn-light d-lg-none me-3" id="sidebarToggle">
                    <i class="bi bi-list fs-4"></i>
                </button>
                <h5 class="fw-bold mb-0 text-dark">Bảng Điều Khiển Quản Trị</h5>
            </div>

            <div class="d-flex align-items-center gap-3">
                <span class="badge bg-light text-dark border d-none d-sm-inline-block">
                    <i class="bi bi-geo-alt-fill text-danger me-1"></i>Chi nhánh: Phan Rang / HCMC
                </span>
                <div class="d-flex align-items-center">
                    <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold me-2" style="width: 36px; height: 36px;">
                        AD
                    </div>
                    <div class="small lh-1">
                        <div class="fw-bold">Admin PANECO</div>
                        <small class="text-muted" style="font-size: 0.75rem;">Quản trị viên</small>
                    </div>
                </div>
            </div>
        </header>

        <!-- Nội dung chính -->
        <main class="p-4 flex-grow-1">
            
            <!-- 4 Thẻ Thống Kê Nhanh -->
            <div class="row g-4 mb-4">
                <div class="col-sm-6 col-xl-3">
                    <div class="stat-card">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="text-muted small fw-semibold text-uppercase">Dự án Kết cấu thép</div>
                                <h3 class="fw-bold mb-0 mt-1">42</h3>
                                <small class="text-success"><i class="bi bi-check-circle"></i> Nhật Bản (REAL4)</small>
                            </div>
                            <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                                <i class="bi bi-buildings"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="stat-card amber">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="text-muted small fw-semibold text-uppercase">Dự án Thiết kế BIM</div>
                                <h3 class="fw-bold mb-0 mt-1">18</h3>
                                <small class="text-muted">Revit / Tekla / Enscape</small>
                            </div>
                            <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                                <i class="bi bi-boxes"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="stat-card success">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="text-muted small fw-semibold text-uppercase">Vị trí đang tuyển</div>
                                <h3 class="fw-bold mb-0 mt-1">02</h3>
                                <small class="text-success">HCMC & Phan Rang</small>
                            </div>
                            <div class="stat-icon bg-success bg-opacity-10 text-success">
                                <i class="bi bi-person-plus-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-3">
                    <div class="stat-card info">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <div class="text-muted small fw-semibold text-uppercase">Liên hệ / Hồ sơ mới</div>
                                <h3 class="fw-bold mb-0 mt-1">03</h3>
                                <small class="text-primary fw-semibold">Chưa xử lý</small>
                            </div>
                            <div class="stat-icon bg-info bg-opacity-10 text-info">
                                <i class="bi bi-envelope-exclamation-fill"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bảng Quản Lý Công Trình (CRUD Demo) -->
            <div class="content-card mb-4" id="sec-projects">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">Danh Sách Công Trình Đã Thực Hiện</h5>
                        <small class="text-muted">Quản lý hiển thị dự án Kết cấu thép (tấn) và Thiết kế BIM (m²) ra trang chủ</small>
                    </div>
                    <button class="btn btn-amber btn-sm px-3 py-2" data-bs-toggle="modal" data-bs-target="#addProjectModal">
                        <i class="bi bi-plus-circle-fill me-1"></i> Thêm Công Trình Mới
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Tên Công Trình</th>
                                <th>Phân Loại</th>
                                <th>Năm</th>
                                <th>Chi Tiết Công Việc</th>
                                <th>Quy Mô</th>
                                <th class="text-end">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody id="projectTableBody">
                            <tr>
                                <td>1</td>
                                <td class="fw-bold">PALTAR RDC</td>
                                <td><span class="badge bg-primary">Kết cấu thép</span></td>
                                <td>2018</td>
                                <td class="small text-muted">REAL4 - Bản vẽ tổng thể, chi tiết</td>
                                <td class="fw-bold text-warning">2.800 tấn</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary me-1" title="Sửa"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger btn-delete" title="Xóa"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td class="fw-bold">Ga Kagoshima Chuo (Phía Tây)</td>
                                <td><span class="badge bg-primary">Kết cấu thép</span></td>
                                <td>2021</td>
                                <td class="small text-muted">REAL4 - Tập chung kết cấu nhà ga</td>
                                <td class="fw-bold text-warning">3.453 tấn</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary me-1" title="Sửa"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger btn-delete" title="Xóa"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td class="fw-bold">Nhà máy Kastura</td>
                                <td><span class="badge bg-warning text-dark">Thiết kế BIM</span></td>
                                <td>2019</td>
                                <td class="small text-muted">Autodesk Revit - Mô hình BIM công nghiệp</td>
                                <td class="fw-bold text-primary">4.596 m²</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary me-1" title="Sửa"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger btn-delete" title="Xóa"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td class="fw-bold">Khách sạn Cao Tầng (9 Tầng)</td>
                                <td><span class="badge bg-warning text-dark">Thiết kế BIM</span></td>
                                <td>2019</td>
                                <td class="small text-muted">BIM Revit + Enscape Render</td>
                                <td class="fw-bold text-primary">2.300 m²</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-primary me-1" title="Sửa"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-outline-danger btn-delete" title="Xóa"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Hòm Thư Liên Hệ & Ứng Tuyển Nội Bộ (Thay thế Server Mail) -->
            <div class="content-card" id="sec-contacts">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h5 class="fw-bold mb-0 text-dark">Hòm Thư Liên Hệ & Ứng Tuyển Mới Nhất</h5>
                        <small class="text-muted">Dữ liệu khách hàng và ứng viên gửi trực tiếp từ Form trên website (Lưu tại Database)</small>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0 small">
                        <thead class="table-light">
                            <tr>
                                <th>Người Gửi</th>
                                <th>Số Điện Thoại / Zalo</th>
                                <th>Phân Loại</th>
                                <th>Nội Dung Tin Nhắn</th>
                                <th>Trạng Thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-bold">Nguyễn Văn Minh</td>
                                <td><a href="https://zalo.me/0901234567" target="_blank" class="text-decoration-none fw-bold">0901 234 567</a></td>
                                <td><span class="badge bg-info text-dark">Ứng tuyển việc làm</span></td>
                                <td>Em tốt nghiệp ngành xây dựng, muốn ứng tuyển vị trí triển khai bản vẽ kết cấu thép tại Phan Rang.</td>
                                <td><span class="badge bg-danger">Chưa liên hệ</span></td>
                            </tr>
                            <tr>
                                <td class="fw-bold">Tanaka Kenji (Godo Kiko)</td>
                                <td>+81-90-XXXX-XXXX</td>
                                <td><span class="badge bg-primary">Báo giá dự án</span></td>
                                <td>Cần báo giá triển khai Shop Drawing nhà xưởng 1.200 tấn bằng phần mềm S/F REAL4.</td>
                                <td><span class="badge bg-success">Đã phản hồi</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </main>
    </div>

    <!-- MODAL THÊM CÔNG TRÌNH MỚI (Demo thao tác thêm trực tiếp) -->
    <div class="modal fade" id="addProjectModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title fw-bold">Thêm Công Trình Mới</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form id="addProjectForm">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Tên công trình *</label>
                            <input type="text" class="form-control" id="pName" placeholder="VD: Nhà máy Tokyo Steel" required>
                        </div>
                        <div class="row g-2 mb-3">
                            <div class="col-6">
                                <label class="form-label fw-semibold small">Phân loại *</label>
                                <select class="form-select" id="pCategory">
                                    <option value="Kết cấu thép">Kết cấu thép</option>
                                    <option value="Thiết kế BIM">Thiết kế BIM</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-semibold small">Năm thực hiện *</label>
                                <input type="number" class="form-control" id="pYear" value="2026" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Quy mô (Số tấn hoặc m²) *</label>
                            <input type="text" class="form-control" id="pScale" placeholder="VD: 1.500 tấn hoặc 2.000 m²" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold small">Chi tiết công việc / Phần mềm</label>
                            <input type="text" class="form-control" id="pDetail" placeholder="VD: REAL4 - Bản vẽ tổng thể và chi tiết">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-amber btn-sm px-4">Lưu Công Trình</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS xử lý Sidebar mobile & Thêm/Xóa demo -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // 1. Bật/tắt Sidebar trên màn hình điện thoại
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', () => {
                    sidebar.classList.toggle('show');
                });
            }

            // 2. Demo nút Xóa dòng trong bảng
            document.getElementById('projectTableBody').addEventListener('click', function (e) {
                const btn = e.target.closest('.btn-delete');
                if (btn && confirm('Bạn có chắc chắn muốn xóa công trình này?')) {
                    btn.closest('tr').remove();
                }
            });

            // 3. Demo Thêm công trình mới từ Modal vào bảng
            const addForm = document.getElementById('addProjectForm');
            addForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const name = document.getElementById('pName').value;
                const cat = document.getElementById('pCategory').value;
                const year = document.getElementById('pYear').value;
                const scale = document.getElementById('pScale').value;
                const detail = document.getElementById('pDetail').value || 'Triển khai kỹ thuật';

                const badgeClass = cat === 'Kết cấu thép' ? 'bg-primary' : 'bg-warning text-dark';
                const tbody = document.getElementById('projectTableBody');
                const rowCount = tbody.rows.length + 1;

                const newRow = `
                    <tr>
                        <td>${rowCount}</td>
                        <td class="fw-bold">${name}</td>
                        <td><span class="badge ${badgeClass}">${cat}</span></td>
                        <td>${year}</td>
                        <td class="small text-muted">${detail}</td>
                        <td class="fw-bold text-warning">${scale}</td>
                        <td class="text-end">
                            <button class="btn btn-sm btn-outline-primary me-1"><i class="bi bi-pencil-square"></i></button>
                            <button class="btn btn-sm btn-outline-danger btn-delete"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                `;
                tbody.insertAdjacentHTML('beforeend', newRow);
                addForm.reset();
                bootstrap.Modal.getInstance(document.getElementById('addProjectModal')).hide();
            });
        });
    </script>
</body>
</html>