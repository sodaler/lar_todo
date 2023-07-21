<?php

namespace App\Http\Controllers\Task;

use App\Actions\TaskAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\Task\StoreRequest;
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
