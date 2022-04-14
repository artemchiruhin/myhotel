<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateTaskFormRequest;
use App\Http\Requests\EditEmployeeRequest;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        //SELECT employee_activity.employee_id, employee_activity.activity FROM employees INNER JOIN employee_activity ON employees.id = employee_activity.employee_id
        //dd(DB::table('employee_activity')->where('employee_id', '1')->get());
        //dd(DB::table('employees')
            //->join('employee_activity', 'employees.id', '=', 'employee_activity.employee_id')->get());
        return view('admin.employees.index');
    }

    public function tasks(Employee $employee)
    {
        $tasks = Task::where('employee_id', $employee->id)->orderBy('date_from', 'asc')->orderBy('time_from', 'asc')->get();
        return view('admin.employees.tasks.index', compact('employee', 'tasks'));
    }

    public function createTask(Employee $employee)
    {
        //SELECT position_activity.position_id, position_activity.activity FROM employees INNER JOIN position_activity ON employees.position_id = position_activity.position_id WHERE employees.id = 1
        //$activities = $employee->activities();
        return view('admin.employees.tasks.create', compact('employee'));
    }

    public function storeTask(CreateTaskFormRequest $request, Employee $employee)
    {
        $validated = $request->validated();

        if($validated['date_from'] === $validated['date_to']) {
            if(strtotime($validated['time_from']) > strtotime($validated['time_to'])) {
                return back()->withErrors([
                    'incorrect_time' => 'Время выбрано некорректно.'
                ])->withInput();
            }
        }

        $tasks = Task::where('employee_id', $employee->id)->where('date_to', '>=', date('Y-m-d'))->get();
        /*if(count($tasks->where('date_from', '<=', $validated['date_from'])->where('date_to', '>=', $validated['date_from'])) > 0
            || count($tasks->where('date_from', '<=', $validated['date_to'])->where('date_to', '>=', $validated['date_to'])) > 0) {
            return redirect()->back()->withErrors(['employee_busy' => 'В выбранные даты сотрудник занят.'])->withInput();
        }*/
        //dd($request->date_from . ' ' . $request->time_from > '2022-04-12 15:15:00' && $request->date_from . ' ' . $request->time_from < '2022-04-12 15:50:00');
        foreach ($tasks as $task) {
            if (strtotime($request->date_from . ' ' . $request->time_from . ':00') > strtotime($task->date_from->format('Y-m-d') . ' ' . $task->time_from)
                && strtotime($request->date_from . ' ' . $request->time_from . ':00') < strtotime($task->date_to->format('Y-m-d') . ' ' . $task->time_to)
                || strtotime($request->date_to . ' ' . $request->time_to . ':00') > strtotime($task->date_from->format('Y-m-d') . ' ' . $task->time_from)
                && strtotime($request->date_to . ' ' . $request->time_to . ':00') < strtotime($task->date_to->format('Y-m-d') . ' ' . $task->time_to)
                || strtotime($request->date_from . ' ' . $request->time_from . ':00') < strtotime($task->date_from->format('Y-m-d') . ' ' . $task->time_from)
                && strtotime($request->date_to . ' ' . $request->time_to . ':00') > strtotime($task->date_to->format('Y-m-d') . ' ' . $task->time_to)) {
                return redirect()->back()->withErrors(['employee_busy' => 'В выбранный диапазон времени сотрудник занят.'])->withInput();
            }
        }

        $text = $request->sub_text ? $request->main_text . ' ' . $request->sub_text : $request->main_text;

        Task::create([
            'employee_id' => $employee->id,
            'date_from' => $validated['date_from'],
            'time_from' => $validated['time_from'],
            'date_to' => $validated['date_to'],
            'time_to' => $validated['time_to'],
            'text' => $text
        ]);

        return redirect(route('admin.employees.tasks.index', $employee))->with([
            'taskCreated' => 'Задание было добавлено.'
        ]);
    }

    public function editTask(CreateTaskFormRequest $request, Employee $employee, Task $task)
    {
        return view('admin.employees.tasks.edit', compact('employee', 'task'));
    }

    public function updateTask()
    {

    }

    public function destroyTask(Employee $employee, Task $task)
    {
        $task->delete();
        return redirect(route('admin.employees.tasks.index', $employee))->with('taskDeleted', 'Задание было удалено.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect(route('admin.employees.index'))->with([
            'employeeDeleted' => 'Сотрудник был удален.'
        ]);
    }
}
