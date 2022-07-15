<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DisciplinaModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nome',
        'ch',
     ];

    protected $table = 'disciplina';

    public function insertDisciplina($data)
    {
        return $this->save($data);
    }

    public function getDisciplinas($id = null)
    {
        if($id == null) {
            $disciplinas = DB::table('disciplina')->get();
            $values = [];

            foreach ($disciplinas as $disciplina) {
                array_push($values, [$disciplina->id, $disciplina->nome, $disciplina->ch]);
            }

            return $values;
        } else {
            $disciplina = DB::table('disciplina')
                ->select('*')
                ->where('disciplina.id', '=', $id)
                ->get();
            return $disciplina;
        }
    }

    
}

?>