<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\UrlResource;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Traits\ReferenceGeneratorTrait;

class UrlsController extends ApiController
{

    use ReferenceGeneratorTrait;

    public function index(){
        $urls = Url::all();

        return UrlResource::collection($urls);

    }

    public function store(Request $request){
        try {
            //Validate the user input
            $validator = $this->validateUserLogin();

            if($validator->fails()){
                return $this->respondWithValidationError($validator->messages(),422);
            }

            //check if user provides slug, or generate new one

            if(empty($request->preferred_slug)){
                $new_preferred_slug = $this->referenceGenerator(8);
            }else {
                $new_preferred_slug = $request->preferred_slug;
            }

            $createUrl = Url::create([
                "user_id" => Auth::id(),
                "url_slug" => $new_preferred_slug,
                "url_link" => $request->url,
            ]);

            $dataToReturn = [
              'slug' =>   $createUrl->url_slug
            ];

            if($createUrl){
                return $this->respondWithSuccess("Shorten URL Generated Successfully", 200, $dataToReturn);
            }
        }catch (\Exception $e){
            return $this->exceptionError($e->getMessage(), 500);
        }

    }

    public function validateUserLogin(){
        return Validator::make(request()->all(),[
            'url' => 'required',
        ]);
    }
}
