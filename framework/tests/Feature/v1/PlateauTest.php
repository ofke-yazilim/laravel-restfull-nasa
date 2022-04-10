<?php
/**
 * Nasıl oluşturuldu : php artisan make:test v1/PlateauTest --unit
 *
 * @author : okesmez
 * @date   : 10.04.2022 18:18
 */
namespace Tests\Feature\v1;

use App\Models\v1\Plateau;
use App\Models\v1\User;
use Illuminate\Support\Str;
use Tests\TestCase;

class PlateauTest extends TestCase
{
    private $plateau_id = 1;
    /**
     * Test Plateau ekleniyor
     *
     */
    public function test_can_create_post()
    {
        $master_user = User::where('email','info@okesmez.com')->first();

        $this->withHeaders([
            'Authorization' => 'Bearer '.explode("|",$master_user->token)[1],
            'Accept' => '*/*'
        ]);

        $data = [
            'name' => Str::random(10)
        ];

        $response = $this->post('/api/v1/plateau', $data);

        $response->assertStatus(200);
    }

    public function test_can_index_get()
    {
        $master_user = User::where('email','info@okesmez.com')->first();

        $this->withHeaders([
            'Authorization' => 'Bearer '.explode("|",$master_user->token)[1],
            'Accept' => '*/*'
        ]);

        $response = $this->get('/api/v1/plateau');

        $response->assertStatus(200);
    }

    public function test_can_show_post()
    {
        $master_user = User::where('email','info@okesmez.com')->first();

        if($this->plateau_id){
            $this->withHeaders([
                'Authorization' => 'Bearer '.explode("|",$master_user->token)[1],
                'Accept' => '*/*'
            ]);

            $response = $this->get('/api/v1/plateau/'.$this->plateau_id);

            $response->assertStatus(200);
        } else{
            $this->assertTrue($this->plateau_id);
        }
    }
}
