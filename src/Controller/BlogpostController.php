<?php

namespace App\Controller;

use App\Entity\Blogpost;
use App\Repository\BlogpostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/news", name="news_")
 * */
class BlogpostController extends AbstractController
{
    /**
     * @Route("/", name="blogpost")
     */
    public function index(BlogpostRepository $blogpostRepository): Response
    {   
        //List all posts ordered by descending order (from latest to oldest)
        $blogposts = $blogpostRepository->findBy([],['created_at' => 'desc']);
        //List all posts
        //$blogposts = $blogpostRepository->findAll();
        // dd($blogposts);

        return $this->render('blogpost/index.html.twig', [
            'blogposts' => $blogposts,
        ]);
    }
}
