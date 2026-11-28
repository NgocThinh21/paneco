<?php

namespace Tests\Feature;

use App\Models\CompanyInfo;
use App\Models\Contact;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class CompanyAndTeamTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_shows_company_and_visible_team_members(): void
    {
        CompanyInfo::create([
            'name_vi' => 'Paneco Việt Nam',
            'slogan' => 'Triển khai bản vẽ kỹ thuật',
            'mission' => 'Nhận dự án từ Nhật Bản.',
        ]);

        Employee::create([
            'full_name' => 'Thành viên đang hiển thị',
            'position' => 'Kỹ thuật viên bản vẽ',
            'is_visible' => true,
        ]);

        Employee::create([
            'full_name' => 'Thành viên đang ẩn',
            'position' => 'Kỹ thuật viên bản vẽ',
            'is_visible' => false,
        ]);

        $response = $this->get('/');

        $response->assertOk()
            ->assertSee('Paneco Việt Nam')
            ->assertSee('Thành viên đang hiển thị')
            ->assertDontSee('Thành viên đang ẩn');
    }

    public function test_company_and_team_admin_pages_require_login(): void
    {
        $this->get(route('admin.info.index'))->assertRedirect(route('login'));
        $this->get(route('admin.employees.index'))->assertRedirect(route('login'));
    }

    public function test_authenticated_admin_can_open_company_and_team_screens(): void
    {
        $this->actingAs(User::factory()->create());

        $this->get(route('admin.info.index'))->assertOk();
        $this->get(route('admin.employees.index'))->assertOk();
        $this->get(route('admin.employees.create'))->assertOk();
    }

    public function test_valid_admin_login_redirects_to_company_information(): void
    {
        User::factory()->create([
            'email' => 'admin@paneco.test',
            'password' => 'a-secure-test-password',
        ]);

        $this->post(route('login.store'), [
            'email' => 'admin@paneco.test',
            'password' => 'a-secure-test-password',
        ])->assertRedirect(route('admin.info.index'));
    }

    public function test_admin_can_save_company_information(): void
    {
        $this->actingAs(User::factory()->create());

        $response = $this->put(route('admin.info.update'), [
            'name_vi' => 'Paneco Việt Nam',
            'slogan' => 'Bản vẽ kỹ thuật cho dự án Nhật Bản',
            'email' => 'contact@paneco.example',
        ]);

        $response->assertRedirect(route('admin.info.index'));
        $this->assertDatabaseHas('company_infos', [
            'name_vi' => 'Paneco Việt Nam',
            'email' => 'contact@paneco.example',
        ]);
    }

    public function test_admin_can_create_update_and_delete_team_member(): void
    {
        $this->actingAs(User::factory()->create());

        $this->post(route('admin.employees.store'), [
            'full_name' => 'Thành viên thử nghiệm',
            'position' => 'Kỹ thuật viên bản vẽ',
            'department' => 'Triển khai bản vẽ',
            'sort_order' => 1,
            'is_visible' => '1',
        ])->assertRedirect(route('admin.employees.index'));

        $employee = Employee::query()->where('full_name', 'Thành viên thử nghiệm')->firstOrFail();

        $this->get(route('admin.employees.edit', $employee))->assertOk();

        $this->put(route('admin.employees.update', $employee), [
            'full_name' => 'Thành viên đã cập nhật',
            'position' => 'Nhân viên triển khai',
            'department' => 'Triển khai bản vẽ',
            'sort_order' => 2,
            'is_visible' => '1',
        ])->assertRedirect(route('admin.employees.index'));

        $this->assertDatabaseHas('employees', [
            'id' => $employee->id,
            'full_name' => 'Thành viên đã cập nhật',
        ]);

        $this->delete(route('admin.employees.destroy', $employee))
            ->assertRedirect(route('admin.employees.index'));

        $this->assertDatabaseMissing('employees', ['id' => $employee->id]);
    }

    public function test_admin_can_upload_a_team_member_photo(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create());
        $image = UploadedFile::fake()->createWithContent(
            'member.png',
            base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jU5sAAAAASUVORK5CYII='),
        );

        $this->post(route('admin.employees.store'), [
            'full_name' => 'Thành viên có ảnh',
            'position' => 'Kỹ thuật viên bản vẽ',
            'photo' => $image,
            'is_visible' => '1',
        ])->assertRedirect(route('admin.employees.index'));

        $employee = Employee::query()->where('full_name', 'Thành viên có ảnh')->firstOrFail();
        Storage::disk('public')->assertExists($employee->photo);
    }

    public function test_invalid_team_member_data_is_not_saved(): void
    {
        $this->actingAs(User::factory()->create());

        $this->post(route('admin.employees.store'), [])
            ->assertSessionHasErrors(['full_name', 'position']);

        $this->assertDatabaseCount('employees', 0);
    }

    public function test_admin_can_open_each_content_management_area(): void
    {
        $this->actingAs(User::factory()->create());

        foreach (['banners', 'highlights', 'services', 'projects', 'news', 'recruitments', 'partners', 'offices', 'values', 'softwares'] as $section) {
            $this->get(route('admin.content.index', $section))->assertOk();
            $this->get(route('admin.content.create', $section))->assertOk();
        }

        $this->get(route('admin.media.index'))->assertOk();
        $this->get(route('admin.contacts.index'))->assertOk();
        $this->get(route('team'))->assertOk();
    }

    public function test_admin_can_manage_public_website_content_using_existing_tables(): void
    {
        $this->actingAs(User::factory()->create());

        $this->post(route('admin.content.store', 'services'), [
            'title' => 'Shop Drawing', 'description' => 'Dịch vụ mẫu để kiểm tra.', 'sort_order' => 1,
        ])->assertRedirect(route('admin.content.index', 'services'));
        $this->assertDatabaseHas('services', ['title' => 'Shop Drawing']);

        $this->post(route('admin.content.store', 'projects'), [
            'title' => 'Dự án minh họa', 'category' => 'steel', 'year' => 2026, 'is_visible' => 1,
        ])->assertRedirect(route('admin.content.index', 'projects'));
        $this->assertDatabaseHas('projects', ['title' => 'Dự án minh họa', 'slug' => 'du-an-minh-hoa']);

        $this->post(route('admin.content.store', 'news'), [
            'title' => 'Tin mẫu', 'summary' => 'Nội dung thử nghiệm.', 'published_at' => '2026-11-28', 'is_visible' => 1,
        ])->assertRedirect(route('admin.content.index', 'news'));
        $this->assertDatabaseHas('news', ['title' => 'Tin mẫu', 'slug' => 'tin-mau']);

        $this->post(route('admin.content.store', 'recruitments'), [
            'title' => 'Vị trí mẫu', 'quantity' => 1, 'is_active' => 1,
        ])->assertRedirect(route('admin.content.index', 'recruitments'));
        $this->assertDatabaseHas('recruitments', ['title' => 'Vị trí mẫu', 'is_active' => 1]);

        $this->post(route('admin.content.store', 'partners'), ['name' => 'Đối tác mẫu'])
            ->assertRedirect(route('admin.content.index', 'partners'));
        $this->assertDatabaseHas('partners', ['name' => 'Đối tác mẫu']);

        $this->post(route('admin.content.store', 'banners'), ['title' => 'Banner minh họa'])
            ->assertRedirect(route('admin.content.index', 'banners'));
        $this->assertDatabaseHas('banners', ['title' => 'Banner minh họa']);

        $this->post(route('admin.content.store', 'highlights'), ['icon' => 'bi-check', 'title' => 'Điểm nổi bật'])
            ->assertRedirect(route('admin.content.index', 'highlights'));
        $this->assertDatabaseHas('hero_highlights', ['title' => 'Điểm nổi bật']);

        $this->post(route('admin.content.store', 'offices'), ['name' => 'Văn phòng mẫu', 'address' => 'Địa chỉ minh họa'])
            ->assertRedirect(route('admin.content.index', 'offices'));
        $this->assertDatabaseHas('offices', ['name' => 'Văn phòng mẫu']);

        $this->post(route('admin.content.store', 'values'), ['title' => 'Giá trị mẫu', 'description' => 'Mô tả minh họa'])
            ->assertRedirect(route('admin.content.index', 'values'));
        $this->assertDatabaseHas('core_values', ['title' => 'Giá trị mẫu']);

        $this->post(route('admin.content.store', 'softwares'), ['name' => 'Công cụ mẫu', 'category' => 'Minh họa'])
            ->assertRedirect(route('admin.content.index', 'softwares'));
        $this->assertDatabaseHas('softwares', ['name' => 'Công cụ mẫu']);
    }

    public function test_public_contact_form_saves_message_and_admin_can_mark_it_read(): void
    {
        $this->post(route('contact.store'), [
            'full_name' => 'Khách xem website', 'phone' => '0900000000', 'email' => 'guest@example.test',
            'purpose' => 'Tư vấn dịch vụ', 'message' => 'Xin liên hệ giúp tôi.',
        ])->assertRedirect('/#contact')->assertSessionHas('contact_success');

        $contact = Contact::query()->firstOrFail();
        $this->assertDatabaseHas('contacts', ['id' => $contact->id, 'full_name' => 'Khách xem website', 'is_read' => 0]);

        $this->actingAs(User::factory()->create())
            ->put(route('admin.contacts.read', $contact))
            ->assertRedirect(route('admin.contacts.index'));
        $this->assertDatabaseHas('contacts', ['id' => $contact->id, 'is_read' => 1]);
    }

    public function test_admin_can_upload_a_gallery_image(): void
    {
        Storage::fake('public');
        $this->actingAs(User::factory()->create());
        $image = UploadedFile::fake()->createWithContent(
            'gallery.png',
            base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jU5sAAAAASUVORK5CYII='),
        );

        $this->post(route('admin.media.store'), ['images' => [$image]])
            ->assertRedirect(route('admin.media.index'));
        $this->assertCount(1, Storage::disk('public')->files('gallery'));
    }

    public function test_team_admin_does_not_allow_more_than_23_profiles(): void
    {
        for ($number = 1; $number <= 23; $number++) {
            Employee::create(['full_name' => 'Test '.$number, 'position' => 'Thành viên']);
        }

        $this->actingAs(User::factory()->create())
            ->post(route('admin.employees.store'), ['full_name' => 'Người thứ 24', 'position' => 'Thành viên'])
            ->assertSessionHasErrors('full_name');

        $this->assertDatabaseCount('employees', 23);
    }
}
