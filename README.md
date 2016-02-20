# Racoon
php framework


#intro

## features


### Routing
`/App/Routes/Routes.php`

Every route is called via a function which requires a request, middleware and a callback.
Since Racoon runs on runtime, output can be shown when the route is reached, however the preffered method is using the
runtime nodes. These are used automaticly and only require you to return all output. The app runtime will render your
out put in any format

Allowed methods are the basic CRUD methods `GET, POST, UPDATE, DELETE, PUT`

    $router->get(
        '/hello/:name',
        [
            new \App\Middleware\Authentication()
        ],
        function($req, $res, $par)
        {
            return 'hi, '.$par['name'].'<br />Welcome to Racoon';
        }
    );

Going all crazy on custom request methods/?

    $router->match(
        'custom_method',
        '/hello/:name',
        [
            new \App\Middleware\Authentication()
        ],
        function($req, $res, $par)
        {
            return 'hi, '.$par['name'].'<br />Welcome to Racoon';
        }
    );


Or even better, Define route results by passing an controller into the callback

    $router->get('/hello',[], 'Home:display');

This will be mapped against `\App\Controllers\HomeController()->Display($req,$res,$params);`


new routing files can be added inside `\app\Routes`, as long as the file ends with `Routes.php` it will be included
for example `AdminRoutes.php` `DefaultRoutes.php` `MagicRoutes.php`

## Middleware


