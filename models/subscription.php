<?php


class SubscriptionModel extends Model{
/*
    public function index(){
		$this->query('SELECT * FROM Subscriptcion ORDER BY tipo DESC');
		$rows = $this->resultSet();
		return $rows;
	}
    */
/*
    public function index(){
		$this->query('SELECT * FROM Sbb ORDER BY tipo DESC');
		$rows = $this->resultSet();
		return $rows;
	}
    */
    /*
    public function Subscription(){
        // Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if(isset($post['number_format'])){
			$password =$post['number_format'];	
		}
    }   
    */
    /*
    public function index(){
		return;
	}
    */
    /*
    public function Subscription()  
    {
        
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if(isset($post['boolval']))
        {
            $isSubscription = md5($post['boolval']);
        }
        
    }
*/

public function UserSubscription()
{
    $post = filter_input_array(INPUT_POST, FILTER_VALIDATE_BOOL);
    
    if(isset($post['boolval'])){
        $isSubscription = md5($post['boolval']);
    }


    if(isset($post['Submit']))
    {
        if($post['boolval'] == null )
        {
            Messages::setMSG('Please Fill in All Fields', 'error');
            return;
        }
        
      //  this




    }

}



/*
    public function Desuscription()
    {

    }
*/
    
}



