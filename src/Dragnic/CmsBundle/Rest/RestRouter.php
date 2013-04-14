<?php
namespace Dragnic\CmsBundle\Rest;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RestRouter {
    private $router;
    public function __construct(UrlGeneratorInterface $router) {
        $this->router = $router;
    }

    public function generate($routeName) {
        $arguments = func_get_args();
        $uri = $this->twigGenerate($routeName, $arguments);
        return $uri;
    }

    public function twigGenerate($routeName, $arguments) {
        $routeArguments = explode('_', $routeName);

        $parameter = array(
            'entity' => $routeArguments[0],
            'action' => $routeArguments[1]
        );

        foreach($arguments as $argument) {
            if (is_object($argument)) {
                $parameter['nested_id']     = $argument->getId();
                $classNameParts = explode('\\', get_class($argument));
                $parameter['nested_entity'] = strtolower(array_pop($classNameParts));
            }
        }
        $routeName = (array_key_exists('nested_id', $parameter)) ? 'nest_rest' : 'rest';
        $uri = $this->router->generate($routeName, $parameter);
        return $uri;
    }
}