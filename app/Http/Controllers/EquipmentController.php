<?php

namespace App\Http\Controllers;

use App\Room;
use App\Employee;
use App\Equipment;
use App\EquipmentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::all();
        return view('equipment.index', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        $rooms = Room::all();
        $types = EquipmentType::all();
        return view('equipment.create', compact('employees', 'types', 'rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'serial_no' => 'string|min:3',
            'inventar_no' => 'string|min:3',
            'room_id' => 'integer|exists:rooms,id',
            'price' => 'integer',
            'date_of_purchase' =>'date',
            'status' => 'string',
            'model' => 'string|required',
            'employee_id' => 'integer|exists:employees,id',
            'EquipmentType_id' => 'integer|exists:equipment_types,id',
        ]);
        $equipment = Equipment::create($attributes);
        Session::flash('success' , 'Equipment '.$equipment->model.' has been added.');
        return redirect(route('equipments.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        return view('equipment.show', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        return view('equipment.edit', compact('equipment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
         $attributes = request()->validate([
            'serial_no' => 'string|min:3',
            'inventar_no' => 'string|min:3',
            'room_id' => 'integer|exists:rooms,id',
            'price' => 'integer',
            'date_of_purchase' =>'date',
            'status' => 'string',
            'model' => 'string|required',
            'employee_id' => 'integer|exists:employees,id',
            'EquipmentType_id' => 'integer|exists:equipment_types,id',
        ]);
        $equipment->update($attributes);
        Session::flash('success' , 'Equipment '.$equipment->model.' has been updated.');
        return redirect(route('equipments.show'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        Session::flash('success' , 'Equipment '.$equipment->model.' has been deleted.');
        return redirect(route('equipment.index'));
    }
}
