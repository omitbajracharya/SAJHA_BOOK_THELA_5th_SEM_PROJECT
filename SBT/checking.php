<?php
				if($_SESSION['count'] == 1)
				{
					?>


	              Complete US by proceeding ahead--->
				<a href="buyfinal.php">
					<br>
					<button class="btn btn-primary" name="confirm">Proceed</button>
				</a><br><br>
				<form action="<?php echo $epay_url ?>" method="POST">
					<input value="<?php echo $total ?>" name="tAmt" type="hidden">
					<input value="<?php echo $total ?>" name="amt" type="hidden">
					<input value="0" name="txAmt" type="hidden">
					<input value="0" name="psc" type="hidden">
					<input value="0" name="pdc" type="hidden">
					<input value="<?php echo $merchant_code?>" name="scd" type="hidden">
					<input value="<?php echo $pid?>" name="pid" type="hidden">
					<input value="<?php echo $successurl?>" type="hidden" name="su">
					<input value="<?php echo $failedurl?>" type="hidden" name="fu">
					<button class="btn btn-success" name="submit" type="submit">Pay with e-sewa</button>
				</form>
				<?php
			}
				else
				{   
					?>
					<h1>First press the refresh button</h1>
					<?php

				}

				 ?>