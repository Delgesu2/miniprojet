<?php

namespace Drupal\poei\Controller;

use Drupal\node\NodeInterface;
use Drupal\Core\Controller\ControllerBase;

class PoeiController extends ControllerBase
{
    /**
     * @param NodeInterface $node
     *
     * @return array
     *
     * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
     * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
     * @throws \Drupal\Core\Entity\EntityMalformedException
     */
    public function content(NodeInterface $node)
    {
        $storage = \Drupal::entityTypeManager()->getStorage('webform_submission');
        $datas = $storage->loadByProperties([
            'entity_type' => 'node',
            'entity_id' => $node->id()
        ]);

        $values = [];

        foreach ($datas as $data) {
            $values[] = [
                $data->getData()['nom'],
                $data->getData()['prenom'],
                $data->getData()['addresse_mail'],
                $data->getData()['statut'],
                $data->toLink('Modifier', 'edit-form')
            ];

        }

        $toview = [
            '#type' => 'table',
            '#header' => ['Nom: ', 'Prénom: ', 'Courriel: ', 'Statut'],
            '#rows' => $values,
            '#empty' => "Personne n'est inscrit à cette conférence."
        ];

        return $toview;

    }

}