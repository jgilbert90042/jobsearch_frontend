<?php

namespace Site\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Kitpages\CmsBundle\Model\Paginator;

class PublicController extends Controller
{
    /**
     * @Route("/", name="_index")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('SiteCoreBundle:Default:index.html.twig');
    }
    /**
     * @Route("/loggedin.json")
     * @Template()
     */
    public function loggedInAction()
    {
		if ($this->get('security.context')->isGranted("ROLE_USER")) {
			echo '[{"loggedIn":1}]';
		} else {
        	echo '[{"loggedIn":0}]';
		}
		exit;
    }

}
