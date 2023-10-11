<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use App\Tables\Countries;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Splade;
use ProtoneMedia\Splade\FormBuilder\Input;
use ProtoneMedia\Splade\SpladeForm;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.countries.index',
        ['countries' =>Countries::class]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        Country::create($request->validated());
        Splade::toast('Country Created')->autoDismiss(3);
        return to_route('admin.countries.index');

    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Country $country)
    {
      return view('admin.countries.edit',compact('country'));
//        $form=SpladeForm::make()
////            ->action(route('admin.countries.index'))
////            ->fields([
////                Input::make('name')->label('Name'),
////                Input::make('country_code')->label('Country Code'),
////                Submit::make()->label('update Country')
////            ])
////            ->fill($country)
////            ->method('PUT');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCountryRequest $request, Country $country)
    {
       $country->update($request->validated());
       Splade::toast('country Record updated Successfully');
        return to_route('admin.countries.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Country $country)
    {
        $country->delete();
        Splade::toast('country Record deleted Successfully');
        return back();
    }
}
