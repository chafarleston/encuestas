<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
//agregar hash
use Illuminate\Support\Facades\Hash;
use App\Models\User;



class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'administrar']);
        $role = Role::create(['name' => 'Administrador']);
        $role->syncPermissions("administrar");
        // create user
        $user1= User::create([
            'dni' => '70066422',
            'firstname' => 'Herrera',
            'lastname' => 'Bendezú',
            'names' => 'Monica Arizú',
            'password' => Hash::make('sdc123456'),
            'datebirth' => '1994-03-08',
            'cellphone' => '967687216',
            'sex' => 'F',
            'email' => 'monica.herrera@unmsm.edu.pe',
               'google_id' => '2',
        ]);
        //asignar rol
        $user1->assignRole('Administrador');
        ///////////////////////////////////////////////////////////////////////

Permission::create(['name' => 'Responder encuesta']);
$role = Role::create(['name' => 'Encuestador']);
$role->syncPermissions("Responder encuesta");
//

// create user
$user3= User::create([
    'dni' => '44444444',
    'firstname' => 'Cardenas',
    'lastname' => 'Aquino',
    'names' => 'Anthony Robert',
    'password' => Hash::make('sdc123456'),
    'datebirth' => '2000-10-10',
    'cellphone' => '999999999',
    'sex' => 'M',
    'email' => 'logicainformatica18@gmail.com',
       'google_id' => '3',
]);
//
$user3->assignRole('Encuestador');
//
 }
}
