<?php

namespace Tests\Browser;

use Facebook\WebDriver\WebDriverBy;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Http;
use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class ViewCustomersTest extends CustomDuskTestCase
{
    // use DatabaseMigrations;

    // public $seed = true;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
    }

    public function test_can_view_customers()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $this->createNewCustomer($browser);

            sleep(1);

            $elements = $browser->driver->findElements(WebDriverBy::tagName('img'));
            $this->assertCount(2, $elements);

            $img_elements = $browser->elements('img');

            $sample_file = base_path('tests/Browser/photos/600x300.png');
            $sample_file_size = filesize($sample_file);
            $sample_file_hash = hash_file('sha1', $sample_file);
            $temp_dir = base_path('tests/Browser/temp/');

            for ($i = 0; $i < count($img_elements) - 1; $i++) {
                $src = $img_elements[$i]->getAttribute('src');
                $response = Http::get($src);

                $test_file = "$temp_dir${i}.png";
                file_put_contents($test_file, $response->body());
                $this->assertEquals($sample_file_size, filesize($test_file));

                $test_file_hash = hash_file('sha1', $test_file);
                $this->assertEquals($sample_file_hash, $test_file_hash);
            }
        });
    }
}
