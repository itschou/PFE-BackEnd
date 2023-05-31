<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FournisseurController extends Controller
{

    private $status_code = 200;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Fournisseur::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Fournisseur $fournisseur)
    {
        $categorie = Fournisseur::pluck('id', 'secteur')->unique();
        $jsonCategories = $categorie->toArray();

        return response()->json(["fournisseur" => Fournisseur::all(), "categorie" => $jsonCategories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fournisseur $fournisseur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateStatut(Request $request)
    {
        $fournisseur = Fournisseur::where('email', $request->email)->first();
        if($fournisseur && $fournisseur->statusMarchandise === 1){
            $fournisseur->update([
                'statusMarchandise' => false
            ]);
        }else{
            $fournisseur->update([
                'statusMarchandise' => true
            ]);

        }



        return response()->json(["status" => $this->status_code, "success" => true, "message" => "le status Marchandise a été modifié", "data" => $fournisseur]);

    }

    public function updateStatusFournisseur(Request $request)
    {
        // dd($request->email);
        $fournisseur = Fournisseur::where('email', $request->email)->update(['status' => true]);
        
        return response()->json(["status" => $this->status_code, "success" => true, "message" => "Fournisseur approuvé avec succès.", "data" => $fournisseur]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fournisseur $fournisseur)
    {
        //
    }

    public function fournisseurLogin(Request $request)
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
        $email_status = Fournisseur::where("email", $request->email)->first();


        // if email exists then we will check password for the same email

        if (!is_null($email_status)) {
            $user = Fournisseur::where("email", $request->email)->first();
            
            if ($user && Hash::check($request->password, $user->password)) {
                $password_status = true;
            } else {
                $password_status = null;
            }


            // return response()->json(["data" => $hashed]);

            // if password is correct
            if (!is_null($password_status)) {
                $user = $this->FournisseurDetail($request->email);

                return response()->json(["status" => $this->status_code, "success" => true, "message" => "You have logged in successfully", "data" => $user]);
            } else {
                return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Incorrect password."]);
            }
        } else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Unable to login. Email doesn't exist."]);
        }
    }

    public function FournisseurDetail($email)
    {
        $user = array();
        if ($email != "") {
            $user = Fournisseur::where("email", $email)->first();
            return $user;
        }
    }
}
