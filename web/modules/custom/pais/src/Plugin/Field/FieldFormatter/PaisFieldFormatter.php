<?php

namespace Drupal\pais\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'new_pais_field_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "new_pais_field_formatter",
 *   label = @Translation("New pais field formatter"),
 *   field_types = {
 *     "pais_field_type"
 *   }
 * )
 */
class PaisFieldFormatter extends FormatterBase {


  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = ['#markup' => $this->viewValue($item)];
    }

    return $elements;
  }

  /**
   * Generate the output appropriate for one field item.
   *
   * @param \Drupal\Core\Field\FieldItemInterface $item
   *   One field item.
   *
   * @return string
   *   The textual output generated.
   */
  protected function viewValue(FieldItemInterface $item) {
    $paises = \Drupal::service('country_manager')->getList();
    $pais = $paises[$item->value];
    return $pais;


    //return nl2br(Html::escape($item->value));
  }

}
