<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class AjaxOperationsController extends Controller
{
    public function getStates(Request $request)
    {
        try {
            $country = $request->country;
            $states = State::where('country_id', $country)->get();
            if ($states->isNotEmpty()) {
                return response()->json(['success' => true, 'data' => $states], 200);
            }else{
                return response()->json(['success' => false, 'message' => 'No states found for the selected country'], 404);
            }
        }catch (\Exception $e){
            return response()->json(['success' => false, 'message' => 'Error retrieving states'], 500);
        }
    }

    public function getCities(Request $request)
    {
        try {
            $state = $request->state;
            $cities = City::where('state_id', $state)->get();
            if ($cities->isNotEmpty()) {
                return response()->json(['success' => true, 'data' => $cities], 200);
            }else{
                return response()->json(['success' => false, 'message' => 'No cities found for the selected state'], 404);
            }
        }catch (\Exception $e){
            return response()->json(['success' => false, 'message' => 'Error retrieving cities'], 500);
        }
    }

    public function getCountries(){
        try {
           $countries = Country::all();
            if ($countries->isNotEmpty()) {
                return response()->json(['success' => true, 'data' => $countries], 200);
            }else{
                return response()->json(['success' => false, 'message' => 'No countries found!'], 404);
            }
        }catch (\Exception $e){
            return response()->json(['success' => false, 'message' => 'Error retrieving countries'], 500);
        }
    }
}
