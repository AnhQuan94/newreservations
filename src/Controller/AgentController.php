<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Agent;

class AgentController extends AbstractController
{
    /**
     * @Route("/agent", name="agent")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Agent::class);
        $agents = $repository->findAll();

        return $this->render('agent/index.html.twig', [
            'agents' => $agents,
            'resource'=> 'agents'
        ]);
    }
     /**
     * @Route("/agent/{id}", name="agent_show")
     */
    public function show($id)
    {
        $repository = $this->getDoctrine()->getRepository(Agent::class);
        $agent = $repository->find($id);

        return $this->render('agent/show.html.twig', [
            'agent' => $agent,
        ]);
    }
}
