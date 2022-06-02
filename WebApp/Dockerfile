FROM php:8.1-alpine

ENV PHPIZE_DEPS \
		autoconf \
		dpkg-dev dpkg \
		file \
		g++ \
		gcc \
		libc-dev \
		make \
		pkgconf \
		re2c

RUN apk update && apk add unixodbc-dev unixodbc autoconf ${PHPIZE_DEPS}
COPY sqlsrv-5.10.1.tgz pdo_sqlsrv-5.10.1.tgz ./
RUN pear install sqlsrv-5.10.1.tgz && \
    pear install pdo_sqlsrv-5.10.1.tgz
RUN docker-php-ext-enable sqlsrv pdo_sqlsrv

RUN curl -O https://download.microsoft.com/download/b/9/f/b9f3cce4-3925-46d4-9f46-da08869c6486/msodbcsql18_18.0.1.1-1_amd64.apk \
    && apk add --allow-untrusted msodbcsql18_18.0.1.1-1_amd64.apk

COPY --from=composer /usr/bin/composer /usr/local/bin/composer
RUN apk add libzip-dev && docker-php-ext-install zip