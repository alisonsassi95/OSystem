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
        DB::table('status')->insert([
            ['id' => 1, 'name' => 'Em espera', 'description' => 'O cliente solicitou ao sistema'],
            ['id' => 2, 'name' => 'Em Analise', 'description' => 'Técnico está trabalhando'],
            ['id' => 3, 'name' => 'Orcamento Pronto', 'description' => 'Cliente da empresa.'],
            ['id' => 4, 'name' => 'Aprovado', 'description' => 'Cliente Aprovou o orçamento.'],
            ['id' => 5, 'name' => 'Negado', 'description' => 'Cliente  Negou o orçamento.'],
            ['id' => 6, 'name' => 'Equipamento Pronto', 'description' => 'Cliente pode retirar.']


        ]);
      
        DB::table('profiles')->insert([
            ['id' => 1, 'name' => 'Administrador', 'description' => 'Administrador do sistema'],
            ['id' => 2, 'name' => 'Cliente', 'description' => 'Cliente da empresa.']
        ]);

        DB::table('peoples')->insert([
            ['id' => 1, 'name' => 'Administrador', 'birthdate' => '2999-01-01', 'genre' => 'M', 'cpf' => '12345677890','rg' => '1234567789', 'address' => 'Rua', 'number' => '12345',  'district' => 'Admin',  'complement' => 'Sem complemento', 'cep' => '987654321', 'state' => 'RS', 'city' => 'Ijuí', 'telephone' => '9978988765', 'email' => 'Admin@Admin.com', 'obs' => 'ele é o administrador', 'profile' => '1'],
            ['id' => 2, 'name' => 'Marcos Vinicius João Diogo da Conceição', 'birthdate' => '1965-27-07', 'genre' => 'M', 'cpf' => '36649606022','rg' => '1301695723', 'address' => 'Rua Governador Hélio da Costa Campos', 'number' => '12555',  'district' => 'Dr. Airton Rocha',  'complement' => 'Sem complemento', 'cep' => '52280055', 'state' => 'RS', 'city' => 'Porto Alegre', 'telephone' => '9978988765', 'email' => 'gomoura@granadaimoveis.com.br', 'obs' => '', 'profile' => '2'],
            ['id' => 3, 'name' => 'Raquel Sabrina Assunção', 'birthdate' => '1982-20-05', 'genre' => 'F', 'cpf' => '33608203044','rg' => '3674782624', 'address' => 'Rua Monteiro Lobato', 'number' => '235',  'district' => 'Charqueadas',  'complement' => 'Sem complemento', 'cep' => '58027200', 'state' => 'SC', 'city' => 'Campo Grande', 'telephone' => '9978988765', 'email' => 'sabrinaassuncao@origamieventos.com.br', 'obs' => '', 'profile' => '2'],
            ['id' => 4, 'name' => 'Enzo Carlos Eduardo Moreira', 'birthdate' => '2001-01-07', 'genre' => 'M', 'cpf' => '55164642000','rg' => '3674782622', 'address' => 'Avenida Frei Servácio', 'number' => '464',  'district' => 'Parque Sagrada Família',  'complement' => 'Sem complemento', 'cep' => '78735440', 'state' => 'RS', 'city' => 'Santana', 'telephone' => '9978988765', 'email' => 'eduardomoreira-77@nextel.com.br', 'obs' => '', 'profile' => '2'],
        ]);
        DB::table('users')->insert([
            ['name' => 'admin','user'=> 'admin','email' => 'admin@admin.com','password' => bcrypt('admin'),'profile' => 'Administrador','people_id' => '1'],
            ['name' => 'Raquel','user'=> 'Raquel','email' => 'luzianicolefatimadrumond-96@danzarin.com.br','password' => bcrypt('raquel'),'profile' => 'Cliente','people_id' => '3'],
            ['name' => 'Marcos','user'=> 'Marcos','email' => 'gomoura@granadaimoveis.com.br','password' => bcrypt('admin'),'profile' => 'Administrador','people_id' => '2']
        ]);

        DB::table('equipaments')->insert([
            ['id' => 1, 'name' => 'Notebook', 'mark' => 'Dell', 'model' => 'N564P', 'serialnumber' => '123598765432', 'description' => 'Preto', 'peoples_id' => '1'],
            ['id' => 2, 'name' => 'Computador', 'mark' => 'Dell', 'model' => 'N564P', 'serialnumber' => '0987623765', 'description' => 'Amassado', 'peoples_id' => '1'],
            ['id' => 3, 'name' => 'Notebook', 'mark' => 'Acer', 'model' => 'U865', 'serialnumber' => '3243242342342', 'description' => 'Branco', 'peoples_id' => '1']
        ]);

        DB::table('estimate')->insert([
            ['id' => 1, 'service' => 'Formatação', 'value' => '85', 'data_estimate' => '2020-06-02', 'description' => 'Tinha que trocar'],
            ['id' => 2, 'service' => 'Troca de HD', 'value' => '500', 'data_estimate' => '2020-07-02', 'description' => 'Tinha que trocar'],
            ['id' => 3, 'service' => 'Troca de tela', 'value' => '900', 'data_estimate' => '2020-05-01', 'description' => 'Tinha que trocar']
        ]);

        
        DB::table('orderservice')->insert([
            ['id' => 1, 'problem' => 'está muito Lento', 'data_hora' => '2020-06-02 10:00:00', 'equipaments_id' => '1', 'peoples_id' => 1, 'estimate_id' => '1', 'status_id' => '6'],
            ['id' => 2, 'problem' => 'Muito Lento', 'data_hora' => '2020-07-02 17:00:00', 'equipaments_id' => '2', 'peoples_id' => 1, 'estimate_id' => '2', 'status_id' => '4'],
            ['id' => 3, 'problem' => 'Quebrou a tela','data_hora' => '2020-05-01 12:00:00', 'equipaments_id' => '3', 'peoples_id' => 1, 'estimate_id' => '3', 'status_id' => '5']
        ]); 
        DB::table('contact')->insert([
            ['id' => 1, 'name' => 'Nvidea', 'cnpj' => '52632563256325', 'contact_phone' => '333333555', 'email' => 'nvidea@nvidea.com', 'description' => 'Vocês são demais! gostaríamos de patrocinar qualque coisa que forem fazer.'],
            ['id' => 2, 'name' => 'UNIJUI', 'cnpj' => '526324234234234', 'contact_phone' => '55555333', 'email' => 'unijui@unijui.com', 'description' => 'Vocês fizeram diferença na Faculdade, por pouco não descobrem a cura do cancer!'],
            ['id' => 3, 'name' => 'Intel','cnpj' => '32423423422434234', 'contact_phone' => '78789789', 'email' => 'intel@intel.com', 'description' => 'You guys are awesome! we would like to sponsor anything we do first.']
        ]);
    }
}
