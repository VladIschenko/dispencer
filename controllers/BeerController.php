<?php
/**
 * Created by PhpStorm.
 * User: vlad
 * Date: 04.10.16
 * Time: 11:44
 */

namespace Controllers;

use Core\View;
use Models\BeerModel;
use Models\UserModel;

class BeerController
{
    public static function showBeerlist()
    {
        if (!isset($_SESSION['login'])) {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $beer = new BeerModel();
            $beers = $beer->findAll();
            echo View::render('beerList', $beers);
        }
    }

    public static function editBeerView($id)
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $beer = new BeerModel();
            $beer = $beer->findById($id);
            echo View::render('editBeer', $beer);
        }
    }

    public static function editBeer($id)
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $beer = new BeerModel();
            $beer->setName($_POST['name']);
            $beer->setDescription($_POST['description']);
            $beer->setOrganisation($_POST['organisation']);
            $beer->setDegree($_POST['degrees']);
            $beer->setDensity($_POST['density']);
            $beer->setType($_POST['type']);
            $beer->updateSort($id);
            header('Location: /beerlist');
        }
    }

    public static function deleteBeer($id)
    {        if(!isset($_SESSION['login']))
    {
        $view = new View();
        echo $view->render('errors/unauthorized');
    } else {
        $beer = new BeerModel();
        $beers = $beer->deleteSort($id);
        header('Location: /beerlist');
    }
    }

    public static function addBeerView()
    {
        if(!isset($_SESSION['login']))
        {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            if (!isset($_SESSION['login'])) {
                echo View::render('errors/unauthorized');
            } else {
                echo View::render('addBeer');
            }
        }
    }

    public static function save()
    {
        if (!isset($_SESSION['login'])) {
            $view = new View();
            echo $view->render('errors/unauthorized');
        } else {
            $beer = new BeerModel();
            $beer->setName($_POST['name']);
            $beer->setDescription($_POST['description']);
            $beer->setOrganisation($_POST['organisation']);
            $beer->setDegree($_POST['degrees']);
            $beer->setDensity($_POST['density']);
            $beer->setType($_POST['type']);
            $beer->addSort();
            var_dump($_POST);
            header('Location: /beerlist');
        }
    }
}
