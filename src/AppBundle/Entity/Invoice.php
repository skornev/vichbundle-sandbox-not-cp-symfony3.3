<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 26.10.2017
 * Time: 18:04
 */

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\TimestampableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Invoice
 * @package AppBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="invoices")
 * @ORM\HasLifecycleCallbacks
 */
class Invoice
{
    use TimestampableTrait;

    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $number;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;


    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\InvoiceAttachment", mappedBy="invoice", cascade={"persist", "remove"}, orphanRemoval=true)
     *
     */
    private $attachments;


    /**
     * Invoice constructor.
     */
    public function __construct()
    {
        $this->attachments = new ArrayCollection;


    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttachments()
    {
        return $this->attachments;
    }


    /**
     * Add attachment
     * @param InvoiceAttachment $attachment
     */
    public function addAttachment(InvoiceAttachment $attachment)
    {
        $attachment->setInvoice($this);
        $this->attachments[] = $attachment;
    }

    /**
     * Remove attachment
     * @param InvoiceAttachment $attachment
     */
    public function removeAttachment(InvoiceAttachment $attachment)
    {
        $this->attachments->removeElement($attachment);
    }
}
