<?php

namespace App\Http\Controllers;

use App\Forms\UpdateStateForm;
use App\Http\Requests\CreateCityRequest;
use App\Models\City;
use App\Models\State;
use App\Tables\Cities;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\FormBuilder\Select;
use ProtoneMedia\Splade\FormBuilder\Submit;
use ProtoneMedia\Splade\SpladeForm;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.cities.index',[
            'cities' => Cities::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $form=SpladeForm::make()
            ->action(route('admin.cities.store'))
            ->fields([
                Input::make('name')->label('Name'),
                Select::make('state_id')
                ->label('choose a State')
                ->options(State::pluck('name','id')->toArray()),
                Submit::make()->label('save')
            ])->class('space-y-4 bg-white rounded p-4');
        return view('admin.cities.create',[
            'form' => $form
        ]);
//        2,27
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateCityRequest $request)
    {

        City::create($request->validated());
        Splade::toast('created successfully')->autoDismiss(3);
        return to_route('admin.cities.index');
    }


    public function edit(City $city )
    {
        $form=SpladeForm::make()
            ->action(route('admin.cities.update',$city))
            ->method('PUT')
            ->fields([
                Input::make('name')->label('Name'),
                Select::make('state_id')
                    ->label('choose a State')
                    ->options(State::pluck('name','id')->toArray()),
                Submit::make()->label('save')
            ])
            ->fill($city)->class('space-y-4 bg-white rounded p-4');
        return view('admin.cities.edit',[
            'form' => $form
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateCityRequest $request, City $city)
    {
        $city->update($request->validated());
        Splade::toast('updated successfully')->autoDismiss(3);
        return to_route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        Splade::toast('deleted successfully')->autoDismiss(3);
        return back();
    }
}
