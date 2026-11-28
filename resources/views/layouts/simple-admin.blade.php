<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('page_title', 'Quản trị Paneco')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="min-h-screen bg-slate-100 font-sans text-slate-800">
    <header class="bg-slate-900 text-white">
        <div class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-5 py-4">
            <a class="text-lg font-bold tracking-wide text-white no-underline" href="{{ route('admin.info.index') }}">PANECO <span class="text-amber-400">QUẢN TRỊ</span></a>
            <nav class="flex flex-wrap items-center gap-4 text-sm font-medium">
                <a class="text-white/80 hover:text-white" href="{{ route('admin.info.index') }}">Thông tin công ty</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.employees.index') }}">Đội ngũ</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.content.index', 'banners') }}">Trang chủ</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.content.index', 'highlights') }}">Điểm nổi bật</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.content.index', 'services') }}">Dịch vụ</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.content.index', 'projects') }}">Dự án</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.media.index') }}">Hình ảnh</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.content.index', 'news') }}">Tin tức</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.content.index', 'recruitments') }}">Tuyển dụng</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.content.index', 'partners') }}">Đối tác</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.content.index', 'offices') }}">Văn phòng</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.content.index', 'values') }}">Giá trị</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.content.index', 'softwares') }}">Phần mềm</a>
                <a class="text-white/80 hover:text-white" href="{{ route('admin.contacts.index') }}">Yêu cầu liên hệ</a>
                <a class="text-white/80 hover:text-white" href="/" target="_blank" rel="noopener">Xem website</a>
                <span class="text-white/70">{{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="rounded bg-white/10 px-3 py-2 text-white hover:bg-white/20" type="submit">Đăng xuất</button>
                </form>
            </nav>
        </div>
    </header>
    <main class="mx-auto max-w-7xl px-5 py-8">
        @if (session('success'))
            <div class="mb-6 rounded border border-green-200 bg-green-50 p-4 text-green-800" role="status">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="mb-6 rounded border border-red-200 bg-red-50 p-4 text-red-800" role="alert">
                <p class="mb-2 font-semibold">Vui lòng kiểm tra lại thông tin:</p>
                <ul class="list-inside list-disc">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>
