<?php

namespace luiz\ModelBundle\Entity; 
 
use Doctrine\ORM\Mapping as ORM; 
use Symfony\Component\Validator\Constraints as Assert; 
use Doctrine\Common\Collections\ArrayCollection; 
 
/** 
 * Author 
 * 
 * @ORM\Table(name="author") 
 * @ORM\Entity 
 */ 
class Author extends Timestampable 
{ 
   /** 
     * @var integer 
     * 
     * @ORM\Column(name="id", type="integer") 
     * @ORM\Id 
     * @ORM\GeneratedValue(strategy="AUTO") 
     */ 
    private $id; 
 
    /** 
     * @var string 
     * 
     * @ORM\Column(name="name", type="string", length=100) 
     * @Assert\NotBlank 
     */ 
    private $name; 

    /** 
     * @var string 
     * 
     * @ORM\Column(name="email", type="string", length=100) 
     * 
     */ 
    private $email; 
 
    /** 
     * @var ArrayCollection 
     * 
     * @ORM\OneToMany(targetEntity="Post", mappedBy="author", cascade={"remove"}) 
     */ 
    private $post; 

 
    /** 
     * Constructor 
     */ 
    public function __construct() 
    { 
         parent::__construct();
 
        $this->post = new ArrayCollection(); 
    } 
 
        /** 
     * Get id 
     * 
     * @return integer 
     */ 
    public function getId() 
    { 
        return $this->id; 
    } 
 
    /** 
     * Set name 
     * 
     * @param string $name 
     * @return Author 
     */ 
    public function setName($name) 
    { 
        $this->name = $name; 
 
        return $this; 
    } 
 
    /** 
     * Get name 
     * 
     * @return string
    */ 
    public function getName() 
    { 
        return $this->name; 
    } 
 
    /** 
     * Add post 
     * 
     * @param \luiz\ModelBundle\Entity\Post $post 
     * @return Author 
     */ 
    public function addPost(\luiz\ModelBundle\Entity\Post $post) 
    { 
        $this->post[] = $post; 
 
        return $this; 
    } 
 
    /** 
     * Remove post 
     * 
     * @param \luiz\ModelBundle\Entity\Post $post 
     */ 
    public function removePost(\luiz\ModelBundle\Entity\Post $post) 
    { 
        $this->post->removeElement($post); 
    } 
 
    /** 
     * Get post 
     * 
     * @return \Doctrine\Common\Collections\Collection 
     */ 
    public function getPost() 
    { 
        return $this->post; 
    } 
 
    /** 
     * @return string 
     */ 
    public function __toString() 
    { 
        return $this->getName(); 
    } 

    /**
     * Set email
     *
     * @param string $email
     * @return Author
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }
}
