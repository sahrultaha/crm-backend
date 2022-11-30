<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\CustomDuskTestCase;

class ImsiTest extends CustomDuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function test_download_bulk_imsi()
    {
        $this->browse(function (Browser $browser) {
            $this->loginAsAdmin($browser);
            $browser->visit(env('FRONTEND_URL').'/imsi/upload')
                ->waitForText('File Template');
            $file = file_get_contents(env('FRONTEND_URL').$browser->element('#file-template')->getAttribute('href'));
            $sha1 = sha1($file);
            $this->assertEquals('5e54075da129658531852094e2f331e81e0f7ee5', $sha1);

            //$this->loginAsAdmin($browser);
            $browser->visit(env('FRONTEND_URL').'/imsi/upload')
                ->attach('#bulkUploadImsiFile', base_path('tests/Browser/files/csv/bulk-imsi.csv'))
                ->press('SUBMIT')
                ->waitForText('Successfully upload');
        });
    }
}
