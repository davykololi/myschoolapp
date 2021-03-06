<?php

namespace App\Traits;

use Image;
use Illuminate\Http\Request;

trait FilesUploadTrait{
    /**
    * @param Request $request
    * @return $this|false|string
    */
	public function verifyAndUpload(Request $request,$fieldname='file',$directory='public/files/')
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
                $extension = $request->file($fieldname)->getClientOriginalExtension();
                //File to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload Image
                $path = $request->file($fieldname)->storeAs($directory,$fileNameToStore);
        	
                return $fileNameToStore;
               }
        }

                return null;
	}
}