<?php

namespace Casino\BJBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class GameController extends Controller
{
    // Launch a new game
    public function playAction()
    {
        // Initialize a new game session
        $session = new session();

        if (!$session->get('game')) {
            $game = new Game();
        }
        else {
            $game = unserialize($session->get('game'));
        }

        if (!game->getRunningRound()) {
            $round = new Round();
            $game-> addRound($round);

                    // $player <-- à définir

        $em = $this->getDoctrine()->getManager();
        $em->persist($player);
        $em->flush();
        }

    }
}
