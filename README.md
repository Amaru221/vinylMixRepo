## Setup
**Download Composer dependencies**

Make sure you have [Composer installed](https://getcomposer.org/download/)
and then run:

```
composer install
```

You may alternatively need to run `php composer.phar install`, depending
on how you installed Composer.

**Start the Symfony web server**

You can use Nginx or Apache, but Symfony's local web server
works even better.

To install the Symfony local web server, follow
"Downloading the Symfony client" instructions found
here: https://symfony.com/download - you only need to do this
once on your system.

Then, to start the web server, open a terminal, move into the
project, and run:

```
symfony serve
```

(If this is your first time using this command, you may see an
error that you need to run `symfony server:ca:install` first).

Now check out the site at `https://localhost:8000`

Have fun!

**DOCKER CONFIGURATION**
We need create and configurate our postgres database, in this case we are using 
a docker image to alocate the database.
You have the compose.yaml file that contains all necessary configuration
Execute:

```
#To start the container
docker compose up -d

# if you want to use MySQL instead of Postgres, you absolutely can. Feel free to
 update these files... or delete both of them and run
symfony console make:docker:database

#To create the database in the container
symfony console doctrine:database:create
#With this command, we are using the binary of symfony, and this take automatically the parameters of docker
```

**OPTIONAL: Webpack Encore Assets**

This app uses Webpack Encore for the CSS, JS and image files.
But, the built files are already included... so you don't need
to download or build anything if you don't want to!

But if you *do* want to play with the CSS/JS and build the
final files, no problem. Make sure you have [yarn](https://yarnpkg.com/lang/en/)
or `npm` installed (`npm` comes with Node) and then run:

```
yarn install
yarn encore dev --watch

# or
npm install
npm run watch
```

## Have Ideas, Feedback or an Issue?

If you have suggestions or questions, please feel free to
open an issue on this repository.

