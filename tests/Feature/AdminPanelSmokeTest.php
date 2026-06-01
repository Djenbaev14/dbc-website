<?php

namespace Tests\Feature;

use App\Models\User;
use Filament\Facades\Filament;
use Livewire\Livewire;
use Tests\TestCase;

class AdminPanelSmokeTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Filament::setCurrentPanel(Filament::getPanel('admin'));
    }

    public function test_all_resource_pages_render_without_server_error(): void
    {
        $admin = User::where('username', 'admin')->firstOrFail();
        $this->actingAs($admin);

        $failures = [];

        foreach (Filament::getResources() as $resource) {
            $pages = array_keys($resource::getPages());

            foreach (['index', 'create'] as $page) {
                if (! in_array($page, $pages, true)) {
                    continue;
                }
                $url = $resource::getUrl($page);
                $status = $this->get($url)->status();
                if ($status !== 200) {
                    $failures[] = sprintf('%s [%s] -> %d  (%s)', class_basename($resource), $page, $status, $url);
                }
            }

            if (in_array('edit', $pages, true)) {
                $model = $resource::getModel();
                $record = $model::query()->first();
                if ($record) {
                    $url = $resource::getUrl('edit', ['record' => $record]);
                    $status = $this->get($url)->status();
                    if ($status >= 500) {
                        $failures[] = sprintf('%s [edit] -> %d  (%s)', class_basename($resource), $status, $url);
                    }
                }
            }
        }

        $this->assertEmpty(
            $failures,
            "Quyidagi admin sahifalarda 500 xato bor:\n" . implode("\n", $failures)
        );
    }

    public function test_edit_forms_save_without_errors(): void
    {
        $admin = User::where('username', 'admin')->firstOrFail();
        $this->actingAs($admin);

        $editPages = [
            \App\Filament\Resources\TopBannerResource\Pages\EditTopBanner::class,
            \App\Filament\Resources\CompanyStatResource\Pages\EditCompanyStat::class,
            \App\Filament\Resources\FooterSettingResource\Pages\EditFooterSetting::class,
            \App\Filament\Resources\PartnerResource\Pages\EditPartner::class,
            \App\Filament\Resources\ProjectResource\Pages\EditProject::class,
            \App\Filament\Resources\ServiceResource\Pages\EditService::class,
            \App\Filament\Resources\TeamResource\Pages\EditTeam::class,
            \App\Filament\Resources\FeedbackResource\Pages\EditFeedback::class,
            \App\Filament\Resources\ContactResource\Pages\EditContact::class,
        ];

        $failures = [];

        foreach ($editPages as $page) {
            try {
                // A validation failure halts gracefully (no throw); only a real
                // server error (e.g. a bad query) bubbles up as an exception.
                Livewire::test($page, ['record' => 1])->call('save');
            } catch (\Throwable $e) {
                $failures[] = class_basename($page) . ' -> ' . $e->getMessage();
            }
        }

        $this->assertEmpty(
            $failures,
            "Saqlashda server xato (500) chiqdi:\n" . implode("\n", $failures)
        );
    }
}
