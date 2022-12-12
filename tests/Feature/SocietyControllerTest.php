<?php

namespace Tests\Feature;

use App\Models\Society;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SocietyControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function itCreatesSociety()
    {
        $this->seed();
        $response = $this->get('/api/society');
        $response->assertOk();
        $this->assertCount(5, Society::all());
    }
    /**
     * @test
     */
    public function itTestsValidationSociety()
    {
        $response = $this->post('/api/society',[
            'name' => '',
            'address' => ''
        ]);

        $response->assertSessionHasErrors();
    }
    /**
     * @test
     */

     public function itUpdateSociety()
     {
        $response = $this->post('/api/society',[
            'name' => 'mon company',
            'address' => 'nulle part'
        ]);

        $response->assertOk();
        $society = Society::first();
        $this->assertEquals('mon company', $society->name);
        $this->assertEquals('nulle part', $society->address);
     }
     /**
      * @test
      */

      public function itDeletesSociety()
      {
            $this->seed();
            $society = Society::first();
            $response = $this->delete('/api/society/' . $society->id);

            $response->assertNoContent();
      }
}
