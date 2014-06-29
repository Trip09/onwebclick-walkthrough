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
 * Backend security controller.
 *
 * @Route("/admin")
 */
class SecurityController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     * @Route("/login", name="igniteyourproject_base_admin_bundle_login")
     */
    public function loginAction(Request $request)
    {
        $session = $request->getSession();
        $error = null;

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } elseif (null !== $session && $session->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
            $session->remove(SecurityContext::AUTHENTICATION_ERROR);
        }

        if ($error) {
            $error = $error->getMessage();
        }

        $lastUsername = (null === $session) ? '' : $session->get(SecurityContext::LAST_USERNAME);

        $csrfToken = $this
            ->getFormCsrfProvider()
            ->generateCsrfToken('authenticate');

        return $this->render(
            'IgniteYourProjectBaseAdminBundle:Security:login.html.twig',
            array(
                'last_username' => $lastUsername,
                'error' => $error,
                'token' => $csrfToken,
            )
        );
    }

    /**
     * @throws \RuntimeException
     * @Route("/loginCheck", name="igniteyourproject_base_admin_bundle_login_check")
     */
    public function checkAction()
    {
        throw new \RuntimeException('You must configure the check path to be handled by the firewall.');
    }

    /**
     * @throws \RuntimeException
     * @Route("/logout", name="igniteyourproject_base_admin_bundle_logout")
     */
    public function logoutAction()
    {
        throw new \RuntimeException('You must activate the logout in your security firewall configuration');
    }

    private function getFormCsrfProvider()
    {
        return $this->get('form.csrf_provider');
    }
}
