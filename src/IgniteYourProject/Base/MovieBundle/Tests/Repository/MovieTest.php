<?php

namespace IgniteYourProject\Base\MovieBundle\Tests\Repository;

use IgniteYourProject\Base\MovieBundle\Tests\ModelTestCase;

/**
 * MovieTest
 */
class MovieTest extends ModelTestCase
{

    public function testFindAllAvailable()
    {
        $movies = $this->em
            ->getRepository('IgniteYourProjectBaseMovieBundle:Movie')
            ->findAllAvailable();

        $this->assertCount(9, $movies);

        return $this;
    }
}
