<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use Session;

class PackageController extends Controller
{
    public function index()
    {
        try {
            $api = 'http://demo.miyn.net/api/package';

            $result = curl_init($api);
            curl_setopt($result, CURLOPT_URL, $api);
            curl_setopt($result, CURLOPT_HEADER, 0);
            curl_setopt($result, CURLOPT_RETURNTRANSFER, true);
            $values = curl_exec($result);
            curl_close($result); 

            $values = json_decode($values, true);
          
            $i = 0;
            /*foreach($values['packages'] as $key => $value){
                echo $key;
                print_r($value);
                echo($value['package_name']);
                $i++;
            }*/

            //dd($values);

            //$package = Package::all();

            return view('package.index', compact('values'));

        } catch (\Exception $e) {
            Session::Flash('error', ' something went wrong '.$e->getMessage());
            return redirect()->back();
        }

    	
        //return response()->json($response, 200);
    }

    public function create()
    {
        return view('package.create');
    }

    public function edit($id)
    {
        //dd($slug);
        $api = 'http://demo.miyn.net/api/edit-package/'.$id;
            $result = curl_init($api);
            curl_setopt($result, CURLOPT_URL, $api);
            curl_setopt($result, CURLOPT_HEADER, 0);
            curl_setopt($result, CURLOPT_RETURNTRANSFER, true);
            $values = curl_exec($result);
            curl_close($result);
 
            $values = json_decode($values, true);

            //echo $values['package_name'];
            //print_r($values['package']['package_name']);
            //dd($values);
            
            return view('package.update', compact('values'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());

        

        //extract data from the post
        //set POST variables
        $fields = array(
            'package_name' => urlencode($request->package_name),
            'package_description' => urlencode($request->package_description)
        );

        //url-ify the data for the POST
        $fields_string = '';
        foreach($fields as $key=>$value) { 
            $fields_string .= $key.'='.$value.'&';
        }
        rtrim($fields_string, '&');

        $api = 'http://demo.miyn.net/api/update-package/'.$id;
        $result = curl_init($api);
        curl_setopt($result, CURLOPT_URL, $api);
        curl_setopt($result, CURLOPT_HEADER, 0);
        curl_setopt($result, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($result,CURLOPT_POST, count($fields));
        curl_setopt($result,CURLOPT_POSTFIELDS, $fields_string);
        $values = curl_exec($result);

        //close connection
        curl_close($result);

        $values = json_decode($values, true);

        $msgtype = "";
        if ($values['result']  == 'true') {
            $msgtype = 'success';
        } else {
           $msgtype = 'error'; 
        }


        return redirect()->back()->with($msgtype, $values['message']);
    }

    
}
