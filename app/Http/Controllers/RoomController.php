<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Repositories\RoomRepositoryContract;
use App\Repositories\RoomTypeRepositoryContract;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RoomController extends Controller
{
    private $roomRepository;
    private $roomTypeRepository;

    public function __construct(RoomRepositoryContract $roomRepositoryContract,RoomTypeRepositoryContract $roomTypeRepositoryContract)
    {
        $this->roomRepository = $roomRepositoryContract;
        $this->roomTypeRepository = $roomTypeRepositoryContract;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Admin/Room/Index',[
            'filters' => request()->only('search','dropdown'),
            'rooms' => $this->roomRepository->get(request()->only('search','dropdown')),
            'roomTypes' => $this->roomTypeRepository->list(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Admin/Room/Create',[
            'roomTypes' => $this->roomTypeRepository->list(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $this->roomRepository->process($request);
        $this->roomRepository->process($request);
        return redirect()->route('room.index');
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
        return Inertia::render('Admin/Room/Update',[
            'data' => $this->roomRepository->findById($id),
            'roomTypes' => $this->roomTypeRepository->list(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
