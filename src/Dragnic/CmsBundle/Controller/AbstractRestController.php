<?php
namespace Dragnic\CmsBundle\Controller;

use Dragnic\CmsBundle\Rest\RestRouter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractRestController extends Controller {

    public function showAction($id) {
        $entity = $this->getEntity($id);
        $name   = $this->getResourceName();
        $response = $this->render(
            'CmsBundle:' . $name . ':show.html.twig',
            array(
                strtolower($name) => $entity
            )
        );
        return $response;
    }

    public function newAction() {
        $entity = $this->createEntity();
        $form = $this->createForm($this->createFormType(), $entity);
        $response = $this->render(
            'CmsBundle:' . $this->getResourceName() . ':new.html.twig',
            array(
                'form' => $form->createView()
            )
        );
        return $response;
    }

    public function createAction() {
        $request  = $this->getRequest();

        $entity     = $this->createEntity();
        $form     = $this->createForm($this->createFormType(), $entity);

        $form->bind($request);

        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();

        $response = $this->redirect($this->getCreatedTargetUri($entity));

        return $response;
    }

    public function editAction($id) {
        $response = new Response();

        $entity = $this->getEntity($id);
        if ($entity) {
            $form = $this->createForm($this->createFormType(), $entity);
            $name = $this->getResourceName();
            $response = $this->render(
                'CmsBundle:' . $name . ':edit.html.twig',
                array(
                    'form'            => $form->createView(),
                    strtolower($name) => $entity
                ),
                $response
            );
        }

        return $response;
    }

    public function updateAction($id) {
        $request  = $this->getRequest();

        $entity     = $this->getEntity($id);
        if ($entity) {
            $form = $this->createForm($this->createFormType(), $entity);
            $form->bind($request);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $response = $this->redirect($this->getUpdateTargetUri($entity));
        }

        return $response;
    }

    /**
     * @return RestRouter
     */
    protected function getRestRouter() {
        return $this->get('dragnic.rest.router');
    }

    protected abstract function createEntity();
    protected abstract function createFormType();
    protected abstract function getEntity($id);
    protected abstract function getCreatedTargetUri($entity);
    protected abstract function getUpdateTargetUri($entity);
    protected abstract function getResourceName();

}