<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CV;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function showSearchForm()
    {
        $cvs = CV::all();
        return view('cv.index', compact('cvs'));
    }

    public function search(Request $request)
    {
        // Récupérez les critères de recherche depuis la requête
        $experience = $request->input('experience');
        $skills = $request->input('skills');
        $location = $request->input('location');

        // Implémentez la logique de recherche en fonction des critères
        $query = CV::query();

        if ($experience) {
            $query->where('experience', $experience);
        }

        if ($skills && is_array($skills)) { // Vérifiez si $skills est un tableau
            $query->whereIn('skill', $skills);
        }

        if ($location) {
            $query->where('location', $location);
        }

        // Exécutez la requête et récupérez les résultats
        $cvs = $query->get();

        // Retournez les résultats de la recherche à la vue
        return view('cv.index', compact('cvs'));
    }


}
