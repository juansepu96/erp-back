<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class GenerateEnum extends Command
{
    protected $signature = 'generate:enum {input} {output} {name=MyEnum}';
    protected $description = 'Genera un archivo enum a partir de un archivo SQL';

    public function handle(): void
    {
        $inputFile = storage_path('app/script.sql');
        $outputFile = storage_path('app/CityEnum.php');
        $enumName = $this->argument('name');

        // Leer el archivo SQL
        if (!file_exists($inputFile)) {
            die("El archivo SQL no existe: $inputFile\n");
        }

        $sqlContent = file_get_contents($inputFile);

        // Expresión regular para capturar (id_ciudades, idProvincia_ciudades, 'ciudad')
        $pattern = "/\((\d+),\s*(\d+),\s*'([^']+)'\)/";
        preg_match_all($pattern, $sqlContent, $matches, PREG_SET_ORDER);

        if (empty($matches)) {
            die("No se encontraron registros en el archivo SQL.\n");
        }


        // Construir el enum
        $enumContent = "<?php\n\n";
        $enumContent .= "namespace Src\\Shared\\Enums;\n\n";
        $enumContent .= "enum $enumName: int\n{\n";

        // Generar los cases del enum
        foreach ($matches as $match) {
            $id_ciudad = $match[1];
            $ciudad = $this->sanitizeCityName($match[3], $match[1]);
            $enumContent .= "    case $ciudad = $id_ciudad;\n";
        }

        // Generar el método estático `name`
        $enumContent .= "\n    public static function name(int \$id): string\n";
        $enumContent .= "    {\n";
        $enumContent .= "        return match (\$id) {\n";

        foreach ($matches as $match) {
            $id_ciudad = $match[1];
            $ciudad = $this->sanitizeCityName($match[3], $match[1]);
            $enumContent .= "            $id_ciudad => '$ciudad',\n"; // Aquí se compara directamente el id_ciudad
        }

        $enumContent .= "            default => 'Desconocido',\n";
        $enumContent .= "        };\n";
        $enumContent .= "    }\n";

        // Generar el método para obtener la provincia
        $enumContent .= "\n    public static function provinceId(int \$id): int\n";
        $enumContent .= "    {\n";
        $enumContent .= "        return match (\$id) {\n";

        foreach ($matches as $match) {
            $id_ciudad = $match[1];
            $id_provincia = $match[2];
            $ciudad = $this->sanitizeCityName($match[3], $match[1]);
            $enumContent .= "            $id_ciudad => $id_provincia,\n"; // Compara directamente por id_ciudad
        }

        $enumContent .= "            default => 0,\n"; // Devolvemos 0 si no se encuentra la ciudad
        $enumContent .= "        };\n";
        $enumContent .= "    }\n";

        $enumContent .= "}\n";

        // Escribir el archivo de salida
        file_put_contents($outputFile, $enumContent);

        $this->info("Enum generado correctamente en: $outputFile");
    }

    private function sanitizeCityName(string $city, int $id_ciudad): string
    {
        // Convertir a mayúsculas
        $city = strtoupper($city);

        // Eliminar tildes y caracteres especiales
        $city = strtr($city, [
            'á' => 'A', 'é' => 'E', 'í' => 'I', 'ó' => 'O', 'ú' => 'U',
            'Á' => 'A', 'É' => 'E', 'Í' => 'I', 'Ó' => 'O', 'Ú' => 'U',
            'ñ' => 'N', 'Ñ' => 'N', ' ' => '_', '.' => '', ',' => '', ';' => '',
            ':' => '', '!' => '', '?' => '', '\'' => '', '"' => '',
            '¡' => '', '¿' => ''
        ]);

        // Si el nombre de la ciudad es un número, agregamos un prefijo
        if (is_numeric($city)) {
            $city = 'CITY_' . $city;
        }

        // Agregar el ID de la ciudad al nombre para hacerlo único
        $city = preg_replace('/[^A-Za-z0-9_]/', '', $city);  // Eliminar caracteres no válidos
        $city = $city . '_' . $id_ciudad;  // Sufijo único (ID de ciudad)

        return $city;
    }


}
