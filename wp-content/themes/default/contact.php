<?php
/*
Template Name: Antipode Contact
*/
?>


<?php get_header(); ?>

    <div class='post page arch'>

        <?
          $response = "";

          if (isset($_POST[send]))
          	{
        		if (!$_POST['yourname'] ||
        		!$_POST['youremail'] ||
        		!$_POST['remarks'])
        	   {
        	   $response .= "Please enter all information before sending email.";
        	   }
        	else if( !eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+))*$", $_POST['youremail'], $regs) ) 
        		{
        		$response .= "Error: '$_POST[youremail]' isn't a valid mail address.\n"; 
        		}
        	else if(gethostbyname($regs[2]) == $regs[2] ) 
        		{
        		$response .= "Error: '$regs[2]' does not exist.\n"; 
        		}   
        	 else
        	   {
        	   $email_target = "allen@alteringtime.com";
        	   $_POST[remarks] = stripslashes($_POST[remarks]);
        		if (!mail($email_target, "Altering Time Visitor Inquiry",
        		          "Feedback through Altering Time:\r\n$_POST[remarks]",
        					 "From: ".nl2br("$_POST[yourname] <$_POST[youremail]>")."\r\n"
        					."Reply-To: ".nl2br($_POST[youremail])."\r\n"
        					."X-Mailer: Alteringtime")
        					)
        		   $response .= "Sorry, there was an error sending your email.";
        		else
        			{
        		   $response .= "Thanks for your email! I'll respond shortly.";
        		   unset($_POST);
        		   }
        	   }
        	}
        ?>


        <h1>Contact Me</h1>

        <p>Feedback? Concerns? Suggestions? You can contact me with this form.</p>

        <?php if ($response) print "<p><b>$response</b></p>"; ?>
        
          <form method="post">

                <div align="right">Your Name</div>

                <input type="text" name="yourname" size="20" value="<? print $_POST[yourname]; ?>">

                <div align="right">Your Email</div>

                <input type="text" name="youremail" size="20" value="<? print $_POST[youremail]; ?>">

                <div align="right">Your comment</div>

                <textarea name="remarks" cols="50" rows="10"><? print $_POST[remarks]; ?></textarea>

                <input type="submit" name="send" value="Send!">

          </form>


<?php get_footer(); ?>
