<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SelectionDetail;
class SelectionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Lista de países
$countries = [
    'Argentina', 'Bolivia', 'Brasil', 'Chile', 'Colombia', 
    'Costa Rica', 'Cuba', 'República Dominicana', 'Ecuador', 
    'El Salvador', 'Guatemala', 'Honduras', 'México', 'Nicaragua', 
    'Panamá', 'Paraguay', 'Perú', 'Puerto Rico', 'Uruguay', 'Venezuela', 

    'Canadá', 'Estados Unidos', 

    'Albania', 'Alemania', 'Andorra', 'Austria', 'Bélgica', 'Bielorrusia', 
    'Bosnia y Herzegovina', 'Bulgaria', 'Chipre', 'Croacia', 'Dinamarca', 
    'Eslovaquia', 'Eslovenia', 'España', 'Estonia', 'Finlandia', 'Francia', 
    'Grecia', 'Hungría', 'Irlanda', 'Islandia', 'Italia', 'Kosovo', 'Letonia', 
    'Liechtenstein', 'Lituania', 'Luxemburgo', 'Macedonia del Norte', 'Malta', 
    'Moldavia', 'Mónaco', 'Montenegro', 'Noruega', 'Países Bajos', 'Polonia', 
    'Portugal', 'Reino Unido', 'República Checa', 'Rumania', 'Rusia', 'San Marino', 
    'Serbia', 'Suecia', 'Suiza', 'Turquía', 'Ucrania', 'Vaticano'
];

// Iterar sobre cada país
foreach($countries as $country) {
    SelectionDetail::create([
        'description' => $country,
        'detail' => '',
        'selection_id' => '1',
        
    ]);
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////

// Lista de regiones de Perú
$regions = [
    'Amazonas', 'Áncash', 'Apurímac', 'Arequipa', 'Ayacucho',
    'Cajamarca', 'Callao', 'Cusco', 'Huancavelica', 'Huánuco',
    'Ica', 'Junín', 'La Libertad', 'Lambayeque', 'Lima',
    'Loreto', 'Madre de Dios', 'Moquegua', 'Pasco', 'Piura',
    'Puno', 'San Martín', 'Tacna', 'Tumbes', 'Ucayali'
];

// Iterar sobre cada región
foreach($regions as $region) {
    SelectionDetail::create([
        'description' => $region,
        'detail' => '',
        'selection_id' => '2',
    ]);
}
    }
}
