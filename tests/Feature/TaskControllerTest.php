<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function itListsTasks()
    {
        $this->seed();
        $response = $this->get('/api/task');
        $response->assertOk();
        $this->assertCount(15, $response->json('data'));
    }
    /**
     * @test
     */
    public function itStoresTask()
    {
        $this->withExceptionHandling();
        $response = $this->post('/api/task', [
            'name' => 'mon description',
            'description' => 'mon long description'
        ]);

        $response->assertOk();
        $this->assertCount(1, Task::all());
    }
    /**
     * @test
     * 
     */
    public function itTestsValidationTask()
    { 
        $response = $this->post('/api/task', [
            'name' => '',
            'description' => ''
        ]);

        $response->assertSessionHasErrors(['name', 'description']);
        
    }

    /**
     * @test
     */
    public function itUpdateTask()
    {
        $this->seed();
        $task = Task::first();
        $response = $this->put('/api/task/' . $task->id, [
            'name' => 'mon update',
            'description' => 'mon update mon description'
        ]);

        $update = Task::find($task->id);
        $response->assertOk();
        $this->assertEquals('mon update', $update->name);
    }

    /**
     * @test
     */
    public function itDeletesTask()
    {
        $this->seed();
        $task = Task::first();
        $response = $this->delete('/api/task/' . $task->id);

        $response->assertNoContent();

        $this->assertCount(14, Task::all());

    }
}
