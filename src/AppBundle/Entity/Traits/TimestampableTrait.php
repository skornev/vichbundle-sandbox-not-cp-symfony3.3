<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 26.10.2017
 * Time: 18:19
 */

namespace AppBundle\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


trait TimestampableTrait
{
    /**
     * @var \DateTime $createdAt Created at
     *
     * @Assert\Type("\DateTime")
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $createdAt;
    /**
     * @var \DateTime $updatedAt Updated at
     *
     * @Assert\Type("\DateTime")
     *
     * @ORM\Column(type="datetime", nullable=false)
     */
    protected $updatedAt;

    /**
     * Get created at
     *
     * @return \DateTime Created at
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set created at
     *
     * @param \DateTime $createdAt Created at
     *
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt)
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * Get updated at
     *
     * @return \DateTime Updated at
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set updated at
     *
     * @param \DateTime $updatedAt Updated at
     *
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setUpdatedAt(new \DateTime());
    }
}