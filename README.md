# Crypto Exchange

## BOOTSTRAPPING
The project is dockerized. For ease of use, a makefile has been created with different commands.

To start the project for the first time:

`make build`

`make start`

To enter the container we will use

`make ssh-be`

And there we will use `composer install` to install dependencies

You can create your own `.env` file
`.env.example` is a good template for this.

For help to use, `art` is an alias of `php artisan`
<hr>

## USE

When the user logs in, they will see a table with the information of their cryptocurrencies, as well as the current exchange value.

The "Refres!" will make a call to the api and update the values of the coins.

On the other hand, the system has a task so that every 30 minutes it makes a call to the external api to automatically update the exchange value.

To execute the task, you will have to program a cron. Which is already prepared in `./docker/php/cronjobs`

For a run in
local can be run (instead of cron): art schedule: work from docker bash, or `make schedule-start` from the host machine.

By last. If we want to execute the update of the values from the command line, an "artisan" command has been prepared. We can execute: `art update: currency`
<hr>

## FILES
The files are: CurrencyExchange, StockPortfolio (models and controllers)
and `app/Services/UpdateCurrencyExchangeServices.php`
<hr>

## TESTS
The class `./tests/Feature/ExternalApiConnectionTest.php` has been created with three tests. Check that the ping to the api returns 200, check that the call to the endpoint of the two cryptocurrencies returns a float.

A test has also been prepared in `./tests/Feature/RootRedirectTest.php` to ensure that when the user goes to the root of the site they are redirected.
<hr>
