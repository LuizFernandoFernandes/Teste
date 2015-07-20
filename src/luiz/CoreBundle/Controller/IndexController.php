<?php
namespace luiz\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class IndexController extends Controller
{
    
    /**
     * @Route("/", name="index")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        
        $posts = $em->getRepository('luizModelBundle:Post')->findAllInOrder();
        
        return ['posts' => $posts, ];
    }
    
    /**
     * @Route("/show/{id}", name="show") 
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();
        
        $post = $em->getRepository('luizModelBundle:Post')->find($id);
        
        if (!$post) {
            throw $this->createNotFoundException('O post não existe! Volte para home!');
        }
        
        return ['post' => $post, ];
    }
}
