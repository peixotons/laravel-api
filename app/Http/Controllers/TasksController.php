<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
class TasksController extends Controller
{
    public function getTasks() {
        return response()->json(Tasks::all(),200);
    }

    public function getTasksById($id) {
        $tasks = Tasks::find($id);
        if(is_null($tasks)){
            return response()->json(['message' => 'Task Not Found'], 404);
        }
        return response()->json($tasks::find($id),200);
    }
    public function createTask(Request $request) {
        $tasks = Tasks::create($request->all());
        return response($tasks,200);
    }
    public function updateTask(Request $request, $id) {
        $tasks = Tasks::find($id);
        if(is_null($tasks)) {
            return response()->json(['message' => 'Task Not Found'], 404);
        }
        $tasks->update($request->all());
        return response ($tasks, 200);
    }

    public function deleteTask(Request $request, $id) {
        $tasks = Tasks::find($id);
        if(is_null($tasks)) {
            return response()->json(['message' => 'Task Not Found'], 404);
        }
        $tasks->delete();
        return response()->json(null,204);
    }
}
