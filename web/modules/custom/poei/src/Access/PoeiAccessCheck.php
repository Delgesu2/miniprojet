<?php

use Drupal\Core\Routing\RouteMatch;
use Drupal\node\NodeInterface;
use Drupal\Core\Session\AccountInterface;
use \Drupal\Core\Access\AccessResult;
use Drupal\Core\Routing\Access\AccessInterface;

/**
 * Class PoeiAccessCheck
 */
class PoeiAccessCheck implements AccessInterface
{
    public function access(
        NodeInterface    $node,
        RouteMatch       $route,
        AccountInterface $account
    )
    {
        $allow = false;

        if ($node->bundle() === 'programmes'){
            $organisateurs = $node->get('field_organisateurs_du_programme')->getValue();

            foreach ($organisateurs as $organisateur){
                if ($organisateur['target_id'] === $account->id()){
                    $allow = true;
                }
            }
        }

        return AccessResult::allowedIf($node->bundle() === 'programmes' && $allow);

    }
}