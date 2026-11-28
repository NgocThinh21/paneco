<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $info?->slogan ?: 'Website giới thiệu Paneco' }}">
    <title>{{ $info?->name_vi ?: 'Paneco' }} | {{ $info?->slogan ?: 'Triển khai bản vẽ kỹ thuật' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <style>
        :root{--navy:#0a2540;--blue:#1b365d;--amber:#f59e0b;--paper:#f5f7fa;--ink:#1e293b;--muted:#64748b}*{scroll-margin-top:85px}body{font-family:Roboto,sans-serif;color:var(--ink);overflow-x:hidden}h1,h2,h3,.navbar-brand{font-family:Montserrat,sans-serif}.navbar{background:#fff;box-shadow:0 2px 15px #0a254012}.navbar-brand{font-weight:800;color:var(--navy);letter-spacing:.04em}.navbar-brand img{max-height:46px;max-width:160px;object-fit:contain}.nav-link{color:var(--navy);font-weight:600}.nav-cta{background:var(--navy);color:#fff!important;border-radius:6px}.hero{position:relative;isolation:isolate;min-height:520px;display:flex;align-items:center;color:#fff;background:linear-gradient(110deg,#0a2540f2,#1b365dcf),url('https://images.unsplash.com/photo-1504307651254-35680f356dfd?auto=format&fit=crop&w=1800&q=80') center/cover;padding:100px 0}.hero h1{max-width:850px;font-size:clamp(2.2rem,5vw,4.4rem);font-weight:800;line-height:1.14}.eyebrow{color:var(--amber);font-weight:800;letter-spacing:.14em;text-transform:uppercase;font-size:.8rem}.hero .lead{max-width:700px;color:#dbe5ec}.button-amber{display:inline-block;border:0;border-radius:6px;background:var(--amber);padding:13px 22px;color:var(--navy);text-decoration:none;font-weight:800}.button-outline{display:inline-block;border:1px solid #ffffff99;border-radius:6px;padding:12px 20px;color:#fff;text-decoration:none;font-weight:700}.section{padding:76px 0}.section-muted{background:var(--paper)}.section-title{font-weight:800;color:var(--navy)}.section-lead{color:var(--muted);max-width:740px}.demo-note{display:inline-block;background:#fff7e6;border:1px solid #f4d18d;border-radius:30px;padding:5px 11px;color:#845500;font-size:.74rem;font-weight:700}.tile,.person-card,.content-card{height:100%;background:#fff;border:1px solid #e3e9ef;border-radius:10px;overflow:hidden;box-shadow:0 8px 24px #0a25400b}.tile{padding:24px}.tile-icon{font-size:1.7rem;color:var(--amber)}.project-card img,.content-card img{width:100%;height:210px;object-fit:cover}.card-copy{padding:20px}.person-photo,.person-avatar{width:100%;aspect-ratio:4/3;object-fit:cover;background:#e5edf2}.person-avatar{display:grid;place-items:center;color:var(--blue);font-size:2.1rem;font-weight:800}.team-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px}.chip{display:inline-flex;padding:9px 14px;margin:4px;border:1px solid #dbe3e8;border-radius:5px;background:white;font-weight:600}.contact-band{background:var(--navy);color:#fff}.contact-band .section-title{color:#fff}.contact-value a{color:#fff;text-decoration:none;overflow-wrap:anywhere}footer{background:#071a2d;color:#dbe5ec;padding:28px 0}footer a{color:#fff}@media(max-width:991px){.team-grid{grid-template-columns:repeat(3,minmax(0,1fr))}}@media(max-width:650px){.hero{min-height:430px;padding:75px 0}.section{padding:56px 0}.team-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:12px}.card-copy,.tile{padding:14px}}
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg sticky-top"><div class="container">
    <a class="navbar-brand d-flex align-items-center gap-2" href="#home">@if($info?->logo)<img src="{{ asset('storage/'.$info->logo) }}" alt="{{ $info->name_vi }}">@else{{ $info?->name_vi ?: 'PANECO' }}@endif</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-label="Mở menu"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="nav"><div class="navbar-nav ms-auto align-items-lg-center gap-lg-2"><a class="nav-link" href="#about">Giới thiệu</a><a class="nav-link" href="#services">Dịch vụ</a><a class="nav-link" href="#projects">Dự án</a><a class="nav-link" href="{{ route('team') }}">Đội ngũ</a>@if($gallery->isNotEmpty())<a class="nav-link" href="#gallery">Hình ảnh</a>@endif @if($news->isNotEmpty() || $recruitments->isNotEmpty())<a class="nav-link" href="#news">Tin tức</a>@endif<a class="nav-link nav-cta px-3" href="#contact">Liên hệ</a></div></div>
</div></nav>
<main>
    @php($hero=$banners->first())
    <section class="hero" id="home" @if($hero?->image) style="background-image:linear-gradient(110deg,#0a2540eb,#1b365dc9),url('{{ asset('storage/'.$hero->image) }}')" @endif><div class="container">
        <div class="eyebrow mb-3">@if($hero?->badge_icon)<i class="{{ $hero->badge_icon }} me-2" aria-hidden="true"></i>@endif{{ $hero?->badge_text ?: 'Paneco · Việt Nam' }}</div><h1>{{ $hero?->title ?: ($info?->slogan ?: 'Triển khai bản vẽ kỹ thuật cho dự án Nhật Bản') }}</h1>
        <p class="lead mt-3 mb-4">{{ $hero?->description ?: ($info?->greeting ?: 'Paneco hoạt động tại Việt Nam, tiếp nhận dự án từ Nhật Bản và triển khai bản vẽ Shop Drawing, bản vẽ chi tiết gia công theo tài liệu thiết kế đầu vào.') }}</p>
        <a class="button-amber me-2" href="{{ $hero?->button1_link ?: '#services' }}">{{ $hero?->button1_text ?: 'Khám phá dịch vụ' }}</a><a class="button-outline" href="{{ $hero?->button2_link ?: '#contact' }}">{{ $hero?->button2_text ?: 'Liên hệ Paneco' }}</a>
        @unless($hero)
        <!-- <div class="mt-4">
            <span class="demo-note">
                <i class="bi bi-pencil-square"></i>
                 Nội dung mẫu — cập nhật trong Admin
                </span></div> -->
                @endunless
    </div></section>
    @if($heroHighlights->isNotEmpty())<section class="py-4 section-muted"><div class="container"><div class="row g-3">@foreach($heroHighlights as $item)<div class="col-sm-6 col-lg-3"><div class="tile"><i class="bi {{ $item->icon }} tile-icon"></i><h3 class="h6 fw-bold mt-3">{{ $item->title }}</h3><p class="small text-secondary mb-0">{{ $item->subtitle }}</p></div></div>@endforeach</div></div></section>@endif
    <section class="section" id="about">
        <div class="container"><div class="row align-items-center g-5">
            <div class="col-lg-6"><div class="eyebrow">Về Paneco</div>
            <h2 class="section-title mt-2">{{ $info?->name_vi ?: 'Đồng hành triển khai bản vẽ kỹ thuật' }}</h2>
            <p class="section-lead">{{ $info?->mission ?: 'Paneco tại Việt Nam phối hợp triển khai bản vẽ Shop Drawing và bản vẽ chi tiết gia công dựa trên tài liệu thiết kế của dự án Nhật Bản.' }}</p>@if($info?->vision)<h3 class="h5 mt-4">Định hướng</h3><p class="text-secondary">{{ $info->vision }}</p>@endif @if(! $info?->mission)
    <!-- <span class="demo-note">Nội dung giới thiệu mẫu — sửa trong Admin</span> -->
    @endif</div><div class="col-lg-6">@if($info?->about_image)<img class="w-100 rounded-3 shadow-sm" style="max-height:370px;object-fit:cover" src="{{ asset('storage/'.$info->about_image) }}" alt="Giới thiệu Paneco">@else<div class="rounded-3 d-grid text-center p-5" style="min-height:280px;place-content:center;background:linear-gradient(135deg,#e8eef2,#c9d9e1);color:var(--navy)"><i class="bi bi-rulers display-3"></i><div class="mt-3 fw-semibold">Ảnh giới thiệu công ty<br><small class="fw-normal">Tải ảnh lên Admin</small></div></div>@endif</div></div>
    @if($coreValues->isNotEmpty())<div class="row g-3 mt-4">@foreach($coreValues as $value)<div class="col-md-4"><div class="tile"><i class="bi {{ $value->icon ?: 'bi-check-circle' }} tile-icon"></i><h3 class="h6 fw-bold mt-3">{{ $value->title }}</h3><p class="text-secondary small mb-0">{{ $value->description }}</p></div></div>@endforeach</div>@endif</div></section>
    <section class="section section-muted" id="services"><div class="container"><div class="text-center mb-5"><div class="eyebrow">Năng lực triển khai</div><h2 class="section-title">Dịch vụ của Paneco</h2><p class="section-lead mx-auto">Cập nhật phạm vi dịch vụ thực tế trong Admin trước khi công bố.</p></div><div class="row g-4">
        @forelse($services as $service)<div class="col-md-6 col-lg-4"><article class="tile"><i class="bi {{ $service->icon ?: 'bi-vector-pen' }} tile-icon"></i><h3 class="h5 fw-bold mt-3">{{ $service->title }}</h3><p class="text-secondary mb-0">{{ $service->description }}</p></article></div>
        @empty @foreach([['Bản vẽ Shop Drawing','Triển khai bản vẽ theo hồ sơ đầu vào của dự án.'],['Bản vẽ chi tiết gia công','Thể hiện chi tiết cấu kiện theo tài liệu thiết kế.'],['Hỗ trợ triển khai bản vẽ','Phối hợp theo phạm vi đã thống nhất với khách hàng.']] as [$title,$description])<div class="col-md-6 col-lg-4"><article class="tile"><i class="bi bi-vector-pen tile-icon"></i><h3 class="h5 fw-bold mt-3">{{ $title }}</h3><p class="text-secondary">{{ $description }}</p><span class="demo-note">Nội dung minh họa</span></article></div>@endforeach @endforelse
    </div>@if($softwares->isNotEmpty())<div class="text-center mt-5"><h3 class="h5 fw-bold">Phần mềm và công cụ</h3>@foreach($softwares as $software)<span class="chip">{{ $software->name }} · {{ $software->category }}</span>@endforeach</div>@endif</div></section>
    <section class="section" id="projects"><div class="container"><div class="text-center mb-5"><div class="eyebrow">Sản phẩm công việc</div><h2 class="section-title">Dự án tiêu biểu</h2><p class="section-lead mx-auto">Chỉ đăng dự án và hình ảnh Paneco được phép công bố.</p></div><div class="row g-4">
        @forelse($projects as $project)<div class="col-md-6 col-lg-4"><article class="tile p-0">@if($project->thumbnail)<img class="w-100" style="height:210px;object-fit:cover" src="{{ asset('storage/'.$project->thumbnail) }}" alt="{{ $project->title }}" loading="lazy">@else<div class="d-grid" style="height:210px;place-items:center;background:#e8eef2;color:var(--blue);font-size:3rem"><i class="bi bi-buildings"></i></div>@endif<div class="card-copy"><span class="demo-note">{{ $project->category==='steel'?'Kết cấu thép':'BIM' }} · {{ $project->year }}</span><h3 class="h5 fw-bold mt-3">{{ $project->title }}</h3><p class="text-secondary">{{ $project->work_detail }}</p><p class="small text-secondary mb-0">{{ $project->description }}</p></div></article></div>
        @empty @foreach([['Bản vẽ Shop Drawing','photo-1504307651254-35680f356dfd'],['Bản vẽ chi tiết gia công','photo-1581092921461-eab62e97a780'],['Triển khai hồ sơ kỹ thuật','photo-1581092160562-40aa08e78837']] as [$title,$image])<div class="col-md-6 col-lg-4"><article class="tile p-0"><img class="w-100" style="height:210px;object-fit:cover" src="https://images.unsplash.com/{{ $image }}?auto=format&fit=crop&w=900&q=80" alt="Hình minh họa {{ $title }}" loading="lazy"><div class="card-copy"><span class="demo-note">Dữ liệu và ảnh minh họa</span><h3 class="h5 fw-bold mt-3">{{ $title }}</h3><p class="text-secondary mb-0">Thay bằng dự án Paneco được phép công bố tại Admin.</p></div></article></div>@endforeach @endforelse
    </div></div></section>
    <section class="section section-muted" id="team">
        <div class="container">
            <div class="text-center mb-5">
                <div class="eyebrow">Con người Paneco</div>
                <h2 class="section-title">Đội ngũ nổi bật</h2>
                <p class="section-lead mx-auto">Những kỹ sư và chuyên gia đang đồng hành cùng các dự án của Paneco.</p>
            </div>
            @if($employees->isNotEmpty())
                <div class="team-grid">
                    @foreach($employees as $employee)
                        <article class="person-card">
                            @if($employee->photo)
                                <img class="person-photo" src="{{ asset('storage/'.$employee->photo) }}" alt="Ảnh {{ $employee->full_name }}" loading="lazy">
                            @else
                                <div class="person-avatar">{{ \Illuminate\Support\Str::upper(\Illuminate\Support\Str::substr($employee->full_name, 0, 1)) }}</div>
                            @endif
                            <div class="card-copy">
                                <h3 class="h6 fw-bold mb-1">{{ $employee->full_name }}</h3>
                                <p class="small fw-semibold mb-1" style="color:var(--blue)">{{ $employee->position }}</p>
                                @if($employee->department)
                                    <p class="small text-secondary mb-2">{{ $employee->department }}</p>
                                @endif
                                @if($employee->bio)
                                    <p class="small text-secondary mb-0">{{ $employee->bio }}</p>
                                @endif
                            </div>
                        </article>
                    @endforeach
                </div>
            @else
                <div class="rounded-3 border bg-white p-4 text-center text-secondary">Chưa có thành viên nổi bật được chọn. Hãy bật lựa chọn này trong Admin.</div>
            @endif
            <div class="text-center mt-4"><a class="button-amber" href="{{ route('team') }}">Xem tất cả 23 thành viên <i class="bi bi-arrow-right ms-1"></i></a></div>
        </div>
    </section>
    @if($recruitments->isNotEmpty() || $news->isNotEmpty())<section class="section" id="news"><div class="container"><div class="row g-5"><div class="col-lg-6"><div class="eyebrow">Cơ hội nghề nghiệp</div><h2 class="section-title mb-4">Tuyển dụng</h2>@forelse($recruitments as $job)<article class="tile mb-3"><span class="badge text-bg-success">Đang tuyển</span><h3 class="h5 fw-bold mt-3">{{ $job->title }}</h3><p class="text-secondary">{{ $job->location }} @if($job->quantity)· {{ $job->quantity }} vị trí@endif</p><p class="mb-0">{{ $job->description }}</p></article>@empty<p>Hiện chưa có vị trí tuyển dụng.</p>@endforelse</div><div class="col-lg-6"><div class="eyebrow">Cập nhật</div><h2 class="section-title mb-4">Tin tức</h2>@forelse($news as $article)<article class="tile mb-3"><small class="text-secondary">{{ $article->published_at?->format('d/m/Y') }}</small><h3 class="h5 fw-bold mt-2">{{ $article->title }}</h3><p class="mb-0 text-secondary">{{ $article->summary }}</p></article>@empty<p>Chưa có bài viết.</p>@endforelse</div></div></div></section>@endif
    @if($partners->isNotEmpty())<section class="section section-muted"><div class="container text-center"><div class="eyebrow">Kết nối</div><h2 class="section-title mb-4">Khách hàng và đối tác</h2><div class="d-flex justify-content-center flex-wrap gap-4">@foreach($partners as $partner)<div class="p-3 bg-white rounded-3 border">@if($partner->logo)<img src="{{ asset('storage/'.$partner->logo) }}" alt="{{ $partner->name }}" style="max-width:150px;max-height:70px;object-fit:contain">@else<strong>{{ $partner->name }}</strong>@endif</div>@endforeach</div></div></section>@endif
    @if($gallery->isNotEmpty())<section class="section" id="gallery"><div class="container text-center"><div class="eyebrow">Hình ảnh</div><h2 class="section-title mb-4">Thư viện hình ảnh</h2><div class="row g-3">@foreach($gallery as $image)<div class="col-6 col-md-4 col-lg-3"><img src="{{ asset('storage/'.$image) }}" alt="Hình ảnh Paneco" class="w-100 rounded-3" style="height:190px;object-fit:cover" loading="lazy"></div>@endforeach</div></div></section>@endif
    <section class="section contact-band" id="contact"><div class="container"><div class="row g-5"><div class="col-lg-5"><div class="eyebrow">Kết nối với Paneco</div><h2 class="section-title">Liên hệ</h2><p class="text-white-50">Gửi thông tin để Paneco liên hệ lại.</p>
        @if($info?->phone)<p class="contact-value"><i class="bi bi-telephone me-2 text-warning"></i><a href="tel:{{ $info->phone }}">{{ $info->phone }}</a></p>@endif @if($info?->phone_2)<p><a href="tel:{{ $info->phone_2 }}">{{ $info->phone_2 }}</a></p>@endif @if($info?->email)<p class="contact-value"><i class="bi bi-envelope me-2 text-warning"></i><a href="mailto:{{ $info->email }}">{{ $info->email }}</a></p>@endif @if($info?->zalo_link)<p><a class="text-white" href="{{ $info->zalo_link }}" rel="noopener">Zalo Paneco</a></p>@endif @foreach($offices as $office)<div class="mt-3"><strong>{{ $office->name }}</strong><div class="text-white-50">{{ $office->address }}</div></div>@endforeach
    </div><div class="col-lg-7"><form method="POST" action="{{ route('contact.store') }}" class="rounded-3 bg-white p-4 text-dark">@csrf @if(session('contact_success'))<div class="alert alert-success">{{ session('contact_success') }}</div>@endif @if($errors->any())<div class="alert alert-danger">Vui lòng kiểm tra lại thông tin.</div>@endif
        <div class="row g-3"><div class="col-md-6"><label class="form-label" for="full_name">Họ tên *</label><input class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" required maxlength="255">@error('full_name')<small class="text-danger">{{ $message }}</small>@enderror</div><div class="col-md-6"><label class="form-label" for="phone">Điện thoại *</label><input class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required maxlength="50">@error('phone')<small class="text-danger">{{ $message }}</small>@enderror</div><div class="col-md-6"><label class="form-label" for="email">Email</label><input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" maxlength="255"></div><div class="col-md-6"><label class="form-label" for="purpose">Mục đích liên hệ</label><select class="form-select" id="purpose" name="purpose"><option value="">Chọn nội dung</option><option>Tư vấn dịch vụ</option><option>Hợp tác</option><option>Ứng tuyển</option><option>Khác</option></select></div><div class="col-12"><label class="form-label" for="message">Nội dung *</label><textarea class="form-control" id="message" name="message" rows="4" required maxlength="5000">{{ old('message') }}</textarea>@error('message')<small class="text-danger">{{ $message }}</small>@enderror</div><div class="d-none"><label for="website">Website</label><input id="website" name="website" tabindex="-1" autocomplete="off"></div><div class="col-12"><button class="button-amber" type="submit">Gửi yêu cầu</button></div></div>
    </form></div></div></div></section>
</main>
<footer><div class="container d-flex flex-wrap justify-content-between gap-2"><span>© {{ now()->year }} {{ $info?->name_vi ?: 'Paneco' }}</span><a href="#home">Về đầu trang ↑</a></div></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body></html>
