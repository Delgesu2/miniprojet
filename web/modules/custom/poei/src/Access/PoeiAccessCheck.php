<?php
use Drupal\Core\Access\AccessCheckInterface;
use Drupal\Core\Routing\RouteMatch;
use Drupal\node\NodeInterface;
use Drupal\Core\Session\AccountInterface;

class PoeiAccessCheck implements AccessCheckInterface
{
    public function access(
        RouteMatch $route,
        NodeInterface $node,
        AccountInterface $account
    )
    {
        $allow = false;

        if ($node->bundle())
    }
}