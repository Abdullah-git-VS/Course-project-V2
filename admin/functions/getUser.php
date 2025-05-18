<?php
function getUserData($con, $user_id) {
    $select_user = mysqli_query($con, "SELECT * FROM `user_info` WHERE id = '$user_id'") or die('query failed');
    if (mysqli_num_rows($select_user) > 0) {
        return mysqli_fetch_assoc($select_user);
    }
    return null;
}
?>
