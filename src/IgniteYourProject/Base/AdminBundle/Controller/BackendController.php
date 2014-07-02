<?php

namespace IgniteYourProject\Base\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Security\Core\SecurityContext;

/**
 * Backend controller.
 *
 * @Route("/admin")
 */
class BackendController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     * @Route("/")
     * @Route("/dashboard", name="igniteyourproject_base_admin_bundle_dashboard")
     */
    public function dashboardAction(Request $request)
    {
        return $this->render('::Backend/layout.html.twig');
    }
}
