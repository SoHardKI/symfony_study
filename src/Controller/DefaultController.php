<?php

namespace App\Controller;

use App\Entity\User;
use App\Services\GiftsService;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    public function __construct(LoggerInterface $logger)
    {
        $logger->info('123');
    }

    /**
     * @Route("/", name="default")
     */
    public function index(GiftsService $giftsService, Request $request, SessionInterface $session)
    {
//        $users = ['Anton', 'dasdsada', 'adsadad'];
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
//        $session->set('name', 'session value');
//        $session->remove('name');
//        if($session->has('name')) {
//            exit($session->get('name'));
//        }
//        exit($request->query->get('page', 'default'));
        $request->isXmlHttpRequest(); // Check ajax query
        $request->request->get('post_name'); // Check post
//        exit($request->cookies->get('PHPSESSID'));
//        $user = new User;
//        $user->setName('Adam');
//        $user2 = new User;
//        $user2->setName('Robert');
//        $user3 = new User;
//        $user3->setName('Tony');
//        $user4 = new User;
//        $user4->setName('Alex');
//        $entitymanager->persist($user);
//        $entitymanager->persist($user2);
//        $entitymanager->persist($user3);
//        $entitymanager->persist($user4);
//        $entitymanager->flush();
//        $this->addFlash('notice','my notice');
//        $this->addFlash('warning','my warning');
//        $cookie = new Cookie(
//            'my_cookie',
//            'cookie_value',
//            time() + (2 * 365 * 24 * 60 * 60)
//        );
//
//        $res = new Response();
//        $res->headers->setCookie($cookie);
//        $res->send();
        $res = new Response();
        $res->headers->clearCookie('my_cookie');
        $res->send();

        return $this->render('default/index.html.twig', [
            'users' => $users,
            'controller_name' => 'default',
            'gift' => $giftsService->gifts,
        ]);
    }

    /**
     * @Route("/blog/{page?}", name="blog_list", requirements= {"page"="\d+"})
     */
    public function index2()
    {
        return new Response('Some TEXT');
    }

    /**
     * @Route(
     *     "/articles/{_locale}/{year}/{slug}/{category}",
     *     defaults={"category":"computers"},
     *     requirements={
     *     "_locale":"en|ru",
     *     "category": "computers|rtv",
     *     "year":"\d+",
     *     }
     * )
     */
    public function index3()
    {
        return new Response('New TEST');
    }

    /**
     * @Route({
     *  "nl" : "/over-ons",
     *     "en":"/about-us",
     *     }, name = "about us",
     *     )
     */
    public function index4()
    {
        return new Response('answer');
    }
}
