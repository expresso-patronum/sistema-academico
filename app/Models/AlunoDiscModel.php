<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlunoDiscModel extends Model
{
    protected $fillable = [
        'aluno',
        'disciplina',
        'mediaFinal',
        'frequencia'
    ];
   // public $timestamps = false;
    protected $table = 'alunodisciplina';

    public function insertAlunoDisc($data)
    {
        return $this->save($data);
    }

    public function getDiscsFromAluno($id) 
    {
    
        $disciplinas = DB::table('alunodisciplina')
            ->join('aluno', 'aluno.matricula', '=', 'alunodisciplina.aluno')
            ->join('disciplina', 'disciplina.id', '=', 'alunodisciplina.disciplina')
            ->select('*')
            ->where('aluno.matricula', '=', $id)
            ->get();
            $values = [];

            foreach ($disciplinas as $disciplina) {
                array_push($values, [$disciplina->id, $disciplina->nome, $disciplina->ch]);
            }

            return $values;
    }

    public function getDados($id) {
        $dados = DB::table('alunodisciplina')
        ->join('aluno', 'aluno.matricula', '=', 'alunodisciplina.aluno')
        ->join('disciplina', 'disciplina.id', '=', 'alunodisciplina.disciplina')
        ->select('alunodisciplina.frequencia as frequencia', 'disciplina.nome as disciplina', 'alunodisciplina.mediaFinal as media', 'aluno.nome as aluno')
        ->where('aluno.matricula', '=', $id)
        ->get();
        
        $values = [];

        foreach ($dados as $dado) {
            array_push($values, [$dado->aluno, $dado->disciplina, $dado->frequencia, $dado->media]);
        }

        return $values;
    }

    
    public function getAlunosFromDisc($nomeDaDisciplina) 
    {
    
        $disciplinas = DB::table('alunodisciplina')
            ->join('aluno', 'aluno.matricula', '=', 'alunodisciplina.aluno')
            ->join('disciplina', 'disciplina.id', '=', 'alunodisciplina.disciplina')
            ->select('aluno.nome as nome')
            ->where('disciplina.nome', '=', $nomeDaDisciplina)
            ->get();
 
         $values=[];
         foreach ($disciplinas as $disciplina) {
            array_push($values, [$disciplina->nome]);
         }
         return $values;

    }

    public function getNotaMaxDisc($nomeDaDisciplina) 
    {
    
        $maiorNota = DB::table('alunodisciplina')
            ->join('disciplina', 'disciplina.id', '=', 'alunodisciplina.disciplina')
            ->where('disciplina.nome', '=', $nomeDaDisciplina)
            ->max('alunodisciplina.mediaFinal');

        $disciplinas = DB::table('alunodisciplina')
            ->join('aluno', 'aluno.matricula', '=', 'alunodisciplina.aluno')
            ->join('disciplina', 'disciplina.id', '=', 'alunodisciplina.disciplina')
            ->select('alunodisciplina.disciplina as discid', 'aluno.nome as nome', 'alunodisciplina.mediaFinal as mediaFinal')
            ->where([
                ['disciplina.nome', '=', $nomeDaDisciplina],
                ['alunodisciplina.mediaFinal', '=', $maiorNota]])
            ->get();

        $values=[];
        foreach ($disciplinas as $disciplina) {
            array_push($values, [$disciplina->nome, $disciplina->mediaFinal]);
        }
        return $values;
    }

}

?>