<?php

namespace Drupal\offer\Commands;

use Drush\Commands\DrushCommands;
use Drupal\offer\SeedData\SeedDataGenerator;
use Drush\Drush;

/**
 * Class SeedGeneratorCommand
 * @package Drupal\offer\Commands
 */
class SeedGeneratorCommand extends DrushCommands {
  /**
   * Runs the OfferCreateSeeds command. Will create all data for the Offer platform.
   *
   * @command offer:create
   * @aliases offercs
   * @usage drush offer:create
   * Display 'Seed data created'
   */
  public function OfferCreateSeeds() {
    $seed = new SeedDataGenerator();
    $count = $seed->Generate('user');
    Drush::output()->writeln($count . 'user(s) created');
  }

}
