<?php

namespace IgniteYourProject\Base\MovieBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MovieRented
 */
class MovieRented
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $movie_id;

    /**
     * @var string
     */
    private $renter_name;

    /**
     * @var string
     */
    private $renter_mobile;

    /**
     * @var \DateTime
     */
    private $rented_at;

    /**
     * @var \DateTime
     */
    private $delivered_at;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \IgniteYourProject\Base\MovieBundle\Entity\Movie
     */
    private $movie;


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
     * Set movie_id
     *
     * @param string $movieId
     * @return MovieRented
     */
    public function setMovieId($movieId)
    {
        $this->movie_id = $movieId;

        return $this;
    }

    /**
     * Get movie_id
     *
     * @return string 
     */
    public function getMovieId()
    {
        return $this->movie_id;
    }

    /**
     * Set renter_name
     *
     * @param string $renterName
     * @return MovieRented
     */
    public function setRenterName($renterName)
    {
        $this->renter_name = $renterName;

        return $this;
    }

    /**
     * Get renter_name
     *
     * @return string 
     */
    public function getRenterName()
    {
        return $this->renter_name;
    }

    /**
     * Set renter_mobile
     *
     * @param string $renterMobile
     * @return MovieRented
     */
    public function setRenterMobile($renterMobile)
    {
        $this->renter_mobile = $renterMobile;

        return $this;
    }

    /**
     * Get renter_mobile
     *
     * @return string 
     */
    public function getRenterMobile()
    {
        return $this->renter_mobile;
    }

    /**
     * Set rented_at
     *
     * @param \DateTime $rentedAt
     * @return MovieRented
     */
    public function setRentedAt($rentedAt)
    {
        $this->rented_at = $rentedAt;

        return $this;
    }

    /**
     * Get rented_at
     *
     * @return \DateTime 
     */
    public function getRentedAt()
    {
        return $this->rented_at;
    }

    /**
     * Set delivered_at
     *
     * @param \DateTime $deliveredAt
     * @return MovieRented
     */
    public function setDeliveredAt($deliveredAt)
    {
        $this->delivered_at = $deliveredAt;

        return $this;
    }

    /**
     * Get delivered_at
     *
     * @return \DateTime 
     */
    public function getDeliveredAt()
    {
        return $this->delivered_at;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return MovieRented
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return MovieRented
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set movie
     *
     * @param \IgniteYourProject\Base\MovieBundle\Entity\Movie $movie
     * @return MovieRented
     */
    public function setMovie(\IgniteYourProject\Base\MovieBundle\Entity\Movie $movie = null)
    {
        $this->movie = $movie;

        return $this;
    }

    /**
     * Get movie
     *
     * @return \IgniteYourProject\Base\MovieBundle\Entity\Movie 
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * @ORM\PrePersist
     */
    public function setRentedAtValue()
    {
        $this->created_at = new \DateTime('now', new \DateTimeZone('UTC'));
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->created_at = new \DateTime('now', new \DateTimeZone('UTC'));
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->updated_at = new \DateTime('now', new \DateTimeZone('UTC'));
    }
}
