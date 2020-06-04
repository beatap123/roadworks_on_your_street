<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController
{
	/**
	*@Route("/")
	*/
   
	public function curl_get($url="https://www.kwestiasmaku.com/szukaj?", array $get = array('search_api_views_fulltext' => 'beza'), array $options = array())
        
        {  
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
            
        }
	
}


        /**
	*@Route("/questions/{slug}") 
	*/
	
	//public function show($slug)
	//{
		//return new Response(sprintf(
		//'Future page to show a question "%s"!',
		//ucwords(str_replace('-',' ',$slug))
		//));
	//}