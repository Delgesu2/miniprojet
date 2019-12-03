<?php

namespace Drupal\poei\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Class Inscription
 * Provides a message block in case of anonymous user
 *
 * @Block(
 *  id = "poei_inscription_block",
 *  admin_label = @Translation("Inscription")
 * )
 */
class Inscription extends BlockBase
{
    /**
     * @return array|string
     */
    public function build()
    {
        $build = array('#markup' => "Bonjour cher utilisateur anonyme ! Pour t'inscrire à ce programme, clique d'abord sur 'Se connecter'  juste au-dessus");

        return $build;
    }
}
