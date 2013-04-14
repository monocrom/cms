<?php
namespace Dragnic\CmsBundle\Twig;

use Dragnic\CmsBundle\Rest\RestRouter;

class RestTwigExtension extends \Twig_Extension {
    private $router;

    public function __construct(RestRouter $router) {
        $this->router = $router;
    }
    public function getFilters() {
        return array();
    }

    public function getName() {
        return 'rest_extension';
    }

    public function getFunctions() {
        $functions = array(
            'link' => new \Twig_Function_Method($this, 'link')
        );

        return $functions;
    }

    public function link($routeName) {
        $arguments = func_get_args();
        $uri       = $this->router->twigGenerate($routeName, $arguments);
        return $uri;
    }
}