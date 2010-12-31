the value is:
<?php

echo $foo;

?>

<table>
<?php
foreach ($team_members as $team_member) {
	echo $html->tableCells($team_member);
}
?>
</table>