<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class HorasTrabalhadas extends Model
{
    public static function calcular(DateTime $horaEntrada, DateTime $horaSaida)
    {
        $horaInicioNoite = new DateTime("22:00:00");
        $horaFimNoite = new DateTime("05:00:00");

        if($horaSaida < $horaEntrada){
            $horaSaida->modify('+1 day');
        };

        $entrouDia = $horaEntrada < $horaInicioNoite &&
                     $horaEntrada >= $horaFimNoite ? true : false;

        $saiuDia = $horaSaida <= $horaInicioNoite &&
                   $horaSaida > $horaFimNoite ? true : false;

        $saiuNoite = $horaSaida < $horaFimNoite ||
                     $horaSaida >= $horaInicioNoite ? true : false;

        //Dia trabalhado sem Hora Noturna
        if ($entrouDia && $saiuDia) {
            return $horaEntrada->diff($horaSaida)->format("%H:%I");
        }
    }
}
