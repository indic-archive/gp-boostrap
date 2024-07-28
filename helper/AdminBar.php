<?php 
namespace OmekaTheme\Helper;

use Laminas\View\Renderer\RendererInterface;
use Omeka\Api\Representation\SiteRepresentation;
use Omeka\Entity\User;
use Omeka\View\Helper\UserBar;

class AdminBar extends UserBar {

  protected function links(RendererInterface $view, SiteRepresentation $site, User $user) {
    $links = parent::links($view, $site, $user);
    $translate = $view->plugin('translate');

    foreach ($links as &$link) {
      if ($link['url'] == '/admin') {
        $link['text'] = $translate('Admin Dashboard');
      }
    }
    return $links;
  }
}