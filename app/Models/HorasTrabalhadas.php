<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class HorasTrabalhadas extends Model
{
    public static function calcular(DateTime $horaEntrada, DateTime $horaSaida)
    {
        $horaInicioNoite = new DateTime("22:00:00");
        $horaVirada = new DateTime("00:00:00");
        $horaVirada->modify('+1 day');
        $horaFimNoite = new DateTime("05:00:00");

        $entrouDia = $horaEntrada < $horaInicioNoite &&
                     $horaEntrada >= $horaFimNoite ? true : false;

        $saiuDia = $horaSaida <= $horaInicioNoite &&
                   $horaSaida > $horaFimNoite ? true : false;

        $saiuNoite = $horaSaida <= $horaFimNoite ||
                     $horaSaida > $horaInicioNoite ? true : false;

        $virouData = $horaSaida < $horaEntrada ? true : false;

        if($virouData){
            $horaSaida->modify('+1 day');
            $horaFimNoite->modify('+1 day');
            $saiuDia = $horaSaida > $horaFimNoite->modify('+1 day') ? true : false;
        };

        if ($entrouDia) {
            if ($saiuDia) {
                if ($virouData){
                    $horaDiurnaCalculada = $horaEntrada->sub($horaFimNoite->diff($horaSaida));
                    $horaDiurnaCalculada = $horaEntrada->diff($horaInicioNoite)->format("%H:%I");
                    $horaNoturnaCalculada = "07:00";

                    return array("HorasDiurnas" => $horaDiurnaCalculada,
                                 "HorasNoturnas" => $horaNoturnaCalculada);
                }
                $horaDiurnaCalculada = $horaEntrada->diff($horaSaida)->format("%H:%I");
                $horaNoturnaCalculada = " ";
                return array("HorasDiurnas" => $horaDiurnaCalculada,
                            "HorasNoturnas" => $horaNoturnaCalculada);
            }
            if ($virouData){
                $horaDiurnaCalculada = $horaEntrada->diff(($horaInicioNoite));
                $horaNoturnaCalculada = $horaInicioNoite->diff($horaSaida);

                return array("HorasDiurnas" => $horaDiurnaCalculada->format("%H:%I"),
                             "HorasNoturnas" => $horaNoturnaCalculada->format("%H:%I"));
            }
            $horaDiurnaCalculada = $horaEntrada->diff($horaInicioNoite)->format("%H:%I");
            $horaNoturnaCalculada = $horaInicioNoite->diff($horaSaida)->format("%H:%I");

            return array("HorasDiurnas" => $horaDiurnaCalculada,
                         "HorasNoturnas" => $horaNoturnaCalculada);
        } else {
            if ($saiuDia) {
                $horaDiurnaCalculada = $horaFimNoite->diff($horaSaida)->format("%H:%I");
                $horaNoturnaCalculada = $horaEntrada->diff($horaFimNoite)->format("%H:%I");

                return array("HorasDiurnas" => $horaDiurnaCalculada,
                "HorasNoturnas" => $horaNoturnaCalculada);
            }
            if ($virouData){
                $horaDiurnaCalculada = "";
                $horaNoturnaCalculada = $horaEntrada->add($horaFimNoite->diff($horaInicioNoite));
                $horaNoturnaCalculada = $horaEntrada->diff($horaFimNoite)->format("%H:%I");

                return array("HorasDiurnas" => "17:00",
                "HorasNoturnas" => $horaNoturnaCalculada);
            }
            $horaDiurnaCalculada = $horaFimNoite->diff($horaSaida)->format("%H:%I");
            $horaNoturnaCalculada = $horaEntrada->diff($horaSaida)->format("%H:%I");

            return array("HorasDiurnas" => "",
            "HorasNoturnas" => $horaNoturnaCalculada);
        }
    }
}
