<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EncryptPasswords extends Command
{
    protected $signature = 'encrypt:passwords';
    protected $description = 'Encrypt existing plaintext passwords with Bcrypt';

    public function handle()
    {
        $users = DB::table('USUARIO')->get();

        foreach ($users as $user) {
            // Comprueba si la contraseña ya está encriptada
            if (!password_get_info($user->contrasena)['algo']) {
                DB::table('USUARIO')
                    ->where('id', $user->id)
                    ->update(['contrasena' => Hash::make($user->contrasena)]);
                $this->info("Contraseña del usuario {$user->correo} encriptada.");
            } else {
                $this->info("La contraseña del usuario {$user->correo} ya está encriptada.");
            }
        }

        $this->info('Todas las contraseñas han sido procesadas.');
    }
}
