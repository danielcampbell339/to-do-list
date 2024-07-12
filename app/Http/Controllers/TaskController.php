<?php

namespace App\Http\Controllers;

use App\Models\Task;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return Response
     */
    public function __invoke(): View
    {
        $tasks = Task::query()->get();

        return view('tasks', [
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect()->back();
    }

    public function done(Task $task)
    {
        $task->is_done = true;
        $task->save();

        return redirect()->back();
    }

    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->back();
    }
}
