<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;


class CVController extends Controller
{
    // Affiche la liste des CV
    public function index()
    {
        if (Auth::check()) {
            $cvs = Auth::user()->isAdmin()? CV::all() : Auth::user()->cvs;
            return view('cv.submit', ['cvs' => $cvs]); // Correction ici
        } else {
            return Redirect::route('login')->with('error', 'Vous devez vous connecter pour accéder à cette page.');
        }
    }
    // Affiche le formulaire de création de CV
    public function create()
    {
        $cvs = CV::all();
        return view('cv.create', compact('cvs'));
    }

    // Affiche le formulaire de soumission de CV
    public function showSubmitForm()
    {
        $cvs = CV::all();
        return view('cv.submit', ['cvs' => $cvs]);
    }

    // Affiche un CV spécifique
    public function show($id)
    {
        $cv = CV::findOrFail($id);
        return view('cv.show', compact('cv'));
    }

    // Traite la soumission de CV
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'nom_complet' => 'required|string|max:255',
            'adresse_email' => 'required|email|max:255',
            'numero_telephone' => 'required|string|max:20',
            'poste_actuel' => 'required|string|max:255',
            'entreprise_actuelle' => 'required|string|max:255',
            'annees_experience' => 'required|integer',
            'dernier_diplome' => 'required|string|max:255',
            'domaine_etudes' => 'required|string|max:255',
            'competences' => 'required|string',
            'cv' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'motivation' => 'nullable|string',
            'disponibilites_entretien' => 'nullable|string',
        ]);

        // Enregistrement du fichier CV
        $cvFileName = $request->file('cv')->getClientOriginalName();
        $request->file('cv')->storeAs('cvs', $cvFileName);

        // Ajout de l'ID de l'utilisateur au tableau de données validées
        $user_id = Auth::id();
        if (!$user_id) {
            return Redirect::route('login')->with('error', 'Vous devez vous connecter pour soumettre un CV.');
        }
        $validatedData['user_id'] = $user_id;

        // Création du CV
        CV::create(array_merge($validatedData, ['cv_filename' => $cvFileName]));

        return Redirect::route('cv.index')->with('success', 'CV soumis avec succès !');
    }
}
