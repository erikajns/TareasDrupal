<?php

namespace Drupal\new_email_formatter\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Link;

/**
 * Plugin implementation of the 'new_email_field_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "new_email_field_formatter",
 *   label = @Translation("New email field formatter"),
 *   field_types = {
 *     "email"
 *   }
 * )
 */
class NewEmailFieldFormatter extends FormatterBase {

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = [
            '#type'=> 'markup',
            '#markup' => $this->viewValue($item)];
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
    // The text value has no text format assigned to it, so the user input
    // should equal the output, including newlines.
    $url = Url::fromUri('mailto:'.$item->value);
    $link = Link::fromTextAndUrl($this->t('Enviar correo'), $url);
    //return nl2br(Html::escape($item->value));
    return $link->toString();
  }

}
