<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use PDF;

class CVController extends Controller
{
    // Affiche la liste des CV
    public function index()
    {
        $cvs = CV::all();
        if (Auth::check()) {
            $user = Auth::user();
            $cvs = ($user->role === 'admin') ? CV::all() : $user->cvs;
            $totalCV = $cvs->count();// Récupérer le nombre total de CV

            return view('cv.index', compact('cvs', 'totalCV'));
        } else {
            return Redirect::route('login')->with('error', 'Vous devez vous connecter pour accéder à cette page.');
        }
    }

    // Affiche le formulaire de création de CV
    public function create()
    {
        return view('cv.create');
    }

    // Affiche le formulaire de soumission de CV
    public function showSubmitForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cvs = ($user->role === 'admin') ? CV::all() : $user->cvs;
            return view('cv.submit', ['cvs' => $cvs]);
        } else {
            return redirect()->route('login')->with('error', 'Vous devez vous connecter pour déposer un CV.');
        }
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
        try {
            // Validation des données
            $request->validate([
                'nom_complet' => 'required|string|max:255',
                'adresse_email' => [
                    'required',
                    'email',
                    'max:255',
                ],
                'numero_telephone' => [
                    'required',
                    'string',
                    'max:20',
                ],
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
            $cvFileName = $request->file('cv')->storeAs('cvs', $request->file('cv')->getClientOriginalName());

            // Ajout de l'ID de l'utilisateur au tableau de données validées
            $user = Auth::user();
            $user->cvs()->create(array_merge($request->all(), ['cv_filename' => $cvFileName]));

            return Redirect::route('cv.index')->with('success', 'CV soumis avec succès !');

        } catch (\Exception $e) {
            // Si une exception se produit, c'est probablement à cause d'une violation de contrainte unique
            // Vous pouvez donc renvoyer une erreur avec un message approprié
            return redirect()->back()->withErrors(['erreur' => 'Les informations saisies existent déjà dans la base de données.'])->withInput();
        }
    }


  // Méthode pour récupérer les compteurs
  public function fetchCounts()
  {
      $counts = [];

      if (Auth::check()) {
          $user = Auth::user();
          if ($user->role === 'admin') {
              $counts['totalCV'] = CV::count();
              // Ajoutez d'autres compteurs selon vos besoins
          } else {
              // Logique pour les utilisateurs non administrateurs
          }
      } else {
          // Logique pour les utilisateurs non connectés
      }

      return $counts;
  }

  public function edit($id)
    {
        // Récupérer le CV à modifier
        $cv = CV::findOrFail($id);

        // Retourner la vue du formulaire de modification avec les données du CV
        return view('cv.edit', compact('cv'));
    }

    // Méthode pour mettre à jour un CV
    public function update(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom_complet' => 'required|string',
            'adresse_email' => 'required|email',
            'numero_telephone' => 'required|string',
            'poste_actuel' => 'required|string',
            'entreprise_actuelle' => 'required|string',
            'annees_experience' => 'required|integer',
            'dernier_diplome' => 'required|string',
            'domaine_etudes' => 'required|string',
            'competences' => 'required|string',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'motivation' => 'required|string',
            'disponibilites_entretien' => 'required|string',
        ]);

        // Trouver le CV à mettre à jour
        $cv = CV::findOrFail($id);

        // Mettre à jour les données du CV
        $cv->update([
            'nom_complet' => $request->input('nom_complet'),
            'adresse_email' => $request->input('adresse_email'),
            'numero_telephone' => $request->input('numero_telephone'),
            'poste_actuel' => $request->input('poste_actuel'),
            'entreprise_actuelle' => $request->input('entreprise_actuelle'),
            'annees_experience' => $request->input('annees_experience'),
            'dernier_diplome' => $request->input('dernier_diplome'),
            'domaine_etudes' => $request->input('domaine_etudes'),
            'competences' => $request->input('competences'),
            'motivation' => $request->input('motivation'),
            'disponibilites_entretien' => $request->input('disponibilites_entretien'),
        ]);

        // Mettre à jour le fichier CV s'il est fourni
        if ($request->hasFile('cv')) {
            $cvFile = $request->file('cv');
            $cvFileName = $cvFile->getClientOriginalName();
            $cvFilePath = $cvFile->storeAs('cvs', $cvFileName, 'public');
            $cv->update(['cv_filename' => $cvFileName, 'cv_filepath' => $cvFilePath]);
        }

        // Redirection avec un message de succès
        return redirect()->route('cv.index')->with('success', 'CV mis à jour avec succès.');
    }

    public function destroy($id)
    {
        // Trouver le CV à supprimer
        $cv = CV::findOrFail($id);

        // Supprimer le CV
        $cv->delete();

        // Redirection avec un message de succès
        return redirect()->route('cv.index')->with('success', 'CV supprimé avec succès.');
    }


    // public function showPdf($id)
    // {
    //     $cv = CV::findOrFail($id);

    //     // Générer le PDF
    //     $pdf = PDF::loadView('cv.pdf', ['cv' => $cv]);

    //     // Retourner la vue PDF avec le PDF
    //     return $pdf->stream();
    // }

    public function showPdf($id)
    {
        $cv = CV::findOrFail($id);

        // Vérifier si l'utilisateur est autorisé à accéder au CV
        if (Auth::user()->role === 'admin' || Auth::user()->id === $cv->user_id) {
            // Générer le PDF
            $pdf = PDF::loadView('cv.pdf', ['cv' => $cv]);

            // Retourner la vue PDF avec le PDF
            return $pdf->stream();
        } else {
            // Si l'utilisateur n'est pas autorisé, renvoyer une erreur ou rediriger
            return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à accéder à ce CV.');
        }
    }


}
