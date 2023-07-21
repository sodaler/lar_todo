<?php

namespace App\Http\Controllers\Task;

use App\Actions\TaskAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class TaskController extends Controller
{
    /**
     * Display a listing of the task.
     */
    public function index(SearchRequest $request, TaskAction $action): View
    {
        $tasks = $action->getSearchAuth($request->search)
            ->paginate(6);

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new task.
     */
    public function create(): View
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created task in storage.
     */
    public function store(StoreRequest $request): RedirectResponse|Redirector
    {
        $data = $request->validated();
        $user = auth()->user();
        $user->tasks()->create($data);

        return redirect()->route('task.index');
    }

    /**
     * Show the form for editing the specified task.
     */
    public function edit(Task $task): View
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified task in storage.
     */
    public function update(UpdateRequest $request, Task $task): RedirectResponse|Redirector
    {
        $data = $request->validated();
        $task->update($data);
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified task from storage.
     */
    public function destroy(Task $task): RedirectResponse|Redirector
    {
        $task->delete();
        return redirect()->route('task.index');
    }
}
