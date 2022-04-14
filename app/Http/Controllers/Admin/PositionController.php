<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PositionFormRequest;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::orderBy('id')->get();
        return view('admin.positions.index', compact('positions'));
    }

    public function create()
    {
        return view('admin.positions.create');
    }

    public function store(PositionFormRequest $request)
    {
        $validated = $request->validated();

        Position::create($validated);

        return redirect(route('admin.positions.index'))->with([
            'positionCreated' => 'Должность успшно создана.'
        ]);
    }

    public function edit(Position $position)
    {
        return view('admin.positions.edit', compact('position'));
    }

    public function update(PositionFormRequest $request, Position $position)
    {
        $validated = $request->validated();

        $position->update($validated);

        return redirect(route('admin.positions.index'))->with([
            'positionUpdated' => 'Должность успшно изменена.'
        ]);
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect(route('admin.positions.index'))->with(['positionDeleted' => 'Должность была удалена.']);
    }
}
