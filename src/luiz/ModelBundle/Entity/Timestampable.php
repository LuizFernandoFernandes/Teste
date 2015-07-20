<?php 
namespace luiz\ModelBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/** 
 * Timestampable abstract class 
 * @ORM\MappedSuperclass 
 */ 

abstract class Timestampable{

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="created_at", type="datetime")
	 * @Assert\NotBlank
	 */
	private $createdAt;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="update_at", type="datetime")
	 * @Assert\NotBlank
	 */
	private $updateAt;




	public function __construct(){

		$datatime = new \DateTime();

		$this-> createdAt = $datatime;
		$this-> updateAt = $datatime;

		

	}

	/**
	 * Set createdAt
	 *
	 * @param \DateTime $createdAt
	 * @return Post
	 */
	public function setCreatedAt($createdAt)
	{
	    $this->createdAt = $createdAt;

	    return $this;
	}

	/**
	 * Get createdAt
	 *
	 * @return \DateTime 
	 */
	public function getCreatedAt()
	{
	    return $this->createdAt;
	}

	/**
	 * Set updateAt
	 *
	 * @param \DateTime $updateAt
	 * @return Post
	 */
	public function setUpdateAt($updateAt)
	{
	    $this->updateAt = $updateAt;

	    return $this;
	}

	/**
	 * Get updateAt
	 *
	 * @return \DateTime 
	 */
	public function getUpdateAt()
	{
	    return $this->updateAt;
	}

}