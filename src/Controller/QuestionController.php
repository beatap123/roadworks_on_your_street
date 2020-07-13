<?php
namespace App\Controller;


use App\Entity\Roboty;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

use Doctrine\DBAL\Driver\Connection;
use DateTime;

class QuestionController extends AbstractController
{
     /**
	*@Route("/") 
	*/
	
	public function searching()
	{
                return $this->render('question/show.html.twig');
	}

    
	/**
	*@Route("/szukaj")
	*/
        
        public function searching_street(Connection $connection)
        {
            
            $client = HttpClient::create();
             
            
            $response = $client->request('GET','https://api.um.warszawa.pl/api/action/get_open_invests?resource_id=26b9ade1-f5d4-439e-84b4-9af37ab7ebf1&apikey=a054cce1-28f7-4f3d-9b06-7d682f3bd9b6&pageSize=7&StartIndex=1', 
                        
                    [        'auth_basic' => ['beatap', 'H7REvQ3pXiM3Xnc'],
                        'query' => [
                            'streetName' => $_POST['ulica'],
                              'headers' => [
                    'Accept' => 'application/json',

                                 ]
                        ]   
                    
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->getContent();
             
             

            
            
            $entityManager = $this->getDoctrine()->getManager();
            
            $product = new Roboty();
            $product->setName('roboty takie');
            $product->setStreet('Mokotowska');
            $product->setStartDate(new DateTime());
            $product->setEndDate(new DateTime());
            
            $entityManager->persist($product);
            $entityManager->flush();

            //return new Response($content);
            return $this->render('question/curl.html.twig',
                    [ 'results' => $content,
                    ]);
           
        }
            public function setCharset(string $charset): object
            {
                $this->charset = $charset;
                $charset = $this->charset ?: 'UTF-8';

                return $this;
            }
}