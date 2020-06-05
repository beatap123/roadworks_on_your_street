<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
     /**
	*@Route("/") 
	*/
	
	public function searching()
	{
                return $this->render('question/show.html.twig',[
                    'question'=> 'question',
                    'answers' => 'answers',
               ]);
	}

    
	/**
	*@Route("/szukaj")
	*/
        
	public function curl_get()
        
        {   $przepis = $_POST['przepis'];
            $url="https://www.kwestiasmaku.com/szukaj?";
            $get = array('search_api_views_fulltext' => $przepis);
            $options = array();
            
            $defaults = array(
                CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get),  //=== oznacza identyczne
                CURLOPT_HEADER => 0,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_TIMEOUT => 4
            );

            $ch = curl_init();
            curl_setopt_array($ch, ($options + $defaults));
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            if( ! $result = curl_exec($ch))
            {
                trigger_error(curl_error($ch));
            }
            curl_close($ch);

            return new Response($result);
            //'answers' => $answers, to sie przyda to umieszczenia $przepis w array
            
        }
	
       
        
}