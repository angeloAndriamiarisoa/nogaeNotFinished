<?php

namespace Tests\Feature;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function itListProject()
    {
        $this->seed();
        $response = $this->get('/api/project');
        $response->assertOk();
        $this->assertCount(5, Project::all());
    }
    /**
     * @test
     */
    public function itValidatesFieldsProject()
    {
        $response = $this->post('/api/project', [
            'name' => '',
            'description' => ''
        ]);
        $response->assertSessionHasErrors();
    }
    /**
     * @test
     */
    public function itsStoresProject()
    {
        $response = $this->post('/api/project', [
            'name' => 'my project',
            'description' => 'my description for the project'
        ]);

        $response->assertOk();
        $this->assertCount(1, Project::all());
        $project = Project::first();
        $this->assertEquals('my project', $project->name);
        $this->assertEquals('my description for the project', $project->description);
    }
    /**
     * @test
     */
    public function updateProject()
    {
        $this->seed();
        $project = Project::first();
        $response = $this->put("/api/project/{$project->id}",[
            'name' => 'name updated',
            'description' => 'description updated'
        ]);
        $response->assertOk();
        $projectUpdated = Project::first(); 
        $this->assertEquals('name updated', $projectUpdated->name);
        $this->assertEquals('description updated', $projectUpdated->description);
    }
    /**
     * @test
     */
    public function deleteProject()
    {
        $this->seed();
        $project = Project::first();
        $response = $this->delete("/api/project/{$project->id}");
        $response->assertNoContent();
    }
}
