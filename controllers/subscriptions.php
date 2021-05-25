<?php
class Subscriptions extends Controller{
    /*protected function index(){
		$viewmodel = new SubscriptionModel();
		$this->returnView($viewmodel->index(), true);
	}*/
/* protected function index(){
		$viewmodel = new SubscriptionModel();
		$this->returnView($viewmodel->Subscription(),true);
	}
    */
    protected function Subscription()
    {
      
        /*
        $viewModel = new SubscriptionModel();
        $this->returnView($viewModel->Subscription(),true);
    */
    }

     protected function UserSubscription()
     {
         /*
        if(!isset($_SESSION['is_logged_in'])){
			header('Location: '.ROOT_URL.'Subscriptions');
		}
        */
        $viewModel = new SubscriptionModel();
        $this->returnView($viewModel->UserSubscription(),true);
    }

 }


