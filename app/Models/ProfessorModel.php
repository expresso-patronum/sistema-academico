<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ProfessorModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'email',
     ];

    protected $table = 'professor';

    public function insertProfessor($data)
    {
        return $this->save($data);
    }

    public function getProfessores()
    {
        return DB::table('professor')->get();
  
    }
}

?>