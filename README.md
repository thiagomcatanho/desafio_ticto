##  Índice

- [Tecnologias](#tecnologias)  
- [Pré-requisitos](#pré-requisitos)  
- [Instalação & Execução](#instalação--execução)  

---

## Tecnologias

- PHP 
- Laravel
- Docker & Laravel Sail

---

## Pré-requisitos
- Composer
- Docker (e Docker Compose) instalado.  
- Git (para clonar o repositório).

---

## Instalação & Execução

```bash
# Clonar o repositório
git clone https://github.com/thiagomcatanho/desafio_ticto.git
cd desafio_ticto

# Copiar arquivo .env
cp .env.example .env

# Instalar dependências
composer install

# Iniciar com Sail
./vendor/bin/sail up -d

# Instalar dependências no contantainer
./vendor/bin/sail artisan key:generate
./vendor/bin/sail npm install && npm run build

# Rodar migrações e seeders
./vendor/bin/sail artisan migrate --seed

# Para acessar a aplicação
Abra http://localhost em seu navegador
