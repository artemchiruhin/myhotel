<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomCreateFormRequest;
use App\Http\Requests\RoomEditFormRequest;
use App\Models\Category;
use App\Models\Room;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.rooms.index');
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.rooms.create', compact('categories'));
    }

    public function store(RoomCreateFormRequest $request)
    {
        $validated = $request->validated();
        $validated['image_names'] = $this->moveUploadedImages($validated);
        Room::create([
            'category_id' => $validated['category_id'],
            'number' => $validated['number'],
            'floor' => floor($validated['number'] / 100),
            'price_per_day' => $validated['price_per_day'],
            'rooms_number' => $validated['rooms_number'],
            'images' => json_encode($validated['image_names'])
        ]);

        return redirect(route('admin.rooms.index'))->with([
            'roomCreated' => 'Номер успешно добавлен.'
        ]);
    }

    public function edit(Room $room)
    {
        $categories = Category::all();
        return view('admin.rooms.edit', compact('room', 'categories'));
    }

    public function update(RoomEditFormRequest $request, Room $room)
    {
        $validated = $request->validated();

        $existingImages = json_decode($room->images);
        $removedImages = json_decode($request->removedImages);
        $addedImages = json_decode($request->images) ?? [];
        $newImages = array_merge(array_diff($existingImages, $removedImages), $addedImages);

        if(count($existingImages) - count($removedImages) + count($addedImages) <= 0) {
            return back()->withErrors([
                'no_images' => 'Необходимо добавить изображения.'
            ])->withInput();
        }

        $room->number = $validated['number'];
        $room->rooms_number = $validated['rooms_number'];
        $room->floor = floor($validated['number'] / 100);
        $room->price_per_day = $validated['price_per_day'];
        $room->category_id = $validated['category_id'];

        $validated['image_names'] = $this->moveUploadedImages($validated);

        foreach ($removedImages as $img) {
            if(File::exists(public_path('uploads/rooms/' . $img)) && $img !== 'default.png'){
                File::delete(public_path('uploads/rooms/' . $img));
            }
        }

        $room->images = json_encode($newImages);

        $room->save();

        return redirect(route('admin.rooms.index'))->with('roomUpdated', 'Информация о номере обновлена');

    }

    public function destroy(Room $room)
    {
        $room->delete();
        foreach (json_decode($room->images) as $img) {
            if(File::exists(public_path('uploads/rooms/' . $img)) && $img !== 'default.png'){
                File::delete(public_path('uploads/rooms/' . $img));
            }
        }
        return redirect(route('admin.rooms.index'))->with([
            'roomDeleted' => 'Номер был удален.'
        ]);
    }

    public function moveUploadedImages(mixed $validated)
    {
        foreach ($_FILES['images']['tmp_name'] as $key => $image) {
            $image_name = 'room-' . $validated['number'] . '-' . Str::random(20) . '.' . pathinfo($_FILES['images']['name'][$key], PATHINFO_EXTENSION);
            $image_tmp = $_FILES['images']['tmp_name'][$key];
            move_uploaded_file($image_tmp, public_path() . '/uploads/rooms/' . $image_name);
            $validated['image_names'][] = $image_name;
        }
        return $validated['image_names'];
    }

    public function cleaningSchedule(Request $request, Room $room)
    {
        $cleans = Task::where('text', 'LIKE', 'Уборка номера ' . $room->number)->get();
        return view('admin.rooms.cleaning-schedule', compact('cleans', 'room'));
    }
}
