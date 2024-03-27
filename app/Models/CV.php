<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class CV extends Model
{
    use HasFactory;

    protected $table = 'cvs';

    protected $fillable = [
        'nom_complet',
        'adresse_email',
        'numero_telephone',
        'poste_actuel',
        'entreprise_actuelle',
        'annees_experience',
        'dernier_diplome',
        'domaine_etudes',
        'competences',
        'cv_filename',
        'motivation',
        'disponibilites_entretien',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
