### Project setup

#### Copy `.env.example` as `.env`

##### _If use docker to run the app, you must set `DB_HOST=entornos-db`_

```bash
cp .env.example .env
```

#### Install dependencies

##### If not already installed

```bash
composer install
```

#### Generate app key

```bash
php artisan key:generate
```

#### Install Database

##### If not already installed

```bash
php artisan migrate:install
```

```bash
php artisan migrate
```

```bash
php artisan db:seed
```

##### If already installed

```bash
php artisan migrate:fresh --seed
```

#### Install Passport

##### _After run the command copy the `client id 2 secret` and paste in .env file in `frontend` project_

```bash
php artisan passport:install
```

#### Run `.sql` scripts into database

-   database/seeders/cities.sql
-   database/seeders/tunotaUser.sql

#### Run command to link cities with states

```bash
php artisan command:addStatesToCities
```

<br />

### Docker setup

#### Build docker environment

##### _Make sure to create the config file `(.env)` before building the containers and set the `DB_HOST` key with `tunota-db`_

```bash
docker-composer up --build
```

<br />

**NOTE:** If you receive this error, when trying to migrate the database,

```bash
SQLSTATE[HY000] [1045] Access denied for user ...
```

Outside the container, run the following:

##### To remove the containers

```bash
docker-compose down -v
```

##### To restart the containers

```bash
docker-compose up -d
```

After containers successfully restart try to enter again and execute the setup steps

<br />

To edit this file checkout the [markdown docs](https://dotcms.com/docs/latest/markdown-syntax)
