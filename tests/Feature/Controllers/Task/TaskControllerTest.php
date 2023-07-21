<?php

namespace Controllers\Task;

use App\Models\Task;
use App\Models\User;
use Database\Factories\TaskFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = UserFactory::new()->create();
    }

    public function test_it_index_page_success(): void
    {
        $this->withoutExceptionHandling();

        $this->actingAs($this->user);

        TaskFactory::new()->count(3)->create();

        $res = $this->get('/tasks');
        $res->assertViewIs('tasks.index');

        $res->assertSeeText('Tasks app');
    }

    public function test_it_can_be_stored(): void
    {
        $this->withoutExceptionHandling();

        $data = $this->validParams();

        $this->actingAs($this->user)->post('/tasks', $data);

        $this->assertDatabaseCount('tasks', 1);

        $task = Task::first();

        $this->assertEquals($data['title'], $task->title);
        $this->assertEquals($data['description'], $task->description);
    }

    public function test_it_can_be_stored_by_only_auth_user(): void
    {
        $data = $this->validParams();
        $res = $this->post('/tasks', $data);
        $res->assertRedirect();

        $this->assertDatabaseCount('tasks', 0);
    }

    public function test_it_can_be_updated_success(): void
    {
        $this->withoutExceptionHandling();

        $task = TaskFactory::new()->create();

        $data = $this->validParams();
        $data['description'] = 'description changed';
        $data['title'] = 'title changed';

        $res = $this->actingAs($this->user)->patch('/tasks/' . $task->id, $data);

        $res->assertRedirect();

        $updatedTask = Task::first();
        $this->assertEquals($data['title'], $updatedTask->title);
        $this->assertEquals($data['description'], $updatedTask->description);
        $this->assertEquals($task->id, $updatedTask->id);
    }

    public function test_attribute_title_is_required_for_storing_task(): void
    {
        $data = $this->validParams();
        $data['title'] = '';

        $res = $this->actingAs($this->user)->post('/tasks', $data);

        $res->assertRedirect();
        $res->assertInvalid('title');
    }

    public function test_it_can_be_deleted_success(): void
    {
        $task = TaskFactory::new()->create();

        $res = $this->actingAs($this->user)->delete('/tasks/' . $task->id);
        $res->assertRedirect();

        $this->assertDatabaseCount('tasks', 0);
    }

    /**
     * Valid params for updating or creating a resource
     *
     * @param array $overrides new params
     * @return array Valid params for updating or creating a resource
     */
    private function validParams($overrides = [])
    {
        return array_merge([
            'title' => 'hello world',
            'description' => "I'm a content",
        ], $overrides);
    }
}
