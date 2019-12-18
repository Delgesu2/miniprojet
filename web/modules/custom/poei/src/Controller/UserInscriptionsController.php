<?php
/**
 * Created by PhpStorm.
 * User: POE10
 * Date: 18/12/2019
 * Time: 14:49
 */

namespace Drupal\poei\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\user\UserInterface;

class UserInscriptionsController extends ControllerBase
{
    /**
     * @param UserInterface $user
     *
     * @return array
     *
     * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
     * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
     * @throws \Drupal\Core\Entity\EntityMalformedException
     */
    public function show_conf_list(UserInterface $user)
    {
        $storage = \Drupal::entityTypeManager()->getStorage('webform_submission');
        $datas = $storage->loadByProperties([
        'entity_type' => 'node',
        'uid' => $user->id()
        ]);

        $values = [];

        foreach ($datas as $data) {
        $values[] = [
        $data->getSourceEntity()->getTitle(),
        $data->getCreatedTime(),
        $data->getData()['statut']
        ];
    }

    $toview = [
        '#type' => 'table',
        '#header' => ['Titre', 'Créer le', 'Statut'],
        '#rows' => $values,
        '#empty' => "Personne n'est inscrit à aucune conférence."
    ];

    return $toview;

    }
}