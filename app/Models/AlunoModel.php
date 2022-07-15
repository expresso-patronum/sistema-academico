<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlunoModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'matricula',
        'nome',
        'email',
     ];

    protected $table = 'aluno';

    public function insertAluno($data)
    {
        return $this->save($data);
    }

    public function getAllAlunos()
    {
        return DB::table('aluno')->get();
        //return $this->belongsTo(Alunos::class, 'matricula');
    }

    public function getAlunoPorId($id)
    {
        $aluno = DB::table('aluno')
        ->select('*')
        ->where('aluno.matricula', '=', $id)
        ->get();

        return $aluno;
    }
}


?>