<?php

namespace AppBundle\Entity;

/**
 * Vacancy
 */
class Vacancy
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $salary;

    /**
     * @var bool
     */
    private $isRemote;

    /**
     * @var string
     */
    private $category;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Vacancy
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Vacancy
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set salary
     *
     * @param integer $salary
     *
     * @return Vacancy
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get salary
     *
     * @return int
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set isRemote
     *
     * @param boolean $isRemote
     *
     * @return Vacancy
     */
    public function setIsRemote($isRemote)
    {
        $this->isRemote = $isRemote;

        return $this;
    }

    /**
     * Get isRemote
     *
     * @return bool
     */
    public function getIsRemote()
    {
        return $this->isRemote;
    }

    /**
     * Set category
     *
     * @param string $category
     *
     * @return Vacancy
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }
}

