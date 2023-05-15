<?php

namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CandidatureNotification;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // liste des modules dans module
        $module = Module::all();


        return view('candidat.ajouter',compact('module'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function liste()
    {
        $candidat = Candidat::all();
        $total = Candidat::count();
        $rh = Candidat::where('domaine', 'Ressources Humaines')->count();
        $md = Candidat::where('domaine', 'Marketing Digital')->count();
        $gp = Candidat::where('domaine', 'gestion-projet')->count();
        $ib = Candidat::where('domaine', 'Informatique Bureautique')->count();
        $dw = Candidat::where('domaine', 'Developpement web')->count();
        $ard = Candidat::where('domaine', 'Arduino(robotique - internet des objets connectés)')->count();
        $mi = Candidat::where('domaine', 'modelisation-impression3d')->count();
        $maint = Candidat::where('domaine', 'Maintenance')->count();
        $dg = Candidat::where('domaine', 'Design Graphique')->count();
        $other = Candidat::where('domaine', 'Autres')->count();
        return view('candidat.liste',compact('candidat','total','rh','md','gp','ib','dw','ard','mi','maint','dg','other'));


        // $candidats = Candidat::all();
        // return view('dashboard', ['candidats' => $candidats]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//
public function store(Request $request)
{
    // validation des données
    $validated = $request->validate([
        'email' => 'required|email',
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
        'adresse' => 'required|string|max:255',
        'domaine' => 'required|string|max:255',
        'question' => 'nullable|string',
        'myfile' => 'required|mimes:pdf|max:2048'
    ]);

    // stocker le fichier dans le dossier public
    //$path = $request->file('myfile')->store('public/cv');

    // récupérer le contenu du fichier
    //$content = file_get_contents(storage_path('app/' . $path));

    // enregistrer les données dans la base de données
    $candidat = new Candidat();
    $candidat->email = $validated['email'];
    $candidat->nom = $validated['nom'];
    $candidat->prenom = $validated['prenom'];
    $candidat->telephone = $validated['telephone'];
    $candidat->adresse = $validated['adresse'];
    $candidat->domaine = $validated['domaine'];
    $candidat->question = $validated['question'];

    if ($request->hasFile('myfile')) {
        $file= $candidat->myfile = $request->file('myfile');
        $extension =$file->getClientOriginalExtension();
         $filename = time().'.'.$extension;
        $file->move("file",$filename);
        $candidat->myfile = $filename;
    }
    $candidat->save();
    // Envoyer un e-mail de notification
    Mail::to($validated['email'])->send(new CandidatureNotification($validated['email']));

    // afficher un message de succès
    return back()->with('success', 'Votre candidature a été enregistrée avec succès!');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidat = Candidat::findOrFail($id);

//dd($candidat);
        return view('candidat.montrer',compact('candidat'));

    }
//     public function downloadPDF($filename)
// {
//     // Vérifier si le fichier existe dans le dossier de stockage
//     if (Storage::exists('pdf/' . $filename)) {
//         // Récupérer le contenu du fichier
//         $file = Storage::get('pdf/' . $filename);
//         // Définir le type de contenu
//         $type = Storage::mimeType('pdf/' . $filename);
//         // Définir les en-têtes HTTP pour le téléchargement
//         $headers = [
//             'Content-Type' => $type,
//             'Content-Disposition' => 'attachment; filename="' . $filename . '"',
//         ];
//         // Retourner la réponse avec le contenu du fichier, les en-têtes HTTP et le code d'état 200 (OK)
//         return response($file, 200, $headers);
//     }
//     // Si le fichier n'existe pas, retourner une erreur 404 (NOT FOUND)
//     abort(404);
// }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidat = Candidat::find($id);

        return view('candidat.editer',compact('candidat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $candidat = Candidat::findOrFail($id);
        // $candidat->update($request->all());

        $candidat->update($request->except('myfile'));
        return view('candidat.liste',compact('candidat'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidat = Candidat ::find($id);
        $candidat->delete();
        return back();
    }
}
