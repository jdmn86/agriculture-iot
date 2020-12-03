<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $fillable = [  
        'id',  
        'name' ,
        'master_plant_id',
        'nome_variedade' ,
        'name_cientifico',
        'tipo_planta_id',
        // 'tipo_dias', 
        'fracao_esgotamento_agua_solo_conforto_hidrico',
        // 'solo_drenagem',
        // 'solo_arejado',
        'ph_min',
        'ph_max',  
        // 'month_inicio',
        'compasso_plantas',
        'compasso_linhas',
        'fotoperiodo',
        // 'rotacoes',
        // 'producao', 
        // 'dias_germinacao',
        // 'dias_transplantacao',
        // 'dias_crescimento',
        'created_at', 
        'image',
        // 'amontoada',
        'water_consumption',
        'user_id'
]; 

public function plantType()
{
    return $this->belongsTo(PlantType::class,'tipo_planta_id');
}
// public function user()
// {
//     return $this->belongsTo(User::class,'user_id');
// }

//     public function fases()  
//     {
//         return $this->hasMany(FaseCultivo::class,'plant_id','id');
//     } 

//     public function desfavoravel()  
//     {
//         return $this->hasMany(ConsociacaoDesfavoravel::class,'id_plant');
//     } 

//     public function favoravel() 
//     {
//         return $this->hasMany(ConsociacaoFavoravel::class,'id_plant');
//     }

// public function pragas()
// {
//     return $this->belongsToMany('App\Praga','plant_pragas','plants_id','pragas_id');
// }

}
