<?php

namespace App\Http\Controllers;

use App\Models\AlunoDiscModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProfessorModel;
use App\Models\DisciplinaModel;
use App\Models\ProfDiscModel;

class ProfessoresController extends Controller
{

   public function perfilProfessores()
   {
     /* $professormodel = new ProfessorModel();
      $data['all'] = $professormodel->get();
      $data['professores'] = $data['all'];
      return view('perfilProfessores', $data);*/

      $professormodel = new ProfessorModel();
      //$disciplinamodel = new DisciplinaModel();
      $profdiscmodel = new ProfDiscModel();

      //$data['disciplinas'] = $profdiscmodel->getDiscsFromProf($id);

      return view ('perfilProfessores');

   }

   public function cadastroProfessor()
   {
      $disciplinamodel = new DisciplinaModel;
      $data =  $disciplinamodel->getDisciplinas();
      //var_dump($disciplinas[0]->nome);
     
      return view('cadastroProfessor', ['disciplinas'=>$data]);
   }

   public function cadastrarProfessor(Request $request)
   {

    $professormodel = new ProfessorModel;
    $data = array(
        
        'nome' => $request->nome,

        'email' => $request->email

    );
    $id = $professormodel->insertGetId($data);
    
    $profdiscmodel = new ProfDiscModel;

   for($i = 0; $i < count($request->disciplinas); $i++){
      $data2 = array(
         'professor' => intval($id),
         'disciplina'=> intval($request->disciplinas[$i]),
      );
   
      $profdiscmodel->insert($data2);
   }

   return redirect('/cadastroProfessor');

   }

   public function perfilProfessor(Request $request){
      
      $data = array(
         'professor' => $request->professor
      );
    
      $alunomodel = new ProfessorModel();
      $profdiscmodel = new ProfDiscModel();
      $alunodiscmodel = new  AlunoDiscModel();
      $data2 =  $profdiscmodel ->getDiscsFromProf($data['professor']);
      $disciplinasDoProfessor = [];

      for ($i = 0; $i < count($data2); $i++){

         array_push($disciplinasDoProfessor, $data2[$i]);

      }

      $todosOsAlunos = [];
      $notasAlunos = [];

      for ($i=0; $i < count($disciplinasDoProfessor); $i++){
            
         $alunosdiscs = $alunodiscmodel->getAlunosFromDisc($disciplinasDoProfessor[$i]);

         array_push($todosOsAlunos, $alunosdiscs);

         $notasdiscs = $alunodiscmodel->getNotaMaxDisc($disciplinasDoProfessor[$i]);

         array_push($notasAlunos, $notasdiscs);

      };

   return view('perfilProfessor', ['professor' => $data['professor'], 'alunos' => $todosOsAlunos, 'disciplinas' => $disciplinasDoProfessor, 'notas' => $notasAlunos] );

      }
}
