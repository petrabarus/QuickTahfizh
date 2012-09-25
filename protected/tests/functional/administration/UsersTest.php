<?php

/**
 * User management functional testing..
 * 
 * @author Petra Barus <petra.barus@gmail.com>
 * @package application.tests.functional.administration
 */
use application\models\User;

class UsersTest extends WebTestCase
{

    /**
     * User management list test.
     */
    public function testIndex()
    {
        $this->open('/administration/users');

        $users = User::model()->findAll();
        foreach ($users as $user)
        {
            /* @var $user application\models\User */
            $this->assertTextPresent($user->id);
            $this->assertTextPresent($user->username);
            $this->assertTextPresent($user->fullName);
        }
    }
}