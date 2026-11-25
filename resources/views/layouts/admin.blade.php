<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANECO Admin - Hệ thống Quản trị Nội dung</title>
    <!-- Tích hợp Tailwind CSS & Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: '#0A2540',
                        navyLight: '#13385c',
                        gold: '#F59E0B',
                        goldHover: '#D97706',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="flex h-screen overflow-hidden">
    <!-- SIDEBAR BÊN TRÁI (7 BẢNG DỮ LIỆU) -->
    <aside class="w-64 bg-navy text-white flex flex-col justify-between flex-shrink-0">
        <div>
            <!-- Logo -->
            <div class="h-16 flex items-center px-6 border-b border-navyLight">
                <span class="text-xl font-bold tracking-wider text-white">PANECO <span class="text-gold">ADMIN</span></span>
            </div>

            <!-- Menu Điều hướng -->
            <!-- <nav class="mt-4 px-3 space-y-1">
                <a href="/admin/dashboard" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg bg-navyLight text-gold">
                    <i class="fas fa-chart-line w-6"></i> Tổng quan
                </a>
                <a href="/admin/company-info" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-navyLight hover:text-white transition">
                    <i class="fas fa-building w-6"></i> Thông tin công ty
                </a>
                <a href="/admin/projects" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-navyLight hover:text-white transition">
                    <i class="fas fa-project-diagram w-6"></i> Dự án (Thép & BIM)
                </a>
                <a href="/admin/services" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-navyLight hover:text-white transition">
                    <i class="fas fa-cogs w-6"></i> Dịch vụ & Phần mềm
                </a>
                <a href="/admin/recruitments" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-navyLight hover:text-white transition">
                    <i class="fas fa-user-tie w-6"></i> Tuyển dụng
                </a>
                <a href="/admin/news" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-navyLight hover:text-white transition">
                    <i class="fas fa-newspaper w-6"></i> Tin tức & Sự kiện
                </a>
                <a href="/admin/partners" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-navyLight hover:text-white transition">
                    <i class="fas fa-handshake w-6"></i> Đối tác Nhật Bản
                </a>
                <a href="/admin/contacts" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-navyLight hover:text-white transition justify-between">
                    <div class="flex items-center">
                        <i class="fas fa-envelope w-6"></i> Hòm thư liên hệ
                    </div>
                    <span class="bg-gold text-navy text-xs font-bold px-2 py-0.5 rounded-full">Mới</span>
                </a>
            </nav> -->
            <nav class="mt-4 px-3 space-y-1">
    <!-- Tổng quan -->
    <a href="/admin/banners" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition {{ request()->is('admin/dashboard') ? 'bg-navyLight text-gold' : 'text-gray-300 hover:bg-navyLight hover:text-white' }}">
        <i class="fas fa-chart-line w-6"></i> BANNER trang chủ

    <!-- Thông tin công ty -->
    <a href="/admin/company-info" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition {{ request()->is('admin/company-info*') ? 'bg-navyLight text-gold' : 'text-gray-300 hover:bg-navyLight hover:text-white' }}">
        <i class="fas fa-building w-6"></i> Thông tin công ty
    </a>

    <!-- Dự án (Thép & BIM) -->
    <a href="/admin/projects" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition {{ request()->is('admin/projects*') ? 'bg-navyLight text-gold' : 'text-gray-300 hover:bg-navyLight hover:text-white' }}">
        <i class="fas fa-project-diagram w-6"></i> Dự án (Thép & BIM)
    </a>

    <!-- Dịch vụ & Phần mềm -->
    <a href="/admin/services" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition {{ request()->is('admin/services*') ? 'bg-navyLight text-gold' : 'text-gray-300 hover:bg-navyLight hover:text-white' }}">
        <i class="fas fa-cogs w-6"></i> Dịch vụ & Phần mềm
    </a>

    <!-- Tuyển dụng -->
    <a href="/admin/recruitments" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition {{ request()->is('admin/recruitments*') ? 'bg-navyLight text-gold' : 'text-gray-300 hover:bg-navyLight hover:text-white' }}">
        <i class="fas fa-user-tie w-6"></i> Tuyển dụng
    </a>

    <!-- Tin tức & Sự kiện -->
    <a href="/admin/news" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition {{ request()->is('admin/news*') ? 'bg-navyLight text-gold' : 'text-gray-300 hover:bg-navyLight hover:text-white' }}">
        <i class="fas fa-newspaper w-6"></i> Tin tức & Sự kiện
    </a>

    <!-- Đối tác Nhật Bản -->
    <a href="/admin/partners" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition {{ request()->is('admin/partners*') ? 'bg-navyLight text-gold' : 'text-gray-300 hover:bg-navyLight hover:text-white' }}">
        <i class="fas fa-handshake w-6"></i> Đối tác Nhật Bản
    </a>

    <!-- Hòm thư liên hệ -->
    <a href="/admin/contacts" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg transition justify-between {{ request()->is('admin/contacts*') ? 'bg-navyLight text-gold' : 'text-gray-300 hover:bg-navyLight hover:text-white' }}">
        <div class="flex items-center">
            <i class="fas fa-envelope w-6"></i> Hòm thư liên hệ
        </div>
        <span class="bg-gold text-navy text-xs font-bold px-2 py-0.5 rounded-full">Mới</span>
    </a>
</nav>
        </div>

        <!-- Nút về trang chủ -->
        <div class="p-4 border-t border-navyLight">
            <a href="/" target="_blank" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-navy bg-gold hover:bg-goldHover rounded-lg transition">
                <i class="fas fa-external-link-alt mr-2"></i> Xem Trang Chủ
            </a>
        </div>
    </aside>

    <!-- NỘI DUNG CHÍNH BÊN PHẢI -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header trên cùng -->
        <header class="h-16 bg-white shadow-sm flex items-center justify-between px-6">
            <h2 class="text-lg font-semibold text-navy">@yield('page_title', 'Bảng điều khiển')</h2>
            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-600">Xin chào, <strong>Admin</strong></span>
                <div class="w-8 h-8 rounded-full bg-navy text-gold flex items-center justify-center font-bold">A</div>
            </div>
        </header>

        <!-- Vùng đổ nội dung từng trang -->
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html> 