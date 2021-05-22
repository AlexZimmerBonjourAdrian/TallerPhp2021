<?php
class Subscripcionmodels extends Model
{
    public function PaySubscription()
    {
        $post= filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $monto = $post['monto'];
        $Usuario =$post['email'];
        if($post['submit'])
        {
            if($monto == null || $monto < 0  || $post['email']== ' ' || $post['email']== null)
            {
                Messages::setMsg('please fil In Al Fields', 'error');
                return;
            }
            /*
            $this->query('SELECT * FROM users WHERE email = :email ');
            $this->bind(':email', $post['email']);
            $row = $this->single();*/
        // }
        /*
        if(!$row)
        {
            Messages::setMsg('No existe el usuario', 'error');

        }
        */
        else{
            echo('Prueba exitosa todo funciona bien');

            echo('Entra el submit');
            /*
            $this->query('INSERT INTO Subscripciones (id, Monto, Useremail) VALUES(:id,:monto,:email)');
            //$this->bind(':id',$post['id']);
            $this->bind(':Monto',$monto);
            $this->bind(':Useremail',$Usuario);
            $this->execute();

            $row= $this->single();
            */
        }
    }
        header('Location' . ROOT_URL.'isSuccerfull');       
            
	}

}


?>
