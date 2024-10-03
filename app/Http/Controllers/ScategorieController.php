<?php

namespace App\Http\Controllers;

use App\Models\Scategorie;
use Illuminate\Http\Request;

class ScategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $scategories=Scategorie::with("categorie")->get();
            return response()->json($scategories);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
     }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $scategorie=new Scategorie([
                "nomScategorie"=>$request->input("nomScategorie"),
                "imageScategorie"=>$request->input("imageScategorie"),
                "categorieID"=>$request->input("categorieID")

            ]);
            $scategorie->save();
            return response()->json($scategorie);
        } catch (\Exception $e) {
            return response()->json("probléme de crééation du categories");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $scategorie=Scategorie::with("categorie")->findOrFail($id);
            return response()->json($scategorie);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try {
            $scategorie=Scategorie::findOrfail($id);
            $scategorie->update($request->all());
            return response()->json($scategorie);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $scategorie=Scategorie::findOrfail($id);
            $scategorie->delete();
            return response()->json("Sous categorie supprimer avec succées");
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
            }
      }

      public function showSCategorieByCAT($idcat)
        {
            try {
              $Scategorie= Scategorie::where('categorieID', $idcat)->with('categorie')->get();
              return response()->json($Scategorie);
                } catch (\Exception $e) {
              return response()->json("Selection impossible {$e->getMessage()}");
                 }
        }
}
