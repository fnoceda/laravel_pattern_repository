<?php
namespace App\Traits;

use Illuminate\Http\Request;

trait ImageTrait{
    public function verifyAndUpload(Request $request, $fieldname = 'image', $directory = 'images' ) {
        if( $request->hasFile( $fieldname ) ) {
            if (!$request->file($fieldname)->isValid()) {
                return redirect()->back()->withInput();
            }
            return $request->file($fieldname)->store($directory, 'public');
        }
        return null;
    }
    public function index(){
        return "lala";
    }
}
