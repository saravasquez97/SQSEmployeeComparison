<?php
include("compare_model.php");
?>
<?php

function showName($user)
{
	$result = getName($user);
	echo $result['first_name'] . " " .$result['last_name'];
}

function showPhoto($user, $show_photo)
{
	if ($show_photo)
	{
		$result = getPhoto($user);
		$photo = $result['photo'];
		echo "<img src='$photo' alt='No Photo' height='150rem'>";
	}
}

function showBasic($user, $show_basic)
{
	if ($show_basic)
	{
		$result = getBasic($user);
     echo "<strong>Email:</strong> " .$result['email'] ."<br>";
     echo "<strong>Gender:</strong> " .$result['gender'] ."<br>" ;
     echo "<strong>Location:</strong> " .$result['city'] .", " .$result['state'];
	}
}

function showSoft($user, $show_soft, $searched_sskill, $max_skills_list = 100)
{
	$MAX_SKILLS_LIST = $max_skills_list;

	if ($show_soft)
	{
		if ($max_skills_list < 100) { echo "<strong>Top </strong>"; }
		echo "<strong>Software Skills:</strong><br>";

		if (!is_null($searched_sskill)) {
			echo "$searched_sskill <br>";
			$MAX_SKILLS_LIST = $MAX_SKILLS_LIST - 1;
		}

		$result = getSoft($user);
		if ($result) {
    		for ($i = 0; $i < sizeof($result) && $i < $MAX_SKILLS_LIST; $i++) #REMOVED <=
        {
					$skill = $result[$i][0];
					if ($skill != $searched_sskill) {
          	echo $skill ."<br>";
					}
        }
        if (sizeof($result) >= $MAX_SKILLS_LIST) { echo "...";}
    }
	}
}

function showHard($user, $show_hard, $searched_hskill, $max_skills_list = 100)
{
	$MAX_SKILLS_LIST = $max_skills_list;

	if ($show_hard)
	{
		if ($max_skills_list < 100) { echo "<strong>Top </strong>"; }
		echo "<strong>Hardware Skills:</strong><br>";

		if (!is_null($searched_hskill)) {
			echo "$searched_hskill <br>";
			$MAX_SKILLS_LIST = $MAX_SKILLS_LIST - 1;
		}

		$result = getHard($user);
		if ($result)
		{
			for ($i = 0; $i < sizeof($result) && $i < $MAX_SKILLS_LIST; $i++) #REMOVED <=
			{
				$skill = $result[$i][0];
				if ($skill != $searched_hskill) {
					echo $skill ."<br>";
				}
			}
			if (sizeof($result) >= $MAX_SKILLS_LIST) { echo "...";}
    }

	}
}

function isSoftSkill($searched_skill) {
	$result = in_software_skills($searched_skill);
	return $result;
}

function showUserInfo($user) {
	$result = getUserInfo($user);
	echo "<h4>".$result['first_name'] . " " .$result['last_name']."</h4>";
	echo "<div class='profile-modal'>";
		echo $result['email']."<br>";
		echo $result['address'].", ".$result['city'].", ".$result['state']." ".$result['zip'];
	echo "</div>";
	echo "<div class='profile-modal'>";
		echo "<div class='row'>";
			echo "<div class='col-sm-2'>";
				echo "<p><strong>Role: </strong></p>";
				echo "<p><strong>Gender: </strong></p>";
				echo "<p><strong>Birthday: </strong></p>";
			echo "</div>";
			echo "<div class='col-sm-10'>";
				echo "<p>".$result['role']."</p>";
				echo "<p>".$result['gender']."</p>";
				echo "<p>".$result['dateofbirth']."</p>";
			echo "</div>";
		echo "</div>";
	echo "</div>";
}

?>
