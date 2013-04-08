<?php
namespace Dragnic\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller {

    public function indexAction() {
        $response = new Response();
        $response = $this->render('CmsBundle:Home:index.html.twig', array(), $response);
        return $response;
    }
}