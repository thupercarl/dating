<?php

class Member
{
    private $_fname;
    private $_lname;
    private $_age;
    private $_gender;
    private $_phone;
    private $_email;
    private $_state;
    private $_seeking;
    private $bio;

    /**
     * Member constructor
     * @param string $fname first name
     * @param string $lname last name
     * @param string $age age of user
     * @param string $gender gender of user
     * @param string $phone phone num of user
     */
    public function __construct(
        $fname = "",
        $lname = "",
        $age = "",
        $gender = "",
        $phone = "")
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_age = $age;
        $this->_gender = $gender;
        $this->_phone = $phone;
    }

    /**
     * grabs first name
     * @return string
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * sets first name
     * @param string $fname
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * grabs last name
     * @return string
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * sets last name
     * @param string $lname
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * grabs age
     * @return string
     */
    public function getAge()
    {
        return $this->_age;
    }

    /**
     * sets age
     * @param string $age
     */
    public function setAge($age)
    {
        $this->_age = $age;
    }

    /**
     * grabs gender
     * @return string
     */
    public function getGender()
    {
        return $this->_gender;
    }

    /**
     * sets gender
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->_gender = $gender;
    }

    /**
     * grabs phone num
     * @return string
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * sets phone num
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }

    /**
     * grabs email address
     * @return mixed
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * sets email address
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * grabs state
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * sets state
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * grabs gender seeking
     * @return mixed
     */
    public function getSeeking()
    {
        return $this->_seeking;
    }

    /**
     * sets gender seeking
     * @param mixed $seeking
     */
    public function setSeeking($seeking)
    {
        $this->_seeking = $seeking;
    }

    /**
     * grabs bio
     * @return mixed
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * sets bio
     * @param mixed $bio
     */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }


}
