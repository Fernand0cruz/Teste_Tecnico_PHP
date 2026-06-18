FROM php:8.3-cli

# instala o composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# define a pasta de trabalho
WORKDIR /var/www

# copia os arquivos do composer
COPY composer.json composer.lock ./

# instala as dependencias
RUN composer install --no-interaction --prefer-dist

# copia o restante do projeto
COPY . .

# expoe a porta 8000 para o servidor de desenvolvimento
EXPOSE 8000

# inicia o servidor de desenvolvimento do PHP
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]