## Gerencimento de Tarefas - Task Menager

# Laravel 12 - Gerenciamento de Tarefas

Este repositório contém um sistema de gerenciamento de tarefas desenvolvido com Laravel 12. O objetivo é permitir que os usuários criem, editem e excluam tarefas de forma eficiente.

##  Requisitos

Antes de iniciar, certifique-se de ter os seguintes requisitos instalados:

- [XAMPP](https://www.apachefriends.org/download.html) (Apache, MySQL, PHP 8.1 ou superior)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) (para compilar assets, opcional)

## Instalação e Configuração

### 1Clonar o repositório
```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

### 2 Configurar o ambiente
Copie o arquivo de exemplo `.env` e configure as credenciais do banco de dados:
```bash
cp .env.example .env
```
Abra o arquivo `.env` e edite as seguintes linhas:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=root
DB_PASSWORD=
```

### 3 Iniciar o MySQL no XAMPP
Abra o XAMPP e inicie os serviços **Apache** e **MySQL**. No phpMyAdmin, crie um banco de dados com o nome especificado em `DB_DATABASE`.

### 4 Instalar dependências
```bash
composer install
npm install && npm run dev
```

### 5 Gerar chave da aplicação
```bash
php artisan key:generate
```

### 6 Executar migrações e seeders
```bash
php artisan migrate --seed
```
Isso criará as tabelas no banco de dados e populará os dados iniciais, se necessário.

### 7 Iniciar o servidor Laravel
```bash
php artisan serve
```
A aplicação estará acessível em: **[http://127.0.0.1:8000](http://127.0.0.1:8000)**

##  Uso
- Acesse a aplicação no navegador.
- Crie, edite e exclua tarefas conforme necessário.

##  Testes
Para rodar os testes automatizados:
```bash
php artisan test
```

##  Licença
Este projeto está sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.

## 🤝 Contribuição
Sinta-se à vontade para contribuir! Faça um **fork** do repositório, crie um **branch**, implemente sua melhoria e envie um **pull request**.



