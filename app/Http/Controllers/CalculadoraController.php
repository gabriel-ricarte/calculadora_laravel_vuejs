<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculadoraController extends Controller
{
    public function soma($valor_um,$valor_dois){
        return $valor_um+$valor_dois;
    }

    public function subtrai($valor_um,$valor_dois){
        return $valor_um-$valor_dois;
    }

    public function multiplica($valor_um,$valor_dois){
        return $valor_um*$valor_dois;
    }

    public function divide($valor_um,$valor_dois){
        return $valor_um/$valor_dois;
    }
}
