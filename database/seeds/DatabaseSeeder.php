<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            ['id' => 1, 'name' => 'Administrador', 'description' => 'Administrador do sistema'],
            ['id' => 2, 'name' => 'Cliente', 'description' => 'O cliente da empresa.']
        ]);
        DB::table('peoples')->insert([
            ['id' => 1, 'name' => 'Administrador', 'birthdate' => '2999-01-01', 'genre' => 'M', 'cpf' => '12345677890','rg' => '1234567789', 'address' => 'Rua', 'number' => '12345',  'district' => 'Admin',  'complement' => 'Sem complemento', 'cep' => '987654321', 'state' => 'RS', 'city' => 'Ijuí', 'telephone' => '9978988765', 'email' => 'Admin@Admin.com', 'obs' => 'ele é o adin', 'profile' => '1'],
            ['id' => 2, 'name' => 'Marcos Vinicius João Diogo da Conceição', 'birthdate' => '1965-27-07', 'genre' => 'M', 'cpf' => '36649606022','rg' => '1301695723', 'address' => 'Rua Governador Hélio da Costa Campos', 'number' => '12555',  'district' => 'Dr. Airton Rocha',  'complement' => 'Sem complemento', 'cep' => '52280055', 'state' => 'RS', 'city' => 'Porto Alegre', 'telephone' => '9978988765', 'email' => 'gomoura@granadaimoveis.com.br', 'obs' => '', 'profile' => '2'],
            ['id' => 3, 'name' => 'Raquel Sabrina Assunção', 'birthdate' => '1982-20-05', 'genre' => 'F', 'cpf' => '33608203044','rg' => '3674782624', 'address' => 'Rua Monteiro Lobato', 'number' => '235',  'district' => 'Charqueadas',  'complement' => 'Sem complemento', 'cep' => '58027200', 'state' => 'SC', 'city' => 'Campo Grande', 'telephone' => '9978988765', 'email' => 'sabrinaassuncao@origamieventos.com.br', 'obs' => '', 'profile' => '2'],
            ['id' => 4, 'name' => 'Enzo Carlos Eduardo Moreira', 'birthdate' => '2001-01-07', 'genre' => 'M', 'cpf' => '55164642000','rg' => '3674782622', 'address' => 'Avenida Frei Servácio', 'number' => '464',  'district' => 'Parque Sagrada Família',  'complement' => 'Sem complemento', 'cep' => '78735440', 'state' => 'RS', 'city' => 'Santana', 'telephone' => '9978988765', 'email' => 'eduardomoreira-77@nextel.com.br', 'obs' => '', 'profile' => '2'],
        ]);
        DB::table('users')->insert(
            ['name' => 'admin','user'=> 'admin','email' => 'admin@admin.com','password' => bcrypt('admin'),'profile' => 'Administrador','people_id' => '1',],
            ['name' => 'Raquel','user'=> 'admin','email' => 'luzianicolefatimadrumond-96@danzarin.com.br','password' => bcrypt('raquel'),'profile' => 'Administrador','people_id' => '3',],
            ['name' => 'Marcos','user'=> 'admin','email' => 'gomoura@granadaimoveis.com.br','password' => bcrypt('admin'),'profile' => 'Administrador','people_id' => '2',]
        );
    }
}
