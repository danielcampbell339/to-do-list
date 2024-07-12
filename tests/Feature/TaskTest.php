<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCanViewTaskPage()
    {
        $task = Task::factory()->create();
        $response = $this->get(route('tasks'));

        $response->assertSuccessful()
            ->assertSeeText($task->name);
    }
}
