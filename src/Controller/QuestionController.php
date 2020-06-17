<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpClient\HttpClient;

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
        
        public function bus_stops()
        {    
        $przystanek = $_POST['przystanek'];
        //APIKey: a054cce1-28f7-4f3d-9b06-7d682f3bd9b6


            $client = HttpClient::createForBaseUri('https://api.um.warszawa.pl/api/action/dbtimetable_get', 
                    [
                    'auth_basic' => ['beatap', 'bex8zcFauQLRmJv']
            ]);
            $response = $client->request('GET', 'https://api.um.warszawa.pl/api/action/dbtimetable_get', [
            // use a different HTTP Basic authentication only for this request
            'auth_basic' => ['beatap', 'bex8zcFauQLRmJv']
             ]);
            $statusCode = $response->getStatusCode();
            // $statusCode = 200
            $contentType = $response->getHeaders()['content-type'][0];
            // $contentType = 'application/json'
            $content = $response->getContent();
            // $content = '{"id":521583, "name":"symfony-docs", ...}
             
           return new Response($content);
        /*
        
	*/
           
            /*return $this->render('question/curl.html.twig',
                    ['result'=>new Response($content)]
              );      */                  
                        
        }
	
       
        
}