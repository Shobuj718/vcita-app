<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Package;
use Validator;

class PackageController extends Controller
{


	/*
		to view all packages list
		return json object
	*/
    public function index()
    {
        $message = "Package message send succesfull";
        $function_definition = "to view all packages list return json object";

        $packages = Package::all();

        //dd($packages);

        $response = [
            'success' => true,
            'message' => $message,
            'function_definition' => $function_definition,
            'packages' => $packages,
        ];

        return response()->json($response, 200);
    }

    /*
    	to insert packages data into packages table
    */
    public function store(Request $request)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'package_name' => 'required',
            'package_description' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }


        $package = Package::create($input);

        $message = "Package data insert succesfull";
        $function_definition = "to insert packages data in packages table";

        $response = [
            'success' => true,
            'message' => $message,
            'function_definition' => $function_definition,
            'package' => $package,
        ];

        return response()->json($response, 200);
    }

    /*
    	to show single pacakge data
    */
    public function show($id)
    {
    	$package = Package::find($id);

    	$message = "Package data show succesfull";
        $function_definition = "to show single pacakge data";

    	$response = [
            'success' => true,
            'message' => $message,
            'function_definition' => $function_definition,
            'package' => $package,
        ];

        return response()->json($response, 200);
    }

    /*
    	update pacakge data
    */
    public function update(Request $request, $id)
    {
        $input = $request->all();


        $validator = Validator::make($input, [
            'package_name' => 'required',
            'package_description' => 'required'
        ]);


        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        $package = Package::find($id);
        $package->package_name = $input['package_name'];
        $package->package_description = $input['package_description'];
        $package->save();

        $message = "Package update succesfull";
        $function_definition = "update pacakge data";

        $response = [
            'success' => true,
            'message' => $message,
            'function_definition' => $function_definition,
            'package' => $package,
        ];

        return response()->json($response, 200);
    }

}
