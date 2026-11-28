@extends('layouts.simple-admin')

@section('page_title', ($record->exists ? 'Sửa ' : 'Thêm ').$config['label'].' | Quản trị Paneco')

@section('content')
<div class="mb-6"><a class="text-sm font-medium text-slate-600" href="{{ route('admin.content.index', $section) }}">← Quay lại {{ $config['label'] }}</a><h1 class="mt-3 text-2xl font-bold">{{ $record->exists ? 'Sửa' : 'Thêm' }}: {{ $config['label'] }}</h1><p class="mt-1 text-sm text-slate-600">Ảnh và nội dung minh họa có thể thay bằng thông tin chính thức trong Admin trước khi công bố.</p></div>
<form method="POST" enctype="multipart/form-data" action="{{ $record->exists ? route('admin.content.update', [$section, $record->getKey()]) : route('admin.content.store', $section) }}" class="max-w-3xl space-y-5 rounded-lg bg-white p-6 shadow-sm">
    @csrf
    @if ($record->exists) @method('PUT') @endif
    @foreach ($config['fields'] as $name => $definition)
        @php($type = $definition[1])
        @php($required = $definition[2] ?? false)
        <div>
            <label class="mb-1 block text-sm font-semibold" for="{{ $name }}">{{ $definition[0] }}@if($required) <span class="text-red-600">*</span>@endif</label>
            @if ($type === 'textarea')
                <textarea id="{{ $name }}" name="{{ $name }}" rows="5" @required($required) class="w-full rounded border-slate-300">{{ old($name, $record->{$name}) }}</textarea>
            @elseif ($type === 'select')
                <select id="{{ $name }}" name="{{ $name }}" @required($required) class="w-full rounded border-slate-300">
                    @foreach ($definition[3] as $value => $label)<option value="{{ $value }}" @selected((string) old($name, $record->{$name}) === (string) $value)>{{ $label }}</option>@endforeach
                </select>
            @elseif ($type === 'checkbox')
                <label class="inline-flex items-center gap-2"><input id="{{ $name }}" type="checkbox" name="{{ $name }}" value="1" @checked(old($name, $record->exists ? $record->{$name} : true)) class="rounded border-slate-300"><span class="text-sm">Bật mục này trên website</span></label>
            @elseif ($type === 'file')
                @if ($record->{$name})<img src="{{ asset('storage/'.$record->{$name}) }}" alt="Ảnh hiện tại" class="mb-3 max-h-48 rounded object-contain">@endif
                <input id="{{ $name }}" type="file" name="{{ $name }}" accept="image/*" class="block w-full rounded border border-slate-300 p-2">
            @else
                <input id="{{ $name }}" type="{{ $type }}" name="{{ $name }}" value="{{ old($name, $record->{$name}) }}" @required($required) class="w-full rounded border-slate-300">
            @endif
            @error($name)<p class="mt-1 text-sm text-red-700">{{ $message }}</p>@enderror
        </div>
    @endforeach
    <div class="flex gap-3"><button class="rounded bg-slate-900 px-5 py-2.5 font-semibold text-white">Lưu nội dung</button><a href="{{ route('admin.content.index', $section) }}" class="rounded border px-5 py-2.5">Hủy</a></div>
</form>
@endsection
