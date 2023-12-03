<?php

namespace App\Traits;
use Image;
use Illuminate\Http\Request;

trait ImageTwoUploadTrait{
    /**
    * @param Request $request
    * @return $this|false|string
    */
    public function verifyAndUpload(Request $request,$fieldname='image',$directory='/storage/storage')
    {
                if($request->hasFile($fieldname)){
                        if(!$request->file($fieldname)->isValid()){
                   flash('Invalid Image')->error()->important();

            return redirect()->back()->withInput();
        }
            if($request->hasfile($fieldname)){
            //Get filename with extention
                $originalImage = $request->file($fieldname);
                $filenameWithExt = $originalImage->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $originalImage->getClientOriginalExtension();
                $featuredImage = Image::make($originalImage->getRealPath())->resize(760,421);
                $waterMark = Image::make(public_path('/static/favicon.png'))->resize(40,40)->opacity(50);
                $featuredImage->insert($waterMark,'bottom-right', 3, 3);
                $featuredImage->text('© 2020-2023 SOMA APP - All Rights Reserved', 150, 45, function($font) { 
                $font->file(public_path('fonts/nfl/nfl-vikings-2013.ttf'));
                $font->size(24);  
                $font->color([255, 0, 0, 0.9]);  
                $font->align('middle');  
                $font->valign('top');  
                $font->angle(0);  
                });
                $featuredImagePath = public_path().$directory;
                $featuredImage->save($featuredImagePath.$filename.'_'.time().'.'.$extension);
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
            
                return $fileNameToStore;
               }
        }

                return null;
    }
}
