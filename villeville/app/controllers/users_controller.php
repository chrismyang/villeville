<?php
class UsersController extends AppController {
 
  function register() {
  }
 
      function register_new() {
	
	// $this->flash(var_dump($this->params));

	if (!empty($this->params['form']) && !empty($this->params['form']['submit'])) {
	     if ($this->User->save($this->params['form'])) {
	             $this->flash('Your registration information was accepted.', '/users/register');
             } else {
	             $this->flash('There was a problem with your registration', '/users/register');
	     }
	 }
      }
}
?>
