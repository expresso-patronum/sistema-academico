<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\AlunoModel;
use App\Models\AlunoDiscModel;
use App\Models\DisciplinaModel;
use Exception;

class AlunosController extends Controller
{


   public function perfilAlunos()
   {

      return view ('perfilAlunos');

   }

   public function perfilAlunoProcurar(Request $request){
      $data = array(
         'matricula' => $request->matricula
      );

      $alunomodel = new AlunoModel();
      $alunodiscmodel = new AlunoDiscModel;
      $data2 =  $alunodiscmodel ->getDiscsFromAluno($data['matricula']);
      $dataAluno = $alunodiscmodel->getDados($data['matricula']);

      return view('perfilAluno', ['disciplinas'=>$dataAluno]);
   }

   public function cadastroAluno()
   {
      $disciplinamodel = new DisciplinaModel;
      $data =  $disciplinamodel->getDisciplinas();

     
      return view('cadastroAluno', ['disciplinas'=>$data]);
   }

   public function cadastrarAluno(Request $request)
   {

    $alunomodel = new AlunoModel;
    $random = rand(10000000, 99999999);
    $data = array(

        'matricula' => $random,
        
        'nome' => $request->nome,

        'email' => $request->email
    );

   $id = $alunomodel->insertGetId($data);

    return redirect('/cadastroAluno');

   } 




 


   public function cadastroAlunoDisc()
   {
         $disciplinamodel = new DisciplinaModel;
         $disciplinas =  $disciplinamodel->getDisciplinas();
        
         return view('cadastroAlunoDisc', ['disciplinas'=>$disciplinas]);
   }


   public function cadastrarAlunoDisc(Request $request)
   {
      $alunodiscmodel = new AlunoDiscModel();
      $disciplinamodel = new DisciplinaModel();

      $results = $alunodiscmodel->getDiscsFromAluno($request->aluno);
      $chs = [];

      foreach ($results as $result) {
         array_push($chs, $result[2]);
      }

      $disciplinas = $disciplinamodel->getDisciplinas($request->disciplina);

      foreach ($disciplinas as $disciplina) {
         array_push($chs, $disciplina->ch);
      }

      $chfinal = array_sum($chs);

      if ($chfinal <= 50) {
         
         $data = array(

            'aluno' => $request->aluno,
            
            'disciplina' => $request->disciplina,
   
            'mediaFinal' => $request->media,
   
            'frequencia' => $request->frequencia,
         );
   
         $alunodiscmodel->insert($data);
   
         return redirect('/perfilAlunos');
      } else {

         return throw new Exception('Carga horária irá exceder o limite de 50 horas semanais!!!');

      }

   }




}
