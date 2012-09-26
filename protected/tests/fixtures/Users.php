<?php

/**
 * User records fixtures.
 * 
 * This fixtures stores dummy user records for testing purpose.
 * 
 * @author Petra Barus <petra.barus@gmail.com>
 */
return array(
    array(
        'id' => 1,
        'username' => 'username1',
        'fullName' => 'Full Name 1',
        'email' => 'username1@example.com',
        'password' => sha1('password1'),
        'createdTime' => date('Y-m-d H:i:s'),
    ),
    array(
        'id' => 2,
        'username' => 'username2',
        'fullName' => 'Full Name 2',
        'email' => 'username1@example.com',
        'password' => sha1('password2'),
        'createdTime' => date('Y-m-d H:i:s'),
    ),
    array(
        'id' => 3,
        'username' => 'username3',
        'fullName' => 'Full Name 3',
        'email' => 'username1@example.com',
        'password' => sha1('password3'),
        'createdTime' => date('Y-m-d H:i:s'),
    ),
);