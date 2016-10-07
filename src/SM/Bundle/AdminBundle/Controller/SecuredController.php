<?php

namespace SM\Bundle\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/")
 */
class SecuredController extends Controller
{

    /**
     * @Route("/login", name="admin_login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'AdminBundle:Secured:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );

    }

    /**
     * @Route("/login_check", name="admin_security_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request

    }

    /**
     * @Route("/logout", name="admin_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request

    }

    /**
     * @Route("/hello", defaults={"name"="World"}),
     * @Route("/hello/{name}", name="_demo_secured_hello")
     * @Template()
     */
    public function helloAction($name)
    {
        return array(
            'name' => $name);

    }
}
