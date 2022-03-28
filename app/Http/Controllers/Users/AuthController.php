<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerificationCode;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Traits\ReferenceGeneratorTrait;

class AuthController extends ApiController
{
    use ReferenceGeneratorTrait;

    public function register(Request $request){
        try{
            //Validate the user input
            $validator = $this->validateUserRegistration();

            if($validator->fails()){
                return $this->respondWithValidationError($validator->messages(), 422);
            }

            DB::beginTransaction();

            //Create a User
            $createUser  = User::create([
                'uid' => $this->uniqueUid(),
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            //Generate and register email verification code
            $generatedVerificationCode = VerificationCode::create([
                'user_id' => $createUser->id,
                'code' => mt_rand(100000,999999),
                'purpose' => 'email_verification',
                'expires_at' => Carbon::now()->addMinutes(15),
            ]);

            if($createUser && $generatedVerificationCode){
                DB::commit();

//                event(new UserRegistered($createUser, $generatedVerificationCode->code));

                $data = [
                    'token' => $createUser->createToken('UserAuthToken')->plainTextToken,
                    'token_type' => "Bearer"
                ];

                return $this->respondWithSuccess("User Account Registered Successfully", 200, $data);
            }else {
                DB::rollBack();
                return $this->respondWithError("Something went wrong", 503);
            }
        }
        catch (\Exception $e){
            return $this->exceptionError($e->getMessage(), 500);
        }
    }


    public function login(Request $request){
        try {
            //Validate the user input
            $validator = $this->validateUserLogin();

            if($validator->fails()){
                return $this->respondWithValidationError($validator->messages(),422);
            }

            $user = User::where('email', $request->email)->first();

            //Check if the email exist
            if($user){
                $checkIfPasswordMatch = Hash::check($request->password, $user->password, []);
                if (!$checkIfPasswordMatch) {
                    return $this->respondWithError("Email or Password does not match our record",403);
                }
                else {
                    $tokenResult = $user->createToken('UserAuthToken')->plainTextToken;

                    $data = [
                        'token' =>  $tokenResult,
                        'token_type' => 'Bearer'
                    ];

                    return $this->respondWithSuccess("User Logged in Successfully", 200, $data);
                }

            }else{
                return $this->respondWithError("Email or Password is Incorrect", 403);
            }

        } catch (\Exception $error) {
            return $this->exceptionError($error->getMessage(), 500);
        }
    }

    public function accountInfo(){

        //Check if the user's account is verified

        $loggedUser = Auth::user();

//        return $loggedUser->hasVerifiedEmail();

        $loggedUser->hasVerifiedEmail() ? $isEmailVerified = true : $isEmailVerified = false;

        $dataToReturn = [
            'email_verified' => $isEmailVerified,
            'username' => $loggedUser->username,
            'email' => $loggedUser->email,
            'is_account_active' => $loggedUser->active ? true : false
        ];

        return $this->respondWithSuccess("Successfully Retrieved User Info", 200, $dataToReturn);
    }

    public function validateUserRegistration(){
        return Validator::make(request()->all(),[
            'username' => 'required',
            'email' => 'required|email|string|max:100|unique:users',
            'password' => 'required|min:8',
        ]);
    }

    public function validateUserLogin(){
        return Validator::make(request()->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);
    }
}
