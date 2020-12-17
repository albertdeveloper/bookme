<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomTypeRequest;
use App\Models\RoomType;
use App\Repositories\RoomTypeRepositoryContract;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomTypeController extends Controller
{
    private $roomTypeRepository;

    public function __construct(RoomTypeRepositoryContract $roomTypeRepositoryContract)
    {
        $this->roomTypeRepository = $roomTypeRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/RoomType/Index',[
            'roomTypes' => $this->roomTypeRepository->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/RoomType/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomTypeRequest $request)
    {
        $this->roomTypeRepository->process($request);
        return redirect()->route('room_type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return Inertia::render('Admin/RoomType/Edit',[
            'data' => $this->roomTypeRepository->findById($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomTypeRequest $request, $id)
    {
        $this->roomTypeRepository->process($request);
        return redirect()->route('room_type.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->roomTypeRepository->delete($id);
        return redirect()->route('room_type.index');
    }
}
