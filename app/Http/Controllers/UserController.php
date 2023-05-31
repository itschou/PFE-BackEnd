<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $status_code = 200;
    // ------------ [ User Login ] -------------------
    public function userLogin(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                "email" => "required|email",
                "password" => "required"
            ]
        );

        if ($validator->fails()) {
            return response()->json(["status" => "failed", "validation_error" => $validator->errors()]);
        }


        // check if entered email exists in db
        $email_status = User::where("email", $request->email)->first();


        // if email exists then we will check password for the same email

        if (!is_null($email_status)) {
            $user = User::where("email", $request->email)->first();
            
            if ($user && Hash::check($request->password, $user->password)) {
                $password_status = true;
            } else {
                $password_status = null;
            }


            // return response()->json(["data" => $hashed]);

            // if password is correct
            if (!is_null($password_status)) {
                $user = $this->userDetail($request->email, "user");

                return response()->json(["status" => $this->status_code, "success" => true, "message" => "You have logged in successfully", "data" => $user]);
            } else {
                return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Incorrect password."]);
            }
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Email doesn't exist."]);
        }
    }


    public function userRegister(Request $request){

        Fournisseur::create($request->all());
    }



    

    // ------------------ [ User Detail ] ---------------------
    public function userDetail($email, $role)
    {
        if($role === "user"){
            $user = array();
            if ($email != "") {
                $user = User::where("email", $email)->first();
                return $user;
            }
        }else{
            $user = array();
            if ($email != "") {
                $user = Fournisseur::where("email", $email)->first();
                return $user;
            }
        }
    }

    public function userDetailFront(Request $request){
        dd($request->email);
        if ($request->email != null) {
            $user = User::where("email", $request->email)->first();
            dd($user);
            return response()->json(["message" => "Les données ont bien été récupéré", "data" => $user]);
        }else{
            return response()->json(["message" => "Email null"]);
        }
        
    }

    public function UpdateUser(Request $request){
        User::where('email', $request->email)->update($request->all());
        $user = $this->userDetail($request->email, "user");
        return response()->json(["status" => $this->status_code, "success" => true, "message" => "Votre profile a été modifié avec success", "data" => $user]);
    }

    public function UpdateFournisseur(Request $request){
        Fournisseur::where('email', $request->email)->update($request->all());
        $user = $this->userDetail($request->email, "fournisseur");
        return response()->json(["status" => $this->status_code, "success" => true, "message" => "Votre profile a été modifié avec success", "data" => $user]);
    }

    

    
}
