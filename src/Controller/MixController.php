<?php

namespace App\Controller;

use App\Entity\VinylMix;
use App\Repository\VinylMixRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


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

    #[Route('/{id}', name: 'app_mix_show', requirements: ['id' => '\d+'])]
    public function show($id, VinylMixRepository $mixRepository){
        $mix = $mixRepository->find(['id' => $id]);
        return $this->render('mix/show.html.twig', [
            'mix' => $mix,
        ]);
    }
}
