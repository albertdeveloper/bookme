<?php

namespace App\Http\Controllers;

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
            'filters' => request()->only('room_type'),
            'rooms' => $this->roomRepository->get(request()->only('room_type')),
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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