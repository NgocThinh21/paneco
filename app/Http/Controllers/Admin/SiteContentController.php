<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\CoreValue;
use App\Models\HeroHighlight;
use App\Models\News;
use App\Models\Office;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Recruitment;
use App\Models\Service;
use App\Models\Software;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class SiteContentController extends Controller
{
    private const SECTIONS = [
        'banners' => ['label' => 'Banner trang chủ', 'model' => Banner::class, 'image' => 'image', 'folder' => 'banners', 'fields' => [
            'badge_text' => ['Nhãn nhỏ', 'text'], 'title' => ['Tiêu đề', 'text', true], 'description' => ['Mô tả', 'textarea'],
            'image' => ['Ảnh nền', 'file'], 'button1_text' => ['Nút chính', 'text'], 'button1_link' => ['Liên kết nút chính', 'text'],
            'button2_text' => ['Nút phụ', 'text'], 'button2_link' => ['Liên kết nút phụ', 'text'], 'sort_order' => ['Thứ tự', 'number'], 'is_active' => ['Đang hiển thị', 'checkbox'],
        ]],
        'highlights' => ['label' => 'Điểm nổi bật trang chủ', 'model' => HeroHighlight::class, 'fields' => [
            'icon' => ['Biểu tượng Bootstrap Icons', 'text', true], 'title' => ['Tiêu đề', 'text', true], 'subtitle' => ['Mô tả ngắn', 'text'], 'sort_order' => ['Thứ tự', 'number'], 'is_active' => ['Đang hiển thị', 'checkbox'],
        ]],
        'services' => ['label' => 'Dịch vụ', 'model' => Service::class, 'fields' => [
            'title' => ['Tên dịch vụ', 'text', true], 'description' => ['Mô tả', 'textarea', true], 'icon' => ['Biểu tượng Bootstrap Icons', 'text'], 'sort_order' => ['Thứ tự', 'number'],
        ]],
        'projects' => ['label' => 'Dự án', 'model' => Project::class, 'image' => 'thumbnail', 'folder' => 'projects', 'fields' => [
            'title' => ['Tên hiển thị', 'text', true], 'slug' => ['Đường dẫn rút gọn', 'text'], 'category' => ['Nhóm', 'select', true, ['steel' => 'Kết cấu thép', 'bim' => 'BIM']],
            'year' => ['Năm', 'number', true], 'scale_value' => ['Quy mô (nếu có)', 'number'], 'scale_unit' => ['Đơn vị quy mô', 'select', false, ['' => 'Không ghi', 'tan' => 'Tấn', 'm2' => 'm²']],
            'work_detail' => ['Hạng mục', 'text'], 'software' => ['Phần mềm (nếu có)', 'text'], 'description' => ['Mô tả', 'textarea'], 'thumbnail' => ['Ảnh dự án', 'file'],
            'is_featured' => ['Ưu tiên hiển thị', 'checkbox'], 'is_visible' => ['Đang hiển thị', 'checkbox'],
        ]],
        'news' => ['label' => 'Tin tức', 'model' => News::class, 'image' => 'thumbnail', 'folder' => 'news', 'fields' => [
            'title' => ['Tiêu đề', 'text', true], 'slug' => ['Đường dẫn rút gọn', 'text'], 'category' => ['Chuyên mục', 'text'], 'summary' => ['Tóm tắt', 'textarea'],
            'content' => ['Nội dung', 'textarea'], 'thumbnail' => ['Ảnh đại diện', 'file'], 'published_at' => ['Ngày đăng', 'date'], 'is_visible' => ['Đang hiển thị', 'checkbox'],
        ]],
        'recruitments' => ['label' => 'Tuyển dụng', 'model' => Recruitment::class, 'fields' => [
            'title' => ['Vị trí tuyển dụng', 'text', true], 'location' => ['Địa điểm', 'text'], 'quantity' => ['Số lượng', 'number'], 'description' => ['Mô tả công việc', 'textarea'],
            'requirements' => ['Yêu cầu', 'textarea'], 'deadline' => ['Hạn nhận hồ sơ', 'date'], 'is_active' => ['Đang tuyển', 'checkbox'],
        ]],
        'partners' => ['label' => 'Khách hàng và đối tác', 'model' => Partner::class, 'image' => 'logo', 'folder' => 'partners', 'fields' => [
            'name' => ['Tên hiển thị', 'text', true], 'logo' => ['Logo', 'file'], 'website' => ['Website', 'text'], 'sort_order' => ['Thứ tự', 'number'],
        ]],
        'offices' => ['label' => 'Văn phòng và liên hệ', 'model' => Office::class, 'fields' => [
            'name' => ['Tên địa điểm', 'text', true], 'address' => ['Địa chỉ', 'textarea', true], 'sort_order' => ['Thứ tự', 'number'],
        ]],
        'values' => ['label' => 'Giá trị cốt lõi', 'model' => CoreValue::class, 'fields' => [
            'title' => ['Tiêu đề', 'text', true], 'description' => ['Mô tả', 'textarea', true], 'icon' => ['Biểu tượng Bootstrap Icons', 'text'], 'sort_order' => ['Thứ tự', 'number'],
        ]],
        'softwares' => ['label' => 'Phần mềm và công cụ', 'model' => Software::class, 'fields' => [
            'name' => ['Tên phần mềm', 'text', true], 'vendor' => ['Nhà phát hành', 'text'], 'category' => ['Nhóm', 'text', true], 'sort_order' => ['Thứ tự', 'number'],
        ]],
    ];

    public function index(string $section): View
    {
        $config = $this->config($section);
        $query = $config['model']::query();
        if (isset($config['fields']['sort_order'])) {
            $query->orderBy('sort_order')->orderBy('id');
        } else {
            $query->latest();
        }
        $records = $query->get();

        return view('admin.content.index', compact('section', 'config', 'records'));
    }

    public function create(string $section): View
    {
        $config = $this->config($section);

        return view('admin.content.form', ['section' => $section, 'config' => $config, 'record' => new $config['model']]);
    }

    public function store(Request $request, string $section): RedirectResponse
    {
        $config = $this->config($section);
        $data = $this->validatedData($request, $section, $config);
        $this->storeImage($request, $config, $data);
        $data = $this->normalize($data, $config);
        $config['model']::create($data);

        return redirect()->route('admin.content.index', $section)->with('success', 'Đã thêm nội dung.');
    }

    public function edit(string $section, int $record): View
    {
        $config = $this->config($section);
        $item = $config['model']::query()->findOrFail($record);

        return view('admin.content.form', ['section' => $section, 'config' => $config, 'record' => $item]);
    }

    public function update(Request $request, string $section, int $record): RedirectResponse
    {
        $config = $this->config($section);
        $item = $config['model']::query()->findOrFail($record);
        $data = $this->validatedData($request, $section, $config, $item->getKey());
        $oldImage = isset($config['image']) ? $item->{$config['image']} : null;
        $this->storeImage($request, $config, $data);
        $item->update($this->normalize($data, $config));

        if ($oldImage && isset($config['image']) && $request->hasFile($config['image'])) {
            Storage::disk('public')->delete($oldImage);
        }

        return redirect()->route('admin.content.index', $section)->with('success', 'Đã cập nhật nội dung.');
    }

    public function destroy(string $section, int $record): RedirectResponse
    {
        $config = $this->config($section);
        $item = $config['model']::query()->findOrFail($record);
        $image = isset($config['image']) ? $item->{$config['image']} : null;
        $item->delete();

        if ($image) {
            Storage::disk('public')->delete($image);
        }

        return redirect()->route('admin.content.index', $section)->with('success', 'Đã xóa nội dung.');
    }

    private function config(string $section): array
    {
        abort_unless(isset(self::SECTIONS[$section]), 404);

        return self::SECTIONS[$section];
    }

    private function validatedData(Request $request, string $section, array $config, ?int $recordId = null): array
    {
        if (isset($config['fields']['slug']) && ! $request->filled('slug') && $request->filled('title')) {
            $request->merge(['slug' => Str::slug($request->input('title'))]);
        }

        $rules = [];
        foreach ($config['fields'] as $field => $definition) {
            $type = $definition[1];
            $required = $definition[2] ?? false;
            $rules[$field] = match ($type) {
                'file' => ['nullable', 'image', 'max:5120'],
                'number' => [$required ? 'required' : 'nullable', $field === 'year' || $field === 'quantity' || $field === 'sort_order' ? 'integer' : 'numeric', $field === 'year' ? 'between:1900,2155' : ($field === 'quantity' ? 'between:1,255' : ($field === 'sort_order' ? 'min:0' : 'min:0'))],
                'date' => ['nullable', 'date'],
                'checkbox' => ['nullable', 'boolean'],
                'select' => array_merge([$required ? 'required' : 'nullable'], [Rule::in(array_keys($definition[3]))]),
                default => [$required ? 'required' : 'nullable', 'string', $type === 'textarea' ? 'max:20000' : 'max:255'],
            };
        }
        if (isset($config['fields']['slug'])) {
            $table = (new $config['model'])->getTable();
            $rules['slug'] = ['nullable', 'string', 'max:255', Rule::unique($table, 'slug')->ignore($recordId)];
        }

        return $request->validate($rules);
    }

    private function storeImage(Request $request, array $config, array &$data): void
    {
        $imageField = $config['image'] ?? null;
        if ($imageField && $request->hasFile($imageField)) {
            $data[$imageField] = $request->file($imageField)->store($config['folder'], 'public');
        } elseif ($imageField) {
            unset($data[$imageField]);
        }
    }

    private function normalize(array $data, array $config): array
    {
        foreach ($config['fields'] as $field => $definition) {
            if ($definition[1] === 'checkbox') {
                $data[$field] = (bool) ($data[$field] ?? false);
            }
        }
        if (isset($config['fields']['slug']) && empty($data['slug']) && ! empty($data['title'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        return $data;
    }
}
