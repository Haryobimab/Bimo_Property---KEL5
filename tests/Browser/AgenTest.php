<?php

namespace Tests\Browser;

use App\Models\User;
use App\Models\Agen; // Pastikan untuk mengimpor model Agent
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AgenTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Setup the test environment.
     */
    public function setUp(): void
    {
        parent::setUp();

        // Buat pengguna untuk login
        User::factory()->create([
            'id' => 1,
            'name' => 'Test User',
            'username' => 'TestUser',
            'email' => 'testuser@example.com',
            'password' => bcrypt('password'),
            'level' => 'user',
            'photo' => 'sample.jpg',
        ]);

        // Buat data agen untuk testing
        
    }

    /**
     * A Dusk test example.
     * @group agen
     */
    public function testShowAgenPositive(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cariagen')
                ->pause(1000);
    
            // Ambil semua agen dari database
            $agen = Agen::all();
    
            // Periksa setiap agen dalam database
            $agen->each(function ($agenItem) use ($browser) {
                $browser->assertSee($agenItem->nama_agen)
                        ->assertSee($agenItem->deskripsi_agen)
                        ->assertSee($agenItem->alamat)
                        ->assertSee((string) $agenItem->rating); // Pastikan rating dalam bentuk string
            });
    
            $browser->screenshot('cariagen');
        });
    }

    /**
     * A Dusk test example.
     * @group agen
     */

    public function testFilterAgen(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('//cariagen?search=&region=Jakarta')
                ->pause(1000);
    
            // Ambil semua agen dari database
            $agens = Agen::where('alamat', 'Jakarta')->get();
    
            // Periksa setiap agen dalam database
            $agens->each(function ($agenItem) use ($browser) {
                $browser->assertSee($agenItem->nama_agen)
                        ->assertSee($agenItem->deskripsi_agen)
                        ->assertSee($agenItem->alamat)
                        ->assertSee((string) $agenItem->rating); // Pastikan rating dalam bentuk string
            });
    
            $browser->screenshot('cariagen');
        });
    }

    

}
