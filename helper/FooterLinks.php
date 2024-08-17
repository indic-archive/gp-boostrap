<?php
namespace OmekaTheme\Helper;

use Laminas\View\Helper\AbstractHelper;

/**
 * View helper for rendering footer links.
 */
class FooterLinks extends AbstractHelper
{
    /**
     * The default partial view script.
     */
    const PARTIAL_NAME = 'common/footer-links';

    /**
     * Render the user bar.
     *
     * @param string|null $partialName Name of view script, or a view model
     * @return string
     */
    public function __invoke($setting_name)
    {
        /** @var \Laminas\View\Renderer\PhpRenderer */
        $view = $this->getView();

        $setting = $view->themeSetting($setting_name);

        if (empty($setting)) {
            return '';
        }

        $title = array_shift($setting);

        $links = [];

        foreach ($setting  as $link_line) {
            list($text, $url) = explode('|', $link_line);
            $links[] = [
                'text' => $text,
                'url' => $url,
            ];
        }

        return $view->partial(
            static::PARTIAL_NAME,
            [
                'title' => $title,
                'links' => $links,
            ]
        );
    }
}
