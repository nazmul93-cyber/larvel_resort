<?php

namespace App\Http\Controllers;

use App\Models\Resort;
use Illuminate\Http\Request;

class ResortController extends Controller
{
    public function index()
    {
         
        $dataPerPage = request('dataPerPage') ?? 10;
        $resorts = Resort::query() 
                    ->priceSort(request('price'))    
                    ->availabilitySort(request('availability'))    
                    ->roomSort(request('room'))    
                    ->search(request('search'))
                    ->filter(request('tags'))
                    ->paginate($dataPerPage);

        return view('resorts.index', ['resorts' => $resorts]);
    }
}
