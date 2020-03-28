<?php if(($this->session->userdata('type')) == 3) {?>

<h2> view uploaded assignment </h2>


        <?php
            echo ($assignments);

        ?>
      

<?php } 

else {
	echo "not a tutor should redirect using redirect function";
}?>	

