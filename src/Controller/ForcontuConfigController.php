<?php

/**
 * @file
 * Contains \Drupal\forcontu_config\Controller\ForcontuConfigController
 */

namespace Drupal\forcontu_config\Controller;

use Drupal\Core\Controller\ControllerBase;

class ForcontuConfigController extends ControllerBase {

    public function index(){
        $sitio = \Drupal::config('system.site');
        $config = \Drupal::config('system.date');
        $performance = \Drupal::config('system.performance');
        $css_preprocess = ($performance->get('css.preprocess')) ? 'true' : 'false';
        $js_preprocess = ($performance->get('js.preprocess')) ? 'true' : 'false';

        $forcontu_conf = \Drupal::config('forcontu_config.settings');
        
        $output = '<p>' . 'Valor de "forcontu_config.cron_duration": ' . \Drupal::state()->get('forcontu_config.cron_duration') . '</p>' . 
                  '<p>' . 'Nombre del sitio: ' . $sitio->get('name') . '</p>
                   <p>' . 'Email del sitio: ' . $sitio->get('mail') . '</p>
                   <p>' . 'País predefinido: ' . $config->get('country.default') . '</p>
                   <p>' . 'Combinar archivos CSS: ' . $css_preprocess . '</p>
                   <p>' . 'Combinar archivos JS: ' . $js_preprocess . '</p>
                   <h2>Variables de forcontu_settings</h2>
                   <ul>
                   <li>' . '<strong>subject: </strong>' . $forcontu_conf->get('newsletter.subject') . '</li>
                   <li>' . '<strong>default_from_email: </strong>' . $forcontu_conf->get('newsletter.default_from_email') . '</li>
                   <li>' . '<strong>active: </strong>' . $forcontu_conf->get('newsletter.active') . '</li>
                   <li>' . '<strong>periodicity: </strong>' . $forcontu_conf->get('newsletter.periodicity') . '</li>
                   <li>' . '<strong>news_number: </strong>' . $forcontu_conf->get('newsletter.news_number') . '</li>
                   <li>' . '<strong>country: </strong>' . $forcontu_conf->get('newsletter.country') . '</li><ul>';

        
        return [
            '#markup' => $output,
        ];
        
    }  
}