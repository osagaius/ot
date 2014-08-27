<?php
namespace OT\BackendBundle\Entity;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="OT\BackendBundle\Entity\LearnerRepository")
 * 
 * 
 */
class Learner
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", unique=true, length=32, nullable=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="string", unique=true, length=32, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", unique=true, length=64, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=16, nullable=false)
     */
    private $role;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $account_balance;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $create_time;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $timezone;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $introduction;

    /**
     * @ORM\OneToMany(targetEntity="TransactionRecord", mappedBy="Learner")
     */
    private $TransactionRecords;

    /**
     * @ORM\OneToMany(targetEntity="BookedTime", mappedBy="Learner")
     */
    private $BookedTimes;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->TransactionRecords = new \Doctrine\Common\Collections\ArrayCollection();
        $this->BookedTimes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set username
     *
     * @param string $username
     * @return Learner
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Learner
     */
    public function setPassword($password)
    {
        $this->password = password_hash($password,PASSWORD_BCRYPT);

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Learner
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
     * Set email
     *
     * @param string $email
     * @return Learner
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

    /**
     * Set role
     *
     * @param string $role
     * @return Learner
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set account_balance
     *
     * @param float $accountBalance
     * @return Learner
     */
    public function setAccountBalance($accountBalance)
    {
        $this->account_balance = $accountBalance;

        return $this;
    }

    /**
     * Get account_balance
     *
     * @return float 
     */
    public function getAccountBalance()
    {
        return $this->account_balance;
    }

    /**
     * Set create_time
     *
     * @param \DateTime $createTime
     * @return Learner
     */
    public function setCreateTime($createTime)
    {
        $this->create_time = $createTime;

        return $this;
    }

    /**
     * Get create_time
     *
     * @return \DateTime 
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    /**
     * Set timezone
     *
     * @param string $timezone
     * @return Learner
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * Get timezone
     *
     * @return string 
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * Set introduction
     *
     * @param string $introduction
     * @return Learner
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;

        return $this;
    }

    /**
     * Get introduction
     *
     * @return string 
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }

    /**
     * Add TransactionRecords
     *
     * @param \OT\BackendBundle\Entity\TransactionRecord $transactionRecords
     * @return Learner
     */
    public function addTransactionRecord(\OT\BackendBundle\Entity\TransactionRecord $transactionRecords)
    {
        $this->TransactionRecords[] = $transactionRecords;

        return $this;
    }

    /**
     * Remove TransactionRecords
     *
     * @param \OT\BackendBundle\Entity\TransactionRecord $transactionRecords
     */
    public function removeTransactionRecord(\OT\BackendBundle\Entity\TransactionRecord $transactionRecords)
    {
        $this->TransactionRecords->removeElement($transactionRecords);
    }

    /**
     * Get TransactionRecords
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTransactionRecords()
    {
        return $this->TransactionRecords;
    }

    /**
     * Add BookedTimes
     *
     * @param \OT\BackendBundle\Entity\BookedTime $bookedTimes
     * @return Learner
     */
    public function addBookedTime(\OT\BackendBundle\Entity\BookedTime $bookedTimes)
    {
        $this->BookedTimes[] = $bookedTimes;

        return $this;
    }

    /**
     * Remove BookedTimes
     *
     * @param \OT\BackendBundle\Entity\BookedTime $bookedTimes
     */
    public function removeBookedTime(\OT\BackendBundle\Entity\BookedTime $bookedTimes)
    {
        $this->BookedTimes->removeElement($bookedTimes);
    }

    /**
     * Get BookedTimes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getBookedTimes()
    {
        return $this->BookedTimes;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Learner
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }
}
