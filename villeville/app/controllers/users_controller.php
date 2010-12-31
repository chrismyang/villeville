<?php
class UsersController extends AppController {

	function register() {
		if (!empty($this->params['form']) && !empty($this->params['form']['submit'])) {
			if ($this->User->save($this->params['form'])) {
				$this->flash('Your registration information was accepted.', '/users/register');
			} else {
				$this->flash('There was a problem with your registration', '/users/register');
			}
		}
	}

	/**
	 * Generate the list of team members that a user has on his team.
	 */
	function show_team() {
	  $uid = $this->get_facebook_id();
	  $this->set("foo", $uid);

	  $found_users = $this->User->find('all', 
					   array('conditions' => array('facebook_id' => $uid)));

	  if (empty($found_users)) {
	    // TODO: this should is an error case that should probably
	    // force you to sign up.
	  }

	  $teams = $found_users[0]['GameTeam'];

	  $this->set("team_members", $teams);
	}

	/**
	 * Get the facebook user id of the currently logged-in
	 * user.
	 */
	function get_facebook_id() {
	  App::import('Vendor', 'facebook');

	  $facebook = new Facebook(array(
					 'appId' => '181767878519813',
					 'secret' => 'bcf0ce1631c1cc67c9d78e88e6e2f548',
					 'cookie' => true,
					 ));

	  $session = $facebook->getSession();
	  if ($session) {
	    try {
	      $uid = $facebook->getUser();
	      $me = $facebook->api('/me');
	    } catch (FacebookApiException $e) {
	      error_log($e);
	    }
	  }
	  return $uid;
	}
}
?>
