# Тестовое задание на Laravel 9

Веб-приложение для управления товарами и заказами, разработанное с использованием фреймворка Laravel 9.

## Инструкция по установке

### Клонирование репозитория
```bash
git clone https://github.com/KapetanVodichka/test_mpfit.git
cd test_mpfit
```

### Установка зависимостей
```bash
composer install
```

### Настройка окружения
```bash
cp .env.example .env
```

Отредактируйте файл .env, указав настройки базы данных:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Сгенерируйте ключ приложения:
```bash
php artisan key:generate
```

### Выполнение миграций и заполнение данных
Запустите миграции для создания таблиц в базе данных:
```bash
php artisan migrate
```

Заполните таблицу категорий начальными данными (легкий, хрупкий, тяжелый):
```bash
php artisan db:seed
```

### Запуск проекта
Запустите сервер и переходите на http://127.0.0.1:8000:
```bash
php artisan serve
```
