<?php
// login.php
// Get the user + profile via a JOIN
$user = get_user_and_profile($username, $password);

// profile.php
if (!$_SESSION['user']) {
	// TODO: Show login form
	return;
}

// Has the user submitted the form?
if ($_POST['submit']) {
	$user_id = $_SESSION['user']['id'];

	// Does the user id submitted match the logged in user id?
	if ($user == $_POST['user']['id']) {
		update_profile($_POST['profile']);
	}
}

?>

<!-- profile_form.php -->
<input type="hidden" name="user['id']" value="<?php echo $user['id'] ?>">
<input type="text" name="profile['first_name']" value="<?php echo $user['first_name'] ?? '' ?>">
<input type="text" name="profile['last_name']" value="<?php echo $user['last_name'] ?? '' ?>">

