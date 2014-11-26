<?php

// here are all the infos about a round (what kind of variables in it, all the information that we will use in other files...)


namespace Casino\BJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Round
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Round
{
    /**
     * @ORM\OneToMany(targetEntity="Revealed", mappedBy="round")
     **/
    protected $revealed;

    /**
     * @ORM\ManyToOne(targetEntity="Game", inversedBy="round")
     * @ORM\JoinColumn(name="game_id", referencedColumnName="id")
     **/
    protected $game;

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
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status = 'running';

    /**
     * @var boolean
     *
     * @ORM\Column(name="won", type="boolean")
     */
    private $won = false;

    /**
     * @var integer
     *
     * @ORM\Column(name="bet", type="integer")
     */
    private $bet = 0;


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
     * Set won
     *
     * @param boolean $won
     * @return Round
     */
    public function setWon($won)
    {
        $this->won = $won;

        return $this;
    }

    /**
     * Get won
     *
     * @return boolean 
     */
    public function getWon()
    {
        return $this->won;
    }

    /**
     * Set bet
     *
     * @param string $bet
     * @return Round
     */
    public function setBet($bet)
    {
        $this->bet = $bet;

        return $this;
    }

    /**
     * Get bet
     *
     * @return string 
     */
    public function getBet()
    {
        return $this->bet;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->revealed = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add revealed
     *
     * @param \Acme\BlackJackBundle\Entity\Revealed $revealed
     * @return Round
     */
    public function addRevealed(\Acme\BlackJackBundle\Entity\Revealed $revealed)
    {
        $this->revealed[] = $revealed;

        return $this;
    }

    /**
     * Remove revealed
     *
     * @param \Acme\BlackJackBundle\Entity\Revealed $revealed
     */
    public function removeRevealed(\Acme\BlackJackBundle\Entity\Revealed $revealed)
    {
        $this->revealed->removeElement($revealed);
    }

    /**
     * Get revealed
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRevealed()
    {
        return $this->revealed;
    }

    /**
     * Set game
     *
     * @param \Acme\BlackJackBundle\Entity\Game $game
     * @return Round
     */
    public function setGame(\Acme\BlackJackBundle\Entity\Game $game = null)
    {
        $this->game = $game;

        return $this;
    }

    /**
     * Get game
     *
     * @return \Acme\BlackJackBundle\Entity\Game 
     */
    public function getGame()
    {
        return $this->game;
    }
}

