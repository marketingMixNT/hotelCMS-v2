<?php

namespace App\Http\Controllers;

use App\Models\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function show(Apartment $apartment)
    {

        $apartment = Apartment::with('categories', 'benefits', 'advantages')->find($apartment->id);

        return view("pages.apartment.show", compact("apartment"));
    }
}
