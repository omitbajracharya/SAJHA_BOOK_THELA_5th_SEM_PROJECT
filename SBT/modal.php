
   <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        
        <div class="modal-header">
          <h6 class="modal-title" style="color:black;">
          	<b>
          	<?php 
          	
          	$username = $_SESSION['username'];
          	echo $username ;
          	session_destroy();

          	?>
          	Thankyou for your response to our website</b>

          </h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
       
        <div class="modal-body" style="color:black;">
         <h6> Are you sure you want to sign out?</h6>
        </div>
        
        
       
        <div class="modal-footer">
        	
     
   <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="window.location = 'index.php';">
        	          	 

           Confirm

           </button>
    
          
     
        </div>
       

        
      </div>
    </div>
  </div>