<?php

namespace App\Tests;

use App\Entity\Post;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @property $factory
 */
class UserTypeTest extends WebTestCase
{
    public function testSubmitValidData(): void
    {
        $formData = [
            'name' => 'testName',
            'email' => 'testEmail',
            'password' => 'testPassword',
        ];

        $model = new User();

        $form = $this->factory->create(User::class, $model);
        $form->submit($formData);
        $this->assertTrue($form->isSynchronized());
        $expected = new User();

        $expected->setName('testName');
        $expected->setEmail('testEmail');
        $expected->setPassword('testPassword');


        $this->assertEquals($expected, $model);

    }
}
