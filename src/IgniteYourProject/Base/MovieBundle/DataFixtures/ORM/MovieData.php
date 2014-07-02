<?php
namespace IgniteYourProject\Base\MovieBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use IgniteYourProject\Base\MovieBundle\Entity\Movie as Movie;

class MovieData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $em)
    {
        $movieManager = $em->getRepository('IgniteYourProjectBaseMovieBundle:Movie');

        for ($i = 1; $i < 10; $i++) {
            $movie = new Movie();
            $movie->setName('Rambo ' . $i);
            $movie->setDescription('Full-time asd sdaasd sadasd asdsadas dsasad');
            $movie->setYear(1986);
            $movie->setAvailable($i);
            $em->persist($movie);
        }

        $em->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}