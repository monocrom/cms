<?php
namespace Dragnic\CmsBundle\Controller;

use Dragnic\CmsBundle\Entity\Page;
use Dragnic\CmsBundle\Form\PageType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class PageController extends AbstractRestController {

    public function showPageAction(Page $page) {
        /** @var $twig \Twig_Environment */
        $twig     = $this->get('dragnic.cmsbundle.twig_string');
        $twigFile = $this->get('dragnic.cmsbundle.twig_file');

        $template = $twigFile->render('layout.html.twig', array('page_title' => '', 'page_body' => 'hui'));

        $layout = $template; //$twig->render($page->getTemplate(), array('test' => 'cooler Test'));

        $response = new Response();
        $response->setContent($layout);
        return $response;
    }

    protected function createEntity()
    {
        return new Page();
    }

    protected function createFormType()
    {
        return new PageType();
    }

    protected function getEntity($id)
    {
        $service = $this->get('dragnic.cmsbundle.page');
        $service->getPage($id);
    }

    protected function getCreatedTargetUri($entity)
    {
        $this->getRestRouter()->generate('page_show', array('id' => $entity->getId()));
    }

    protected function getUpdateTargetUri($entity)
    {
        $this->getRestRouter()->generate('page_show', array('id' => $entity->getId()));
    }

    protected function getResourceName()
    {
        return 'Page';
    }
}