<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Task;

class HomeController extends Controller
{
    public function Read() {
        $tasks = Task::all();
        //compact = convert to assoc array
        return view("task.read", ['tasks' => compact('tasks'), 'role' => isset($_GET['role']) ? false : true]);
    }
    public function create() {
        return view('task.create');
    }
    public function assistant_create(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:1024'
        ]);
        Task::create($request->all());
        return redirect()->route('task.read')->with('success', 'Task created successfully!');
    }

      // Страница редактирования задачи
      public function edit(Task $task)
      {
          return view('task.edit', compact('task'));
      }

      // Обновление задачи
      public function Update(Request $request)
    {
        $id = $request->route("id");
        $task = Task::find($id);
        if ($task == null) {
            return redirect()->route('tasks.read')->with('error', "Task doesn't exists");
        }
        return view("task.update", ['id' => $id, 'title' => $task->title, 'description' => $task->description]);
    }

    public function assistant_update(Request $request)
    {
        $id = $request->input("id");
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:1024'
        ]);

        $task = Task::find($id);
        $task->title = $request->input("title");
        $task->description = $request->input("description");
        $task->save();
        return redirect()->route('task.read')->with('success', "Task updated successfully");
    }

    public function Delete(Request $request)
    {
        $id = $request->route("id");
        $task = Task::find($id);

        if ($task == null) {
            return redirect()->route('task.read');
        }

        return view('task.delete', ['id' => $id]);
    }

    public function assistant_delete(Request $request)
    {
        $id = $request->input("id");

        if($id == -1) return redirect()->route('task.read');

        $task = Task::find($id);
        $task->delete();
        return redirect()->route('task.read')->with('success', "Task deleted successfully");
    }
}
