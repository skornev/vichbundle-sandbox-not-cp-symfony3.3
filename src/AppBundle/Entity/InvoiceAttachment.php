<?php
/**
 * Created by PhpStorm.
 * User: mario
 * Date: 26.10.2017
 * Time: 18:06
 */

namespace AppBundle\Entity;

use AppBundle\Entity\Traits\TimestampableTrait;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\GeneratedValue;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;


/**
 * Class InvoiceAttachments
 * @package AppBundle\Entity
 * @ORM\Entity()
 * @ORM\Table(name="invoice_attachments")
 * @Vich\Uploadable
 * @ORM\HasLifecycleCallbacks
 */
class InvoiceAttachment
{
    use TimestampableTrait;

    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @GeneratedValue
     */
    private $id;


    /**
     * @var Invoice
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Invoice", inversedBy="attachments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $invoice;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="invoice_attachment", fileNameProperty="fileName", originalName="originalName", mimeType="mimeType", size="size")
     *
     * @var File
     */
    private $file;

    /**
     * @ORM\Column(name="size", type="integer", nullable=true)
     *
     * @var int
     */
    private $size;

    /**
     * @ORM\Column(nullable=true)
     *
     * @var string
     */
    private $mimeType;

    /**
     * @ORM\Column(nullable=true)
     *
     * @var string
     */
    private $originalName;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $fileName;

    /**
     * InvoiceAttachment constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     */
    public function setInvoice($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * @param int $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }



    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * @param string $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
    }


    /**
     * @return string
     */
    public function getOriginalName()
    {
        return $this->originalName;
    }

    /**
     * @param string $originalName
     */
    public function setOriginalName($originalName)
    {
        $this->originalName = $originalName;
    }



    /**
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }


    /**
     * @param File $file
     */
    public function setFile(File $file = null)
    {
        $this->file = $file;

        if ($file) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * @param string $fileName
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;
    }

}