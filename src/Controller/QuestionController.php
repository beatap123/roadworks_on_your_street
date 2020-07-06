<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;
use Doctrine\DBAL\Driver\Connection;

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
           $ulica = $_POST['ulica']; 
           $adresy = $connection->fetchAll(
		sprintf("SELECT nazwa_peln FROM adresywaw WHERE nazwa_peln='ulica %s'",
		$ulica));


            
            $client = HttpClient::create();
             
            
            $response = $client->request('GET','https://api.um.warszawa.pl/api/action/get_open_invests?resource_id=26b9ade1-f5d4-439e-84b4-9af37ab7ebf1&apikey=a054cce1-28f7-4f3d-9b06-7d682f3bd9b6&pageSize=7&StartIndex=1', 
                        
                    [        'auth_basic' => ['beatap', 'H7REvQ3pXiM3Xnc'],
                        'query' => [
                            'streetName' => $ulica
                        ]   
                    
            ]);
            
            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}
             
           return new Response($content);
        }
}