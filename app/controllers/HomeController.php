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
   public function __construct()
   {
       $this->templates = new Engine('../app/views');
   }

    public function index($vars)
    {
        $db = new QueryBuilder();
        $posts = $db->getAll('posts');
        echo $this->templates->render('homepage', ['postsInView' => $posts]);


    }

    public function about()

    {
        try {
           $db =  new PDO("mysql:host=testhost2;dbname=components", "root", "SlowHead2023");
            $auth = new \Delight\Auth\Auth($db);

            $userId = $auth->register('jojo26rus@gmail.com', 'tapor', 'Georgy', function ($selector, $token) {
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

    public function withdraw($amount=1)
    {
        $total = 10;

        throw new AccountIsBlockedException("Your account is blocked" . $amount);



        if ($amount>$total){
            // ... Exception
            throw new InsufficientFundsException("Not enough money");
        }
    }

}





























