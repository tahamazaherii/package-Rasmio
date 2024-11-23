<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use App\Services\RasmioService;
use Illuminate\Http\Response;
use Mockery;

class RasmioTest extends TestCase
{
    use RefreshDatabase;

    protected $RasmioService;

    protected function setUp(): void
    {
        parent::setUp();

        // Mock کردن سرویس RasmioService
        $this->RasmioService = Mockery::mock(RasmioService::class);
        $this->app->instance(RasmioService::class, $this->RasmioService);
    }

    /** @test */
    public function it_validates_company_id_in_company_info_request()
    {
        // ارسال درخواست بدون پارامتر companyID در URL
        $response = $this->json('GET', '/rasmio/getInfo/company');
     
        // بررسی خطای اعتبارسنجی برای عدم وجود companyID
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors(['companyID']);
    }

    /** @test */
    public function it_returns_company_info()
    {
        // تنظیم پاسخ mock برای سرویس RasmioService
        $this->RasmioService->shouldReceive('CompanyInfo')
            ->with('14009396050') // شماره شرکت مورد انتظار
            ->once()
            ->andReturn(json_encode(['company' => 'Sample Company', 'id' => '14009396050']));

        // ارسال درخواست به روت companyInfo و پارامتر companyID را در URL می‌دهیم
        $response = $this->json('GET', '/rasmio/getInfo/company', [
            'companyID' => '14009396050', // ارسال companyID به عنوان پارامتر URL
        ]);


        // بررسی وضعیت و داده‌های پاسخ
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'company' => 'Sample Company',
            'id' => '14009396050'
        ]);
    }

    /** @test */
    public function it_returns_company_news_info()
    {
        // تنظیم پاسخ mock برای سرویس RasmioService
        $this->RasmioService->shouldReceive('CompanyNewsInfo')
            ->with('14009396050') // شماره شرکت مورد انتظار
            ->once()
            ->andReturn(json_encode(['news' => 'Sample news for company 14009396050', 'id' => '14009396050']));

        // ارسال درخواست به روت companyNewsInfo و پارامتر companyID را در URL می‌دهیم
        $response = $this->json('GET', '/rasmio/getInfo/companyNews', [
            'companyID' => '14009396050', // ارسال companyID به عنوان پارامتر URL
        ]);

        // بررسی وضعیت و داده‌های پاسخ
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'news' => 'Sample news for company 14009396050',
            'id' => '14009396050'
        ]);
    }
}
