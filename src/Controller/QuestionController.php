<?php
namespace App\Controller;


use App\Entity\Roboty;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
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
                            'streetName' => filter_input(INPUT_POST, 'ulica') ],
                              'headers' => [
                    'Accept-Language' => 'pl,en-US;q=0.7,en;q=0.',
                    'Accept-Encoding' => 'gzip, deflate, br'

                                 ]
                         
                    
            ]);
            
            $statusCode = $response->getStatusCode();
            $contentType = $response->getHeaders()['content-type'][0];
            $content = $response->toArray();
        
                        
            return new JsonResponse($content['result']['Items']);
            
            //foreach ($catList as $id => $element){
            //echo $id . ' - ' . $element;
             //   }

            /*$entityManager = $this->getDoctrine()->getManager();
            
            $product = new Roboty();
            $product->setName('roboty takie');
            $product->setStreet('Mokotowska');
            $product->setStartDate(new DateTime());
            $product->setEndDate(new DateTime());
            
            $entityManager->persist($product);
            $entityManager->flush();*/

            
            
            /*return $this->render('question/curl.html.twig',
                    [ 'results' => $person,
                    ]);*/
           
        }
            
}