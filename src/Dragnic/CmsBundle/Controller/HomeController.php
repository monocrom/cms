<?php
namespace Dragnic\CmsBundle\Controller;

use Dragnic\CmsBundle\Service\Page;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller {

    public function indexAction() {

        /** @var $pageService Page*/
        $pageService = $this->get('dragnic.cmsbundle.page');
        $page = $pageService->getPage();

        if ($page) {
            $response = $this->forward('CmsBundle:Page:show', array('page' => $page));
        }
        else {
            $response = new Response();
            $response = $this->render('CmsBundle:Home:index.html.twig', array(), $response);
        }
        return $response;
    }
}