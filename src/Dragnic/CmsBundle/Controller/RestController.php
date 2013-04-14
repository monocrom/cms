<?php
namespace Dragnic\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RestController extends Controller {
    public function forwardAction($entity, $action, $id=null) {
        $response = $this->forward('CmsBundle:' . ucfirst($entity) . ':' . $action, array('id' => $id));
        return $response;
    }

    public function nestedForwardAction($nested_entity, $nested_id, $entity, $action, $id=null) {
        $response = $this->forward(
            'CmsBundle:' . ucfirst($entity) . ':' . $action,
            array(
                $nested_entity . '_id' => $nested_id,
                'id'            => $id
            )
        );
        return $response;
    }
}