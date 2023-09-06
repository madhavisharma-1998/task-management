<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('task.index', [
            'tasks' => Task::orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.create', [
            'categories' =>  Category::where('status', 1)->orderBy('created_at', 'desc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required',
            ],
            [
                'title.required' => 'The title field is required.',
                'title.string' => 'The title field must be string.',
                'title.max' => 'The title may not be greater than :max characters.',
                'description.required' => 'The description field must be string.',
            ]
        );
        try {
            $task = Task::create($attributes);

            // $task = new Task;
            // $task->title = $request->title;
            // $task->description = $request->description;
            // $task->save();

            $task->categories()->attach($request->categories);
            return redirect()->route('task.index')
                ->with('success', 'Task created successfully.');
        } catch (\Exception $e) {
            return Log::info('An error occurred:' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('task.show', [
            'task' => $task
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('task.edit', [
            'task' => $task,
            'categories' =>  Category::where('status', 1)->orderBy('created_at', 'desc')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $attributes = $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required',
            ],
            [
                'title.required' => 'The title field is required.',
                'title.string' => 'The title field must be string.',
                'title.max' => 'The title may not be greater than :max characters.',
                'description.required' => 'The description field must be string.',
            ]
        );
        try {
            $task->title = $request->title;
            $task->description = $request->description;
            $task->status = $request->status;
            $task->save();
            $task->categories()->sync($request->categories);
            return redirect()->route('task.index')
                ->with('success', 'Task updated successfully.');
        } catch (\Exception $e) {
            Log::info('An error occurred:' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        try {
            $task->delete();
            return back()->with('success', 'Task deleted successfully.');
        } catch (\Exception $e) {
            Log::info('An error occurred:' . $e->getMessage());
        }
    }

    /**
     * Restore the specified resource from storage.
     */
    public function archive(Task $task)
    {
        try {
            return view('task.archive',[
                'tasks' => Task::onlyTrashed()->orderBy('created_at', 'desc')->get(),
            ]);
        } catch (\Exception $e) {
            Log::info('An error occurred:' . $e->getMessage());
        }
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore(Task $task)
    {
        try {
            $task->restore();
            return back()->with('success', 'Task restore successfully.');
        } catch (\Exception $e) {
            Log::info('An error occurred:' . $e->getMessage());
        }
    }
}
