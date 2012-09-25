<?php

/**
 * User management functional testing..
 * 
 * @author Petra Barus <petra.barus@gmail.com>
 * @package application.tests.functional.administration
 */
class UsersTest extends WebTestCase
{

    /**
     * User management list test.
     */
    public function testIndex()
    {
        $this->open('/administration/users');
    }
}