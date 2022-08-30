<?php

namespace App\Http\Controllers;

use App\Models\Resort;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResortController extends Controller
{
    public function index()
    {

        $dataPerPage = request('dataPerPage') ?? 10;
        $resorts = Resort::query()
            ->orderSort(request('order'))
            ->priceSort(request('price'))
            ->availabilitySort(request('availability'))
            ->roomSort(request('room'))
            ->search(request('search'))
            ->filter(request('tags'))
            ->paginate($dataPerPage);

        return view('resorts.index', ['resorts' => $resorts]);
    }

    public function show(Resort $resort) {
        return view('resorts.show', ['resort' => $resort]);
    }

    public function create()
    {
        return view('resorts.create');
    }

    public function store()
    {
        $formFields = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'company' => ['required', Rule::unique('resorts', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email', Rule::unique('resorts', 'email')],
            'available_from' => ['required', 'date'],
            'available_till' => ['required', 'date'],
            'room_numbers' => ['required', 'numeric', 'min:0'],
            'room_price' => ['required', 'numeric', 'min:500'],
            'room_capacity' => ['required', 'numeric', 'min:1'],
        ]);

        // store image functionality 
        if (request()->hasFile('logo')) {
            $formFields['logo'] = request()->file('logo')->store('logos', 'public');
        }

        Resort::create($formFields);

        return redirect('/resorts')->with('message', 'New Resort Added');
    }

    public function edit(Resort $resort) {
        return view('resorts.edit', ['resort' => $resort]);
    }

    public function update(Resort $resort) {
        $formFields = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
            'company' => ['required', Rule::unique('resorts', 'company')->ignore($resort->id)],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email', Rule::unique('resorts', 'email')->ignore($resort->id)],
            'available_from' => ['required', 'date'],
            'available_till' => ['required', 'date'],
            'room_numbers' => ['required', 'numeric'],
            'room_price' => ['required', 'numeric'],
            'room_capacity' => ['required', 'numeric'],
        ]);

        // store image functionality 
        if (request()->hasFile('logo')) {
            $formFields['logo'] = request()->file('logo')->store('logos', 'public');
        }

        $resort->update($formFields);

        return back()->with('message', 'Resort Updated');
    }
    
    public function destroy(Resort $resort)
    {
            $resort->delete();
            return redirect('/resorts')->with('message', "Resort data deleted successfully");
        
    }
}
