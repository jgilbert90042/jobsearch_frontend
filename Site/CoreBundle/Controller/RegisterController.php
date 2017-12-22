<?php

namespace Site\CoreBundle\Controller;

use Site\UserBundle\Entity\User;
use Site\CoreBundle\Form\UserType;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\SecurityContext;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class RegisterController extends Controller
{

    /**
     * @Route("/register/", name="_register")
     */
    public function indexAction()
    {
        return new RedirectResponse($this->generateUrl('_register_create'));
    }

    /**
     * @Route("/register/create", name="_register_create")
     */
    public function createAction(Request $request)
    {

        $form = $this->get('form.factory')->create(new UserType());

        if ('POST' == $request->getMethod()) {

            $form->bindRequest($request);

            if ($form->isValid()) {

                $username = $form->get('username')->getData();
//                $role = $form->get('role')->getData();
                $role = 'ROLE_USER';

                $email = $form->get('email')->getData();

                $pass_string=$form->get('password')->getData();
                $factory = $this->get('security.encoder_factory');

                $user = new User();

                $user->setUsername($username);

                $encoder = $factory->getEncoder($user);
                $password = 
                   $encoder->encodePassword($pass_string, $user->getSalt());
                $user->setPassword($password);

                $user->setEmail($email);
                $user->setRole($role);

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($user);
                $em->flush();
        
                $this->get('session')->setFlash('notice', $username 
                  . ' has been registered!');
                return new RedirectResponse($this->generateUrl('_index'));
            }
        }

        return $this->render('SiteCoreBundle:Register:newUser.html.twig', array(
	    'form' => $form->createView()
          )
        );

    }
}

?>
