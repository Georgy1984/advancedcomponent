<?php
namespace App\controllers;

use App\exceptions\AccountIsBlockedException;
use App\exceptions\InsufficientFundsException;
use App\QueryBuilder;
use Exception;
use League\Plates\Engine;
use PDO;
use function Tamtamchik\SimpleFlash\flash;

class HomeController
{
   private $templates;
   private $auth;
   private $qb;
   public function __construct(QueryBuilder $qb)
   {
       $this->qb = $qb;
       $this->templates = new Engine('../app/views');
       $db =  new PDO("mysql:host=testhost2;dbname=components", "root", "SlowHead2023");
       $this->auth = new \Delight\Auth\Auth($db);
   }

    public function index()

    {
//        d($this->qb); die();
//        try {
//            $this->auth->admin()->removeRoleForUserById('3', \Delight\Auth\Role::ADMIN);
//        }
//        catch (\Delight\Auth\UnknownIdException $e) {
//            die('Unknown user ID');
//        }


//           $this->auth->login('anna@rambler.ru', 'ruchika');



        try {
            $this->auth->admin()->addRoleForUserById('3', \Delight\Auth\Role::DEVELOPER);
        }
        catch (\Delight\Auth\UnknownIdException $e) {
            die('Unknown user ID');
        }
//          d($this->auth->getRoles()); die;
//          $db = new QueryBuilder();
//          $posts = $db->getAll('posts');
//          echo $this->templates->render('homepage', ['postsInView' => $posts]);


    }

    public function about()

    {
        try {


                $userId = $this->auth->register('anna@rambler.ru ', 'ruchika', 'Anna', function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
                echo '  For emails, consider using the mail(...) function, Symfony Mailer, Swiftmailer, PHPMailer, etc.';
                echo '  For SMS, consider using a third-party service and a compatible SDK';
            });

            echo 'We have signed up a new user with the ID ' . $userId;
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Invalid email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Invalid password');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('User already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }

        echo $this->templates->render('about', ['name' => 'Georgy about page']);
    }

    public function layout($vars)
    {

        echo $this->templates->render('layout', ['name' => 'Georgy']);
    }

    public function email_verification()
    {
        try {
            $this->auth->confirmEmail('1Ztr8kKROT9RkQMJ','x_7Kr83cf6T_4VD9');

            echo 'Email address has been verified';
        }
        catch (\Delight\Auth\InvalidSelectorTokenPairException $e) {
            die('Invalid token');
        }
        catch (\Delight\Auth\TokenExpiredException $e) {
            die('Token expired');
        }
        catch (\Delight\Auth\UserAlreadyExistsException $e) {
            die('Email address already exists');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }

    }

    public function login()
    {
        try {
            $this->auth->login('anna@rambler.ru', 'ruchika');

            echo 'User is logged in';
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            die('Wrong email address');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            die('Wrong password');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            die('Email not verified');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            die('Too many requests');
        }

    }

}
