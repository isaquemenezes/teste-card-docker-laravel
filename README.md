
### Passo a passo
Clone Repositório
```sh
git clone https://github.com/isaquemenezes/teste-card-docker-laravel
```

Crie o Arquivo .env
```sh
cp .env.example .env
```

Atualize as variáveis de ambiente do arquivo .env
```dosini

APP_URL=http://localhost:8989

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root

CACHE_DRIVER=redis
QUEUE_CONNECTION=redis
SESSION_DRIVER=redis

REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```


Suba os containers do projeto
```sh
docker-compose up -d
```

Acessar o container
```sh
docker-compose exec app bash
```

Instalar as dependências do projeto
```sh
composer install
```


Gerar a key do projeto Laravel
```sh
php artisan key:generate
```

Executar as migration
```sh
php artisan migrate
```

Execute o seguinte comando para criar um link simbólico do diretório de armazenamento público:
```sh
php artisan storage:link
```


Acessar o projeto
[http://localhost:8989](http://localhost:8989)

# Referenciais:
### Setup Docker Para Projetos Laravel (8, 9 ou 10)
[Especializati github!](https://github.com/especializati)