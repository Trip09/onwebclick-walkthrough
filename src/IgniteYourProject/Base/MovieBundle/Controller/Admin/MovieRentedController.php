<?php

namespace IgniteYourProject\Base\MovieBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use IgniteYourProject\Base\MovieBundle\Entity\MovieRented;
use IgniteYourProject\Base\MovieBundle\Form\MovieRentedType;

/**
 * MovieRented controller.
 *
 * @Route("/admin/movie/rented")
 */
class MovieRentedController extends Controller
{

    /**
     * Lists all MovieRented entities.
     *
     * @Route("/", name="admin_movie_rented")
     * @Method("GET")
     * @Template("IgniteYourProjectBaseMovieBundle:Admin/MovieRented:index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        /** @var \IgniteYourProject\Base\MovieBundle\Repository\Movie $entities */
        $entities = $em->getRepository('IgniteYourProjectBaseMovieBundle:MovieRented')->findAllAvailable();

        return array('entities' => $entities);
    }
    /**
     * Creates a new MovieRented entity.
     *
     * @Route("/", name="admin_movie_rented_create")
     * @Method("POST")
     * @Template("IgniteYourProjectBaseMovieBundle:MovieRented:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new MovieRented();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_movie_rented_show', array('id' => $entity->getId())));
        }

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
        $form = $this->createForm(new MovieRentedType(), $entity, array(
            'action' => $this->generateUrl('admin_movie_rented_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new MovieRented entity.
     *
     * @Route("/new", name="admin_movie_rented_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MovieRented();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a MovieRented entity.
     *
     * @Route("/{id}", name="admin_movie_rented_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IgniteYourProjectBaseMovieBundle:MovieRented')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MovieRented entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing MovieRented entity.
     *
     * @Route("/{id}/edit", name="admin_movie_rented_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IgniteYourProjectBaseMovieBundle:MovieRented')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MovieRented entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a MovieRented entity.
    *
    * @param MovieRented $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(MovieRented $entity)
    {
        $form = $this->createForm(new MovieRentedType(), $entity, array(
            'action' => $this->generateUrl('admin_movie_rented_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing MovieRented entity.
     *
     * @Route("/{id}", name="admin_movie_rented_update")
     * @Method("PUT")
     * @Template("IgniteYourProjectBaseMovieBundle:MovieRented:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('IgniteYourProjectBaseMovieBundle:MovieRented')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MovieRented entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_movie_rented_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a MovieRented entity.
     *
     * @Route("/{id}", name="admin_movie_rented_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('IgniteYourProjectBaseMovieBundle:MovieRented')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MovieRented entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_movie_rented'));
    }

    /**
     * Creates a form to delete a MovieRented entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_movie_rented_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
