<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DisciplinaModel;


class DisciplinasController extends Controller
{

   public function cadastroDisciplina()
   {
      return view('cadastroDisciplina');
   }

   public function cadastrarDisciplina(Request $request)
   {

   $disciplinamodel = new DisciplinaModel;
   $data = array(

      'nome' => $request->nome,

      'ch' => $request->ch

   );
   
   $disciplinamodel->insert($data);
   return redirect('/cadastroDisciplina');

   }
}
