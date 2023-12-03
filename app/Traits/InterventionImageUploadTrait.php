<?php

namespace App\Traits;

use Image;
use Illuminate\Http\Request;

trait InterventionImageUploadTrait{
    /**
    * @param Request $request
    * @return $this|false|string
    */
	public function verifyAndUpload(Request $request,$fieldname='image',$directory='public/storage/')
	{
                if($request->hasFile($fieldname)){
                        if(!$request->file($fieldname)->isValid()){
        	       flash('Invalid Image')->error()->important();

        	return redirect()->back()->withInput();
        }
        	if($request->hasfile($fieldname)){
        	//Get filename with extention
                $filenameWithExt = $request->file($fieldname)->getClientOriginalName();
                //Get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                //Remove unwanted character
                $filename = preg_replace("/[ ^A-Za-z0-9 ]/",'',$filename);
                $filename = preg_replace("/\s+/",'-',$filename);
                //Get the original image extension
                $extension = $request->file($fieldname)->getClientOriginalExtension();
                //Create unique file name
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Store Image
                $image = Image::make($request->file($fileNameToStore))->opacity(.2);
                $path = $request->file($fieldname)->storeAs($directory,$Image);
                
        	
                return $fileNameToStore;
               }
        }

                return null;
	}
}