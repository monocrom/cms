<?php
namespace Dragnic\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CmsController extends Controller {
    public function indexAction() {
        $response = new Response();
        $request  = $this->getRequest();

        $pages = $this->get('dragnic.cmsbundle.page')->getPages();

        $template  = 'CmsBundle:Cms:index.html.twig';
        $parameter = array(
            'pages' => $pages
        );
        $response  = $this->render($template, $parameter, $response);
        return $response;
    }

}