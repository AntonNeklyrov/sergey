<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Question;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {

        for ($i = 0; $i < 9; $i++) {

            $user = new User();
            $user->setName("User" . ($i + 1));
            $user->setPassword(password_hash("password" . ($i + 1), PASSWORD_DEFAULT));
            if ($i % 4 == 0) {
                $user->setRoles(["ROLE_ADMIN"]);
            } else {
                $user->setRoles(["ROLE_USER"]);
            }
            $user->setApiToken("apiToken".($i+1));
            $user->setEmail("Email" . $i);
            $manager->persist($user);
            for ($j = 0; $j < 2; $j++) {
                $category = new Category();
                $category->setTitle("Category " . $i);
                $manager->persist($category);
                for ($k = 0; $k < 4; $k++) {
                    $question = new Question();
                    $question->setTitle("Title" . $i . $k);
                    $question->setCategory($category);
                    $question->setUser($user);
                    $question->setCreatedAt(new \DateTime("2022-0" . ($i + 1) . "-0" . ($k + 1) . "T15:03:01.012345Z"));
                    $question->setContent("Content" . $i . $k);
                    $manager->persist($question);
                }



            }
        }
        $manager->flush();
    }

}