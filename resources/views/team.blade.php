<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Đội ngũ kỹ sư và chuyên gia Paneco">
    <title>Đội ngũ Paneco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root{--navy:#0a2239;--amber:#f59e0b;--ink:#172b3d;--muted:#64748b;--paper:#f4f7fa}
        body{font-family:Arial,sans-serif;color:var(--ink);background:var(--paper)}
        .navy{background:var(--navy)}
        .hero{background:linear-gradient(125deg,#0a2239,#163b5c);color:white;padding:72px 0 64px}
        .eyebrow{color:#ffc247;font-size:.78rem;font-weight:800;letter-spacing:.16em;text-transform:uppercase}
        .team-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:22px}
        .person{height:100%;overflow:hidden;border:1px solid #e1e8ef;border-radius:14px;background:white;box-shadow:0 10px 30px #0a22390b;transition:transform .2s,box-shadow .2s}
        .person:hover{transform:translateY(-4px);box-shadow:0 16px 34px #0a22391a}
        .portrait{width:100%;aspect-ratio:3/3.25;object-fit:cover;background:#e9eff4}
        .avatar{display:grid;place-items:center;width:100%;aspect-ratio:3/3.25;background:linear-gradient(145deg,#edf3f7,#d8e4ec 55%,#f7f1e5);color:var(--navy);font-size:3.2rem;font-weight:800;letter-spacing:.04em}
        .person-info{padding:19px}
        .position{color:#174b72;font-weight:700}
        .department{display:inline-flex;align-items:center;gap:6px;margin-top:8px;padding:5px 10px;border-radius:30px;background:#eef3f7;color:#42576a;font-size:.8rem;font-weight:600}
        .bio{display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:3;overflow:hidden;color:var(--muted);font-size:.9rem;line-height:1.55}
        .filter-select{max-width:320px;border-color:#d5dfe7}
        .cta{border-radius:16px;background:white;border:1px solid #e1e8ef}
        footer{background:#071a2b;color:#dbe5ec}
        @media(max-width:991px){.team-grid{grid-template-columns:repeat(3,minmax(0,1fr))}}
        @media(max-width:700px){.team-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:14px}.person-info{padding:14px}.hero{padding:54px 0 48px}}
        @media(max-width:420px){.team-grid{grid-template-columns:1fr}.portrait,.avatar{aspect-ratio:4/3}}
    </style>
</head>
<body>
    <header class="navy py-3 text-white">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="text-white text-decoration-none fw-bold" href="/">{{ $info?->name_vi ?: 'PANECO' }}</a>
            <a class="btn btn-outline-light btn-sm" href="/">Quay lại trang chủ</a>
        </div>
    </header>
    <main>
        <section class="hero">
            <div class="container">
                <p class="eyebrow mb-3">Con người Paneco</p>
                <h1 class="display-5 fw-bold mb-3">Đội ngũ kỹ sư Paneco</h1>
                <p class="lead text-white-50 mb-0">Những con người cùng tạo nên năng lực chuyên môn và chất lượng trong từng dự án.</p>
            </div>
        </section>
        <section class="container py-5">
            <div class="d-flex flex-wrap justify-content-between align-items-end gap-3 mb-4">
                <div>
                    <h2 class="h3 fw-bold mb-1" style="color:var(--navy)">Thành viên của chúng tôi</h2>
                    <p class="text-secondary mb-0">{{ $employees->count() }} thành viên đang được giới thiệu</p>
                </div>
                @if($departments->isNotEmpty())
                    <form method="GET" action="{{ route('team') }}">
                        <label class="visually-hidden" for="department">Lọc theo phòng ban</label>
                        <select class="form-select filter-select" id="department" name="department" onchange="this.form.submit()">
                            <option value="">Tất cả phòng ban</option>
                            @foreach($departments as $item)
                                <option value="{{ $item }}" @selected($department === $item)>{{ $item }}</option>
                            @endforeach
                        </select>
                    </form>
                @endif
            </div>

            @if($employees->isNotEmpty())
                <div class="team-grid">
                    @foreach($employees as $employee)
                        <article class="person">
                            @if($employee->photo)
                                <img class="portrait" src="{{ asset('storage/'.$employee->photo) }}" alt="Ảnh {{ $employee->full_name }}" loading="lazy">
                            @else
                                @php($initials = collect(preg_split('/\s+/', trim($employee->full_name)))->filter()->take(2)->map(fn ($word) => mb_substr($word, 0, 1))->implode(''))
                                <div class="avatar" aria-label="{{ $employee->full_name }}">{{ mb_strtoupper($initials) }}</div>
                            @endif
                            <div class="person-info">
                                <h3 class="h5 fw-bold mb-2">{{ $employee->full_name }}</h3>
                                <div class="position">{{ $employee->position }}</div>
                                @if($employee->department)
                                    <div class="department"><i class="bi bi-diagram-3"></i>{{ $employee->department }}</div>
                                @endif
                                @if($employee->bio)
                                    <p class="bio mt-3 mb-0">{{ $employee->bio }}</p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="cta p-5 text-center">
                    <div class="display-5 mb-3" style="color:var(--amber)"><i class="bi bi-people"></i></div>
                    <h2 class="h4 fw-bold" style="color:var(--navy)">Đang cập nhật đội ngũ</h2>
                    <p class="text-secondary mb-0">Thông tin thành viên sẽ được giới thiệu tại đây.</p>
                </div>
            @endif

            <section class="cta mt-5 p-4 p-md-5 text-center">
                <p class="eyebrow mb-2" style="color:#a96a00">Cùng tạo nên những công trình tốt hơn</p>
                <h2 class="h3 fw-bold" style="color:var(--navy)">Kết nối với đội ngũ Paneco</h2>
                <p class="text-secondary mx-auto" style="max-width:650px">Paneco trân trọng cơ hội hợp tác và trao đổi về các dự án, giải pháp kỹ thuật phù hợp.</p>
                <a class="btn btn-warning fw-bold px-4" href="/#contact">Liên hệ Paneco <i class="bi bi-arrow-right ms-1"></i></a>
            </section>
        </section>
    </main>
    <footer class="py-4 text-center">© {{ now()->year }} {{ $info?->name_vi ?: 'Paneco' }}</footer>
</body>
</html>
