<?php

namespace Tests\Feature;

use App\Models\Employee;
use Dflydev\DotAccessData\Data;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Nette\Utils\Json;
use Tests\TestCase;

use function PHPUnit\Framework\assertCount;

class EmployeeControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function itListsEmployees()
    {
        $response = $this->get('/api/employee');

        $response->assertOk();
        // assertCount(15, $response->json('data'));
    }

    /**
     * @test
     */
    public function itCreatesEmployees()
    {
        $response = $this->post('/api/employee',[
            'name' => 'mon nom de test',
            'firstname' => 'mon prenom de test',
            'email' => 'mon email de test',
            'address' => 'mon address de test',
        ]); 

        $employees = Employee::all();
        $employee = Employee::first();
        $response->assertOk();
        $this->assertEquals(1, $employees->count());
        $this->assertEquals('mon nom de test', $employee->name);
    }

    /**
     * @test
     */

     public function itValidatesFields()
     {
        $this->seed();
        $response = $this->post('/api/employee',[
            'name' => '',
            'firstname' => '',
            'email' => '',
            'address' => '',
        ]); 

        $response->assertSessionHasErrors(['name', 'firstname', 'email', 'address']);
     }
    /**
     * @test
     */

     public function itUpdatesEmployee()
     {
        $this->seed(); 
        $employee = Employee::first();  

        $response = $this->put('/api/employee/' . $employee->id, [
            'name' => 'updater',
            'firstname' => 'updater',
            'email' => 'updater',
            'address' => 'updater',
        ]);

        $update = Employee::find($employee->id);

        $response->assertOk();
        $this->assertEquals('updater', $update->name);

     }

     /**
      * @test
      */
    
    public function itDeleteEmployee()
    {
        $this->seed();
        $employee = Employee::first();
        $response = $this->delete('/api/employee/' .  $employee->id);
        $response->assertNoContent();

        $this->assertEquals(14, Employee::count());

    }
}
