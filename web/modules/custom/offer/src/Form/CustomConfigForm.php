<?php

declare(strict_types=1);

namespace Drupal\offer\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure Offer settings for this site.
 */
final class CustomConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'offer_custom_config';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return ['offer.customconfig'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    $config = $this->config('offer.customconfig');
    $form['analytics'] = array(
      '#type' => 'details',
      '#title' => $this->t('Marketing && analytics'),
      '#open' => TRUE,
      );
    $form['analytics']['tagmanager'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Tagmanager code'),
      '#default_value' => $config->get('tagmanager'),
      '#maxlength' => NULL,
      ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state): void {
    // @todo Validate the form here.
    // Example:
    // @code
    //   if ($form_state->getValue('example') === 'wrong') {
    //     $form_state->setErrorByName(
    //       'message',
    //       $this->t('The value is not correct.'),
    //     );
    //   }
    // @endcode
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    parent::submitForm($form, $form_state);
    $this->config('offer.customconfig')
      ->set('tagmanager', $form_state->getValue('tagmanager'))
      ->save();
  }

}
