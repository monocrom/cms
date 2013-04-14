<?php
namespace Dragnic\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Site
 * @package Dragnic\CmsBundle\Entity
 *
 * @ORM\Entity
 */
class SlotItem {
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $template;

    /**
     * @ORM\ManyToOne(targetEntity="SlotItem", inversedBy="slots")
     * @ORM\JoinColumn(name="parent_slot_id", referencedColumnName="id")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="SlotItem", mappedBy="parent")
     */
    private $slots;

    public function getId() { return $this->id; }

}