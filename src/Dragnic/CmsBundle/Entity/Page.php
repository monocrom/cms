<?php
namespace Dragnic\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Page
 * @package Dragnic\CmsBundle\Entity
 *
 * @ORM\Entity
 */
class Page {

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
     * @ORM\OneToMany(targetEntity="Site", mappedBy="page")
     */
    private $sites;

    public function getId() { return $this->id; }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * @param string $template
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    }

    /**
     * @return string
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param Site[] $sites
     */
    public function setSites(array $sites)
    {
        $this->sites = $sites;
    }

    /**
     * @return Site[]
     */
    public function getSites()
    {
        return $this->sites;
    }


}