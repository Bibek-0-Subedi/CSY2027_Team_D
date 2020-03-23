<?php if(($this->session->userdata('student_logged'))) {?>

	<h2> UPLOAD ASSIGNMENT -FORM HERE- </h2>

<?php } 

else {
	echo "not a student should redirect using redirect function";
}?>	