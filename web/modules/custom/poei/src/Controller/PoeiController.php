<?php

namespace Drupal\poei\Controller;

use Drupal\Core\Access\AccessResult;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\Routing\Route;

/**
 * Class PoeiController
 *
 * @package Drupal\poei\Controller
 */
class PoeiController extends ControllerBase
{
    public function content()
    {
        return['#markup' => "test"];
//        // Manipuler la BDD
//        $users = $this->entityTypeManager()->getStorage('je sais pas quoi')->loadMultiple();
//
//        foreach ($users as $user) {
//
//        }

    }

//    public function access(Route $route)
//    {
//        $regex = '#programme#';
//
//        if(preg_match($regex, $route->getPath())) {
//            return AccessResult::allowed()->cachePerUser();
//        }
//
//      // return AccessResult::forbidden()->cachePerUser();
//
//    }
}