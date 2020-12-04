<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoilType extends Model
{
    use HasFactory;

    protected $fillable = [
        'id' ,
        'nome_solo',
        'argila_percentagem', 
        'silte_percentagem',
        'areia_percentagem',
        'capacidade_campo',
        'capacidade_emurchecimento', 
        'massa_volumica_aparente',
        'agua_disponivel_total',
        'created_at', 
        // 'distancia_medicao'
   ]; 

}
 