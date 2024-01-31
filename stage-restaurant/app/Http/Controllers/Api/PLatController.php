<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plat;
use App\Models\PlatSupp;
use Illuminate\Http\Request;

class PLatController extends Controller
{
    //

    public  function addPlat(Request  $request)
    {


        $file_name = time() . '_' . $request->photo->getClientOriginalName();
        $image = $request->file('photo')->storeAs('images', $file_name, 'public');

        $plat =  new Plat();
        $plat->photo = $image;
        $plat->nom = $request->name;
        $plat->quantite = 0;
        $plat->temps = 0;
        $plat->prix = $request->prix;
        $plat->save();
        $supps = json_decode($request->selected_supplements, true);


        if (isset($supps) && is_array($supps) && count($supps) > 0) {

            for ($i = 0; $i < count($supps); $i++) {
                $supp_id = $supps[$i];
                $plat_supp = new PlatSupp();
                $plat_supp->Supplement_id = $supp_id;
                $plat_supp->plat_id = $plat->id;
                $plat_supp->save();
            }
        }
    }
    public function  AllPlats()
    {

        $plats = Plat::with('Supplements')->get();
        return  response()->json(["data" => $plats], 200);
    }
    public function deletePlat($id)
    {
        $plat = Plat::find($id);

        // Detach all associated supplements
        $plat->Supplements()->detach();

        // Delete the Plat record
        $plat->delete();
        return  response()->json(["data" => "Plat Deleted Successfully!!"]);
    }
    public function UpdatePlat(Request $request, $id)
    {
        $plat  = Plat::find($id);

        if (!$plat) {
            return response()->json(["data" => "plat non trouvé"], 404);
        } else {

            if (!is_string($request->photo)) {

                $file_name = time() . '_' . $request->photo->getClientOriginalName();
                $image = $request->file('photo')->storeAs('images', $file_name, 'public');
                $plat->update(
                    [
                        "nom" => $request->nom,
                        "prix" => $request->prix,
                        "photo" => $image,
                        "temps" => $request->temps
                    ]
                );
            } else {
                $plat->update(
                    [
                        "nom" => $request->nom,
                        "prix" => $request->prix,
                        "temps" => $request->temps
                    ]
                );
            }
        }
        return response()->json(["data" => "plat mise a jour"], 200);
    }
}
