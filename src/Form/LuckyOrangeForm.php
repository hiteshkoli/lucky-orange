<?php
/**
 * @file
 * Contains Drupal\lucky_orange\Form\LuckyOrangeForm.
 */
namespace Drupal\lucky_orange\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class LuckyOrangeForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'lucky_orange.luckyorangesettings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'lucky_orange_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('lucky_orange.luckyorangesettings');

    $form['lucky_orange_site_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Lucky Orange Site ID'),
      '#description' => $this->t('Place the lucky orange site ID for your site.'),
      '#default_value' => $config->get('lucky_orange_site_id_config'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('lucky_orange.luckyorangesettings')
      ->set('lucky_orange_site_id_config', $form_state->getValue('lucky_orange_site_id'))
      ->save();
  }

}
