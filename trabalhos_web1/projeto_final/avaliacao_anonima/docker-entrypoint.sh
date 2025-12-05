#!/bin/bash
set -e

# Cria .env se não existir
if [ ! -f "/var/www/html/.env" ]; then
    echo "Criando .env com configurações do PostgreSQL..."
    cat > /var/www/html/.env << 'EOF'
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_LEVEL=debug

DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=avaliacoes
DB_USERNAME=laravel
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
EOF
fi

# Gera APP_KEY se estiver vazia
if grep -q "APP_KEY=$" /var/www/html/.env 2>/dev/null || grep -q "APP_KEY=\"\"" /var/www/html/.env 2>/dev/null; then
    echo "Gerando APP_KEY..."
    php artisan key:generate --force
fi

exec "$@"