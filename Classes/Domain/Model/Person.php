<?php
namespace CPSIT\Persons\Domain\Model;

/***
 *
 * This file is part of the "Persons" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Dirk Wenzel <wenzel@cps-it.de>
 *
 ***/

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

/**
 * Person
 */
class Person extends AbstractEntity
{
    const GENDER_UNKNOWN = 0;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    /**
     * gender
     *
     * @var int
     */
    protected $gender = self::GENDER_UNKNOWN;

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * firstName
     *
     * @var string
     */
    protected $firstName = '';

    /**
     * lastName
     *
     * @var string
     */
    protected $lastName = '';

    /**
     * position
     *
     * @var string
     */
    protected $position = '';

    /**
     * address
     *
     * @var string
     */
    protected $address = '';

    /**
     * zip
     *
     * @var string
     */
    protected $zip = '';

    /**
     * city
     *
     * @var string
     */
    protected $city = '';

    /**
     * phone
     *
     * @var string
     */
    protected $phone = '';

    /**
     * fax
     *
     * @var string
     */
    protected $fax = '';

    /**
     * email
     *
     * @var string
     */
    protected $email = '';

    /**
     * short biography
     *
     * @var string
     */
    protected $shortBiography = '';

    /**
     * biography
     *
     * @var string
     */
    protected $biography = '';

    /**
     * image
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @lazy
     * @cascade remove
     */
    protected $image = null;

    /**
     * status
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\Category
     * @lazy
     */
    protected $status = null;

    /**
     * Content elements
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CPSIT\Persons\Domain\Model\Content>
     * @lazy
     */
    protected $contentElements = null;

    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->contentElements = new ObjectStorage();
    }

    /**
     * Returns the gender
     *
     * @return int $gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Sets the gender
     *
     * @param int $gender
     * @return void
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Returns the firstName
     *
     * @return string $firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Sets the firstName
     *
     * @param string $firstName
     * @return void
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Returns the lastName
     *
     * @return string $lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Sets the lastName
     *
     * @param string $lastName
     * @return void
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Returns the position
     *
     * @return string $position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Sets the position
     *
     * @param string $position
     * @return void
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * Returns the address
     *
     * @return string $address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the address
     *
     * @param string $address
     * @return void
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * Returns the zip
     *
     * @return string $zip
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Sets the zip
     *
     * @param string $zip
     * @return void
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * Returns the city
     *
     * @return string $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Sets the city
     *
     * @param string $city
     * @return void
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Returns the phone
     *
     * @return string $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Sets the phone
     *
     * @param string $phone
     * @return void
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Returns the fax
     *
     * @return string $fax
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Sets the fax
     *
     * @param string $fax
     * @return void
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Returns the biography
     *
     * @return string $biography
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Sets the biography
     *
     * @param string $biography
     * @return void
     */
    public function setBiography($biography)
    {
        $this->biography = $biography;
    }

    /**
     * Returns the biography
     *
     * @return string $biography
     */
    public function getShortBiography()
    {
        return $this->biography;
    }

    /**
     * Sets the biography
     *
     * @param string $shortBiography
     * @return void
     */
    public function setShortBiography($shortBiography)
    {
        $this->shortBiography = $shortBiography;
    }

    /**
     * Returns the image
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Sets the image
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $image
     * @return void
     */
    public function setImage(\TYPO3\CMS\Extbase\Domain\Model\FileReference $image)
    {
        $this->image = $image;
    }

    /**
     * Returns the status
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\Category $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets the status
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\Category $status
     * @return void
     */
    public function setStatus(\TYPO3\CMS\Extbase\Domain\Model\Category $status)
    {
        $this->status = $status;
    }

    /**
     * Adds a content element
     *
     * @param \CPSIT\Persons\Domain\Model\Content $contentElement
     * @return void
     */
    public function addContentElement(\CPSIT\Persons\Domain\Model\Content $contentElement)
    {
        $this->contentElements->attach($contentElement);
    }

    /**
     * Removes a content element
     *
     * @param \CPSIT\Persons\Domain\Model\Content $contentElementToRemove The content element to be removed
     * @return void
     */
    public function removeContentElement(\CPSIT\Persons\Domain\Model\Content $contentElementToRemove)
    {
        $this->contentElements->detach($contentElementToRemove);
    }

    /**
     * Returns the content elements
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CPSIT\Persons\Domain\Model\ContentElement>
     */
    public function getContentElements()
    {
        return $this->contentElements;
    }

    /**
     * Sets the content elements
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\CPSIT\Persons\Domain\Model\ContentElement> $contentElements
     * @return void
     */
    public function setContentElements(ObjectStorage $contentElements)
    {
        $this->contentElements = $contentElements;
    }
}
