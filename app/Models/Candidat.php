<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidat extends Model
{
    use HasFactory,

        SoftDeletes;

    protected $fillable = [
        'email',
        'nom',
        'prenom',
        'telephone',
        'adresse',
        'domaine',
        'myfile',
        'question'
    ];

}

// supprimer un enregistrement en utilisant la méthode delete() sur votre modèle :
$candidat = Candidat::find(1);
// dd($candidat);
if ( $candidat !=null) {
    $candidat->delete();
}

//récupérer tous les enregistrements, y compris ceux marqués comme supprimés, vous pouvez utiliser la méthode withTrashed() :

$candidat = Candidat::withTrashed()->get();

//écupérer uniquement les enregistrements supprimés, vous pouvez utiliser la méthode onlyTrashed() :

$candidat = Candidat::onlyTrashed()->get();

// Eestaurer un enregistrement supprimé, vous pouvez utiliser la méthode restore() :

$candidat = Candidat::onlyTrashed()->find(1);
if ( $candidat !=null) {
    $candidat->restore();
}





