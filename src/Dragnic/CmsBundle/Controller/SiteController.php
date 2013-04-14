<?php
namespace Dragnic\CmsBundle\Controller;

use Dragnic\CmsBundle\Entity\Site;
use Dragnic\CmsBundle\Form\SiteType;
use Symfony\Component\HttpFoundation\Response;

class SiteController extends AbstractRestController {

    public function newAction($id, $page_id=null) {
        $page = $this->get('dragnic.cmsbundle.page')->getPage($page_id);
        $site = $this->createEntity();
        $site->setPage($page);
        $em = $this->getDoctrine()->getManager();
        $em->persist($site);
        $em->flush();

        $parameter = array();

        return $this->render('CmsBundle:Cms:index.html.twig', $parameter);


    }

    protected function createEntity()
    {
        return new Site();
    }

    protected function createFormType()
    {
        return new SiteType();
    }

    protected function getEntity($id)
    {
        $service = $this->get('dragnic.cmsbundle.page');
        $service->getSite($id);
    }

    protected function getCreatedTargetUri($entity)
    {
        $this->getRestRouter()->generate('site_show', array('id' => $entity->getId()));
    }

    protected function getUpdateTargetUri($entity)
    {
        $this->getRestRouter()->generate('site_show', array('id' => $entity->getId()));
    }

    protected function getResourceName()
    {
        return 'Site';
    }
}