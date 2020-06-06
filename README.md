
## Instalação

## Instalação

Em uma pasta do seu computador, digitar no cmd =  git clone https://github.com/alisonsassi95/OSystem.git ("Irá fazer dowload do projeto");
; 
DENTRO DA PASTA "OSystem" digitar = composer install (OBS: "Irá criar as pastas necessárias") ;
;
;
Caso não tiver o banco de dados, Criar no mysql com o nome "OSystem" ;
;
Abrir o arquivo .env.example e substituir as linhas :;
DB_DATABASE=SUA_BASE_DE_DADOS ; "OSystem"
DB_USERNAME=SEU_NOME_DE_USUARIO ;
DB_PASSWORD=SUA_SENHA ;
;
Logo após colocar os dados: ;
Rodar o comando = php -r "copy('.env.example', '.env');" ;
Rodar o comando = php artisan key:generate ;
Rodar o comando = php artisan migrate --seed ;
Rodar o comando = php artisan serve ;
;
;
Para logar-se como ADMIN, acesse a url http://SEU_LOCAL_HOST/home ;
; 
Login e senha padrão: ;
*login:* admin;
*senha:*admin ;

Att
Alison Sassi & Augusto Von Grafen



# Help Developer ;


php artisan make:model Name -m

php artisan make:controller NameController

php artisan migrate:refresh