@extends('layouts.simple-admin')

@section('page_title', 'Yêu cầu liên hệ | Quản trị Paneco')

@section('content')
<div class="mb-6"><h1 class="text-2xl font-bold">Yêu cầu liên hệ</h1><p class="mt-1 text-sm text-slate-600">Thông tin do khách gửi từ biểu mẫu website.</p></div>
<div class="space-y-4">
@forelse($contacts as $contact)
    <article class="rounded-lg bg-white p-5 shadow-sm {{ $contact->is_read ? 'opacity-75' : 'border-l-4 border-amber-400' }}">
        <div class="flex flex-wrap items-start justify-between gap-3"><div><h2 class="font-bold">{{ $contact->full_name }} <span class="text-sm font-normal text-slate-500">{{ $contact->is_read ? '· Đã xem' : '· Chưa xem' }}</span></h2><p class="mt-1 text-sm text-slate-600">{{ $contact->phone }} @if($contact->email) · {{ $contact->email }} @endif @if($contact->purpose) · {{ $contact->purpose }} @endif</p></div><time class="text-xs text-slate-500">{{ $contact->created_at->format('d/m/Y H:i') }}</time></div>
        <p class="mt-4 whitespace-pre-line">{{ $contact->message }}</p>
        @unless($contact->is_read)<form class="mt-4" method="POST" action="{{ route('admin.contacts.read', $contact) }}">@csrf @method('PUT')<button class="rounded bg-slate-900 px-3 py-2 text-sm font-semibold text-white">Đánh dấu đã xem</button></form>@endunless
    </article>
@empty<div class="rounded-lg bg-white p-8 text-center text-slate-500">Chưa nhận được yêu cầu liên hệ nào.</div>@endforelse
</div>
<div class="mt-5">{{ $contacts->links() }}</div>
@endsection
