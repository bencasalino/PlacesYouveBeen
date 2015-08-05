<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Place.php";

    // Start session, checks for place key
    // Creates empty array if it doesn't exist

    session_start();

    if (empty($_SESSION['list_of_places'])) {
        $_SESSION['list_of_places'] = array();

    }

    // Direct app to twig.path

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    // Root page, prints array if any

    $app->get("/", function() use ($app) {

        return $app['twig']->render('places.html.twig', array('places' => Place::getAll()));

    });

    // Created new places page that displays our created places

    $app->post("/places", function() use ($app) {
        $place = new Place($_POST['description']);
        $place->save();
        return $app['twig']->render('create_place.html.twig', array('newplace' => $place));

    });

    // Delete contents of array, directs user to delete_places page

    $app->post("/delete_places", function()  use ($app) {
        place::deleteAll();
        return $app['twig']->render('delete_places.html.twig');

    });

    return $app;

 ?>
