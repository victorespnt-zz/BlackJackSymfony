<?php

// Here are all the revealed cards informations

namespace Casino\BJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Revealed
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Revealed
{
    /**
     * @ORM\ManyToOne(targetEntity="Round", inversedBy="revealed")
     * @ORM\JoinColumn(name="round_id", referencedColumnName="id")
     **/
    protected $round;
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=50)
     */
    private $value;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Revealed
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }
}
