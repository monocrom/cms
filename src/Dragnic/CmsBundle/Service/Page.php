<?php
namespace Dragnic\CmsBundle\Service;

use Doctrine\ORM\EntityManager;

class Page {
    private $em;

    public function __construct(EntityManager $em) {
        $this->em = $em;
    }

    /**
     * @return \Dragnic\CmsBundle\Entity\Page
     */
    public function getPage($id = null) {
        $repo = $this->em->getRepository('Dragnic\CmsBundle\Entity\Page');

        if ($id) {
            $page = $repo->find($id);
        } else {
            $page = $repo->findOneBy(array());
        }

        return $page;
    }

    public function getPages() {
        $repo = $this->em->getRepository('Dragnic\CmsBundle\Entity\Page');
        $pages = $repo->findAll();
        return $pages;
    }
}