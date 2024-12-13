<?php

namespace App\Controller;

use App\Entity\VinylMix;
use App\Repository\VinylMixRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


#[Route('/mix')]
class MixController extends AbstractController
{
    #[Route('/new', name: 'app_mix')]
    public function new(EntityManagerInterface $em): Response
    {
        $mix = new VinylMix();
        $mix->setTitle('Do you Remember... Phil Collins?!');
        $mix->setDescription('A pure mix of drummers turned singers!');
        $genresArray = ['pop', 'rock', 'heavy-metal'];
        $mix->setGenre($genresArray[array_rand($genresArray)]);
        $mix->setTrackCount(rand(5,20));
        $mix->setVotes(rand(-50,50));

        $em->persist($mix);
        $em->flush();
        return new Response(sprintf(
            'Mix %d is %d tracks of pure 80\'s heaven',
            $mix->getId(),
            $mix->getTrackCount()
        ));
    }

    #[Route('/{slug}', name: 'app_mix_show')]
    public function show(VinylMix $mix, VinylMixRepository $mixRepository){
        //$mix = $mixRepository->find(['id' => $id]);

        // if(!$mix){
        //     throw $this->createNotFoundException('Mix not found');
        // }

        return $this->render('mix/show.html.twig', [
            'mix' => $mix,
        ]);
    }


    #[Route('/{slug}/vote', name: 'app_mix_vote', methods: ['POST', ])]
    public function vote(VinylMix $mix, Request $request, EntityManagerInterface $em): Response{

        $vote = $request->request->get('direction', 'up');

        if($vote === 'up'){
            $mix->voteUp();
        }else{
            $mix->voteDown();
        }

        $em->flush();

        $this->addFlash('success', 'Vote '.$vote.' Success');

        return $this->redirectToRoute('app_mix_show', [
            'slug' => $mix->getSlug(),
        ]);
    }
}
