<?php

namespace Tests\Unit\v2;

use App\Models\v2\User;
use Tests\TestCase;

class PlateauTest extends TestCase
{
    public function test_can_create_plateau()
    {
        $data = [
            'name' => $this->faker->name
        ];

        $master_user = User::where('email','info@okesmez.com')->first();
        if(!$master_user->token){
            $master_user->token = $master_user->createToken('api-token')->plainTextToken;
            $master_user->save();
        }

        $this->withHeaders([
            'Authorization' => 'Bearer '.explode("|",$master_user->token)[1],
            'Accept' => '*/*'
        ]);


        $response = $this->post(route('plateau.store'), $data);

        $response->assertStatus(200);
    }
}
