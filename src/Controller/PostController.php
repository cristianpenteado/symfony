<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Post;

/**
     * @Route("/post", name="post_")
     */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create()
    {
        return $this->render('post/create.html.twig');
    }

    /**
     * @Route("/save", name="save")
     */
    public function save(Request $request)
    {
       $data = $request->request->all();

        $post = new Post();
        $post.setTitle($data['title']);
        $post.setDescription($data['description']);
        $post.setContent($data['content']);
        $post.setSlug($data['slug']);
        $post.setCreatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));
        $post.setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

       $doctrine = $this->getDoctrine()->getManager();
       $doctrine->persist($post);
       $doctrine->flush();
    }
}
