<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /*
    Dados que devem ser cadastrados previamente no BD
     */
    public function run(): void
    {
        // Os dois administradores do sistema
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Acsa Silveira',
            'apelido' => 'Acsa',
            'email' => 'acsa.silveiras@gmail.com',
            'telefone' => '(35)98804-9236',
            'tipo' => 3,
            'avaliacao' => 6,
            'fotoPerfil' => 'imagens/J22QMgNvEOvsU72MX5yef7hOaPMkjnToc7tskxHH.jpg',
            'email_verified_at' => NULL,
            'password' => Hash::make('TCC_2023'),
            'remember_token' => NULL,
            'created_at' => '2023-08-15 19:31:17',
            'updated_at' => '2023-09-25 15:55:30'
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Felipe Rocha Alves',
            'apelido' => 'Felipe',
            'email' => 'feliperchalves@gmail.com',
            'telefone' => '(35)98438-8878',
            'tipo' => 3,
            'avaliacao' => 6,
            'fotoPerfil' => 'imagens/2IjfQ3vOB8g6MS1uoSNbAUc1BXHX284OaSfPZHgP.png',
            'email_verified_at' => NULL,
            'password' => Hash::make('TCC_2023'),
            'remember_token' => NULL,
            'created_at' => '2023-08-15 19:31:17',
            'updated_at' => '2023-08-15 19:32:17'
        ]);

        /* Os serviços atendidos pela plataforma:
            Eletricista; Encanador; Jardineiro;
            Limpador de Caixa D'água; Limpador de Caixa de Gordura;
            Limpador de Piscina; Pintor;
            */
        DB::table('servicos')->insert([
            'id' => 1,
            'nomeServico' => 'Eletricista',
            'fotoServico' => 'imagens/1paYbNESQySji5dOrfkVGaO1bLQR57TiVJHmXntf.png',
            'created_at' => '2023-08-15 19:31:17',
            'updated_at' => '2023-08-15 19:32:17'            
        ]);
        DB::table('servicos')->insert([
            'id' => 2,
            'nomeServico' => 'Encanador',
            'fotoServico' => 'imagens/QmQ9DMDsWNDmRhWJU706vwd6r3JGWfBxymYaexZe.png',
            'created_at' => '2023-08-15 19:31:17',
            'updated_at' => '2023-08-15 19:32:17'            
        ]);
        DB::table('servicos')->insert([
            'id' => 3,
            'nomeServico' => 'Jardineiro',
            'fotoServico' => 'imagens/wwEbvkgV8iRVop6M9wX4xjhOLpR7fxAijFKLRIoa.png',
            'created_at' => '2023-08-15 19:31:17',
            'updated_at' => '2023-08-15 19:32:17'            
        ]);
        DB::table('servicos')->insert([
            'id' => 4,
            'nomeServico' => "Limpador de Caixa d'Água",
            'fotoServico' => 'imagens/Qc7tMOfMbEWtTw5C6276GpvZbrO0SfkEjUcN3nku.png',
            'created_at' => '2023-08-15 19:31:17',
            'updated_at' => '2023-08-15 19:32:17'            
        ]);
        DB::table('servicos')->insert([
            'id' => 5,
            'nomeServico' => 'Limpador de Caixa de Gordura',
            'fotoServico' => 'imagens/kYWdcXGTGeY9OmuP4BrWvFiD2uKQFVv9KYha6MQM.png',
            'created_at' => '2023-08-15 19:31:17',
            'updated_at' => '2023-08-15 19:32:17'            
        ]);
        DB::table('servicos')->insert([
            'id' => 6,
            'nomeServico' => 'Limpador de Piscina',
            'fotoServico' => 'imagens/7vgM6e6JRpBu1mYwo3ndCnUiZRjBc8oXRcqowne8.png',
            'created_at' => '2023-08-15 19:31:17',
            'updated_at' => '2023-08-15 19:32:17'            
        ]);
        DB::table('servicos')->insert([
            'id' => 7,
            'nomeServico' => 'Pintor',
            'fotoServico' => 'imagens/XBmYmhFoKZbDCYa383XRvILlEnlVBLpyRuUL7O1W.png',
            'created_at' => '2023-08-15 19:31:17',
            'updated_at' => '2023-08-15 19:32:17'            
        ]);
    }
}
