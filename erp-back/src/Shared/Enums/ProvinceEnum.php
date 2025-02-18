<?php

namespace Src\Shared\Enums;

enum ProvinceEnum: int
{
    case BUENOS_AIRES = 1;
    case BUENOS_AIRES_GBA = 2;
    case CAPITAL_FEDERAL = 3;
    case CATAMARCA = 4;
    case CHACO = 5;
    case CHUBUT = 6;
    case CORDOBA = 7;
    case CORRIENTES = 8;
    case ENTRE_RIOS = 9;
    case FORMOSA = 10;
    case JUJUY = 11;
    case LA_PAMPA = 12;
    case LA_RIOJA = 13;
    case MENDOZA = 14;
    case MISIONES = 15;
    case NEUQUEN = 16;
    case RIO_NEGRO = 17;
    case SALTA = 18;
    case SAN_JUAN = 19;
    case SAN_LUIS = 20;
    case SANTA_CRUZ = 21;
    case SANTA_FE = 22;
    case SANTIAGO_DEL_ESTERO = 23;
    case TIERRA_DEL_FUEGO = 24;
    case TUCUMAN = 25;

    public function name(): string
    {
        return strtoupper(match ($this) {
            self::BUENOS_AIRES => 'Buenos Aires',
            self::BUENOS_AIRES_GBA => 'Buenos Aires-GBA',
            self::CAPITAL_FEDERAL => 'Capital Federal',
            self::CATAMARCA => 'Catamarca',
            self::CHACO => 'Chaco',
            self::CHUBUT => 'Chubut',
            self::CORDOBA => 'Córdoba',
            self::CORRIENTES => 'Corrientes',
            self::ENTRE_RIOS => 'Entre Ríos',
            self::FORMOSA => 'Formosa',
            self::JUJUY => 'Jujuy',
            self::LA_PAMPA => 'La Pampa',
            self::LA_RIOJA => 'La Rioja',
            self::MENDOZA => 'Mendoza',
            self::MISIONES => 'Misiones',
            self::NEUQUEN => 'Neuquén',
            self::RIO_NEGRO => 'Río Negro',
            self::SALTA => 'Salta',
            self::SAN_JUAN => 'San Juan',
            self::SAN_LUIS => 'San Luis',
            self::SANTA_CRUZ => 'Santa Cruz',
            self::SANTA_FE => 'Santa Fe',
            self::SANTIAGO_DEL_ESTERO => 'Santiago del Estero',
            self::TIERRA_DEL_FUEGO => 'Tierra del Fuego',
            self::TUCUMAN => 'Tucumán',
        });
    }
}
