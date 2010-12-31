<?php
class User extends AppModel {
      var $name = 'User';
      var $hasMany = 'GameTeam';
}

?>