<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProfDiscModel extends Model
{
    protected $fillable = [
        'professor',
        'disciplina'
    ];

    protected $table = 'professordisciplina';

    public function insertProfDisc($data)
    {
        return $this->save($data);
    }

    public function getDiscsFromProf($id) 
    {
        $disciplinas = DB::table('professordisciplina')
            ->join('professor', 'professor.id', '=', 'professordisciplina.professor')
            ->join('disciplina', 'disciplina.id', '=', 'professordisciplina.disciplina')
            ->select('disciplina.nome')
            ->where('professor.nome', '=', $id)
            ->get();
            $values = [];

            foreach ($disciplinas as $disciplina) {
                array_push($values, [$disciplina->nome]);
            }

            return $values;

    }
 
    
}

?>