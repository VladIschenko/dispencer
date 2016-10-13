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
        $beer = new BeerModel();
        $beers = $beer->findAll();
        echo View::render('beerList', $beers);
    }

    public static function editBeerView($id)
    {
        $beer = new BeerModel();
        $beer = $beer->findById($id);
        echo View::render('editBeer', $beer);
    }

    public static function editBeer($id)
    {
        $beer = new BeerModel();
        $beer->setName($_POST['name']);
        $beer->setDescription($_POST['description']);
        $beer->setOrganisation($_POST['organisation']);
        $beer->updateSort($id);
        header('Location: /beerlist');
    }

    public static function deleteBeer($id)
    {
        $beer = new BeerModel();
        $beers = $beer->deleteSort($id);
        header('Location: /beerlist');
    }

    public static function addBeerView()
    {
        if(!isset($_SESSION['login'])){
            echo View::render('errors/unauthorized');
        }else{
            echo View::render('addBeer');
        }
    }

    public static function save()
    {
        $beer = new BeerModel();
        $beer->setName($_POST['name']);
        $beer->setDescription($_POST['description']);
        $beer->setOrganisation($_POST['organisation']);
        $beer->addSort();
        header('Location: /beerlist');
    }
}