<?php

// Création de l'entité game qui représentera le jeu

namespace Casino\BJBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Game
{
    /**
     * @ORM\OneToMany(targetEntity="Round", mappedBy="game")
     **/
    protected $rounds;

    /**
     * @ORM\ManyToOne(targetEntity="Player", inversedBy="game")
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id")
     **/
    protected $player;

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
     * @ORM\Column(name="score", type="string", length=255)
     */
    private $score;


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
     * Set score
     *
     * @param string $score
     * @return Game
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return string 
     */
    public function getScore()
    {
        return $this->score;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rounds = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rounds
     *
     * @param \Acme\BlackJackBundle\Entity\Round $rounds
     * @return Game
     */
    public function addRound(\Acme\BlackJackBundle\Entity\Round $rounds)
    {
        $this->rounds[] = $rounds;

        return $this;
    }

    /**
     * Remove rounds
     *
     * @param \Acme\BlackJackBundle\Entity\Round $rounds
     */
    public function removeRound(\Acme\BlackJackBundle\Entity\Round $rounds)
    {
        $this->rounds->removeElement($rounds);
    }

    /**
     * Get rounds
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRounds()
    {
        return $this->rounds;
    }



    /**
     * Get running round
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRunningRound()
{
       $repository = $this->getDoctrine()
    ->getRepository('CasinoBJBundle:Game');

    $query = $repository->createQueryBuilder('r')
    ->where('r.status = running')
    ->getQuery();

    return query->getResult();
}

    /**
     * Set player
     *
     * @param \Acme\BlackJackBundle\Entity\Player $player
     * @return Game
     */
    public function setPlayer(\Acme\BlackJackBundle\Entity\Player $player = null)
    {
        $this->player = $player;

        return $this;
    }

    /**
     * Get player
     *
     * @return \Acme\BlackJackBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }
}
