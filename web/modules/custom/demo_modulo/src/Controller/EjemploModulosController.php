<?php
namespace Drupal\demo_modulo\Controller;

use Drupal\Core\Controller\ControllerBase;

class EjemploModulosController extends ControllerBase{

  public function testDemo(){

    {

    }

    $items = [

          [
            'title' => 'Hola',
            'description' => 'Mundo',
          ],[
            'title' => 'Hola 2',
            'description' => 'Mundo 2',
          ],
          [
            'title' => 'Hola 3',
            'description' => 'Mundo 3',
          ],
    ];

    $build = [
      'items' =>[
      ],
      '#prefix' => '<div id="accordion" class="container">',
      '#suffix' => '</div>',
      '#attached' => [
          'library' => [
            'core/jquery.ui.accordion',
            'demo_modulo/demo_modulo.accordion'
          ]
      ]
    ];

    foreach($items as $item){
      $build['items'][] =[
        '#theme' => 'demo_modulo',
        '#title' => $item['title'],
        '#description' => $item['description']
      ];
    }

    return $build;
  }
}
