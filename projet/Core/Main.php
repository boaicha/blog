<?php

namespace App\Core;

use App\Controllers;

class Main {
    public function start() : void{
        // On récupère l'adresse
        $uri = $_SERVER['REQUEST_URI'];
        $exceptionController = new Controllers\ExceptionController();

        // On vérifie si elle n'est pas vide et si elle se termine par un /
        if (!empty($uri) && $uri != '/' && $uri[-1] === '/') {
            // Dans ce cas on enlève le /
            $uri = substr($uri, 0, -1);

            // On envoie une redirection permanente
            http_response_code(301);

            // On redirige vers l'URL dans le bon format /
            header('Location: ' . $uri);
            //exit();
        }

        // On sépare les paramètres et on les met dans le tableau $params
        $params = explode('/', $_GET['p']);

        // Si au moins 1 paramètre existe
        if ($params[0] != "") {
            // On sauvegarde le 1er paramètre dans $controller en mettant sa 1ère lettre en majuscule, en ajoutant le
            // namespace des controleurs et en ajoutant "Controller" à la fin
            $controller = '\\App\\Controllers\\' . ucfirst(array_shift($params)) . 'Controller';
            if (!class_exists($controller)) {
                $exceptionController->notFoundAction($_GET['p']);
                //exit();
            }
            // On sauvegarde le 2ème paramètre dans $action si il existe, sinon index
            $action = isset($params[0]) ? array_shift($params) : 'index';

            // On instancie le contrôleur
            $controller = new $controller();

            if (method_exists($controller, $action)) {
                // Si il reste des paramètres, on appelle la méthode en envoyant les paramètres sinon on l'appelle "à vide"
                (isset($params[0])) ? $controller->$action($params) : $controller->$action();
            } else {
                $exceptionController->error500Action(
                    sprintf("Le controlleur %s n'a pas de méthode qui s'appelle %s",
                        get_class($controller),
                        $action
                    )
                );
                //exit();
            }
        } else {
            // Ici aucun paramètre n'est défini
            // On instancie le contrôleur par défaut (page d'accueil)
            $controller = new Controllers\HomeController();

            // On appelle la méthode index
            $controller->index();
        }
    }
}