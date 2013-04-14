<?php
namespace Dragnic\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Site
 * @package Dragnic\CmsBundle\Entity
 *
 * @ORM\Entity
 */
class Site {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $template;
    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="sites")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     */
    private $page;
    /**
     * @ORM\OneToOne(targetEntity="SlotItem")
     */
    private $rootSlot;

    public function getId() { return $this->id; }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPage($page)
    {
        $this->page = $page;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setRootSlot($rootSlot)
    {
        $this->rootSlot = $rootSlot;
    }

    public function getRootSlot()
    {
        return $this->rootSlot;
    }

    public function setTemplate($template)
    {
        $this->template = $template;
    }

    public function getTemplate()
    {
        return $this->template;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }
}