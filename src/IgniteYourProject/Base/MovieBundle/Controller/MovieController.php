<?php

namespace IgniteYourProject\Base\MovieBundle\Controller;

use IgniteYourProject\Base\MovieBundle\Form\MovieRentedTypeWeb;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IgniteYourProject\Base\MovieBundle\Entity\Movie;
use IgniteYourProject\Base\MovieBundle\Entity\MovieRented;
use IgniteYourProject\Base\MovieBundle\Form\MovieType;

/**
 * Movie controller.
 *
 * @Route("/")
 */
class MovieController extends Controller
{

    /**
     * Lists all Movie entities.
     *
     * @Route("/", name="homepage")
     * @Method("GET")
     * @Template("IgniteYourProjectBaseMovieBundle::index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('IgniteYourProjectBaseMovieBundle:Movie')->findAllAvailable();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Displays a form to edit an existing MovieRented entity.
     *
     * @Route("/rent/{id}", name="rented_movie")
     * @Method("GET")
     * @Template("IgniteYourProjectBaseMovieBundle::new.html.twig")
     */
    public function newAction($id)
    {
        $entity = new MovieRented();
        $form   = $this->createCreateForm($entity);
        $form->add('movie_id', 'hidden', array('data' => $id));

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );

    }

    /**
     * Creates a form to create a MovieRented entity.
     *
     * @param MovieRented $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(MovieRented $entity)
    {
        $form = $this->createForm(new MovieRentedTypeWeb(), $entity, array(
                'action' => $this->generateUrl('movie_rented_create'),
                'method' => 'POST',
            ));
        $form->add('submit', 'submit', array('label' => 'Checkout'));

        return $form;
    }
    /**
     * Creates a new MovieRented entity.
     *
     * @Route("/movie/rent/checkout", name="movie_rented_create")
     * @Method("POST")
     * @Template("IgniteYourProjectBaseMovieBundle::new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new MovieRented();
        $data = $request->request->get('igniteyourproject_base_moviebundle_movierented_web');
        $entity->setMovieId($data['movie_id']);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $movie = $em->getRepository('IgniteYourProjectBaseMovieBundle:Movie')->findOneById($data['movie_id']);
            $movie->setAvailable($movie->getAvailable()-1);
            // TODO check the available movies
            $entity->setMovie($movie);
            $em->persist($movie);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('homepage'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
}
