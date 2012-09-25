<?php

/**
 * User model test class.
 * 
 * This class is used for testing User model class.
 * 
 * @author Petra Barus <petra.barus@gmail.com>
 * @package application.tests.unit.models
 */
use application\models\User;

class UserTest extends \CDbTestCase
{
    /**
     * @var array fixtures
     */
    public $fixtures = array(
        'users' => 'application\models\User',
    );

    /**
     * Username regex normal test.
     * 
     * This method will test usernames that comply with the regex.
     */
    public function testUsernameRegexCorrectUsername()
    {
        //Testing username regex rule.
        /* @var $user User */
        $user = new User();
        //False testcases
        $failedUsernameTestcases = array(
            'username',
            'thisismyusername',
        );
        foreach ($failedUsernameTestcases as $testcase)
        {
            $user->clearErrors();
            $this->assertFalse($user->hasErrors('username'));
            $user->username = $testcase;
            $user->validate(); //Invoking rule testing.
            $this->assertFalse($user->hasErrors('username'));
        }
    }

    /**
     * Username regex failed test.
     * 
     * This method will test usernames that aren't complied with the regex.
     */
    public function testUsernameRegexFailedUsername()
    {
        //Testing username regex rule.
        /* @var $user User */
        $user = new User();
        //False testcases
        $failedUsernameTestcases = array(
            'user', //length less than 5
            'username.', //using dot
            '1username', //using number in first character
            'usern$',
        );
        foreach ($failedUsernameTestcases as $testcase)
        {
            $user->clearErrors();
            $this->assertFalse($user->hasErrors('username'));
            $user->username = $testcase;
            $user->validate(); //Invoking rule testing.
            $this->assertTrue($user->hasErrors('username'));
        }
    }
}