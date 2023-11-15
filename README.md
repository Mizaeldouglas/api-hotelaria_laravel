
# Hotelaria com Laravel, PostgreSQL, Auth

Este teste avalia as habilidades do desenvolvimento web, utilizando Laravel, PostgreSQL  para gestão de quartos e reservas em um contexto hoteleiro.

## [Documentação via Postman](https://documenter.getpostman.com/view/20955040/2s9YXo1f3A)


## Instruções para Execução

Siga as instruções abaixo para clonar o projeto e executá-lo localmente.

### 1. Clonar o Repositório

```bash
git clone https://github.com/Mizaeldouglas/api-hotelaria_laravel.git && cd api-hotelaria_laravel

```

### 2. Configurar o Ambiente

- Certifique-se de ter o PHP, Composer, PostgreSQL instalados na sua máquina.
- Crie um arquivo `.env` na raiz do projeto e configure as variáveis de ambiente, especialmente as relacionadas ao banco de dados. Você pode copiar o conteúdo do arquivo `.env.example` e ajustar conforme necessário.
- Crie um Database no banco de dados com o nome ``hotelaria`` ou modifica no `.env` conforme o necessário:
```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=hotelaria
DB_USERNAME=postgres
DB_PASSWORD=
```

### 3. Instalar Dependências

Abra o terminal na pasta do projeto e execute o seguinte comando para instalar as dependências:

```bash
composer install
```

### 4. Executar Migrações
Para criar as tabelas necessárias no banco de dados, execute as migrações com o comando:

```
php artisan migrate
```
Para criar o Seed do usuario use o comando:
```
php artisan db:seed 
```

### 5. Iniciar o Servidor
Inicie o servidor local com o seguinte comando:
```
php artisan serve
```
O projeto estará disponível em http://localhost:8000/api.

Opcional: use o camando para saber as rotas:
```
php artisan route:list 
```


