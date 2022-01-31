<div class="col-md-2" >
	<?php
if($_SESSION['role']=='Administrator')
{
?>
	<div class="navigation">
		<a href="home.php"><button>	Home</button></a>
	</div>
	<div class="navigation">
		<a href="admin.php"><button>Admin</button></a>
	</div>
	<div class="navigation">
		<!-- //////////////////////////// -->
		<a href="buyer_cust.php"><button>Buyer-Customer</button></a>
		<!-- ////////////////// -->
	</div>
	<div class="navigation">
		<!-- //////////////////////////// -->
		<a href="seller_cust.php"><button>Seller-Customer</button></a>
		<!-- ////////////////// -->
	</div>
	<div class="navigation">
		<!-- //////////////////////////// -->
		<a href="message.php"><button>Message</button></a>
	</div>	
<?php
}
if($_SESSION['role']=='Administrator')
{
?>
		<!-- ////////////////// -->
	<div class="navigation">
		<a href="buytrans.php"><button>Buy transactions</button></a>
	</div>	
	<div class="navigation">	
		<a href="Delivered.php"><button>Delivered</button></a>
    </div>
<?php
}
else
{
?>	
	<div class="navigation" style="margin-bottom: 10%;margin-top: 3%;">
		<a href="buytrans.php"><button style="height: 90px;">Buy transactions</button></a>
	</div>	
	<div class="navigation">	
		<a href="Delivered.php"><button style="height: 90px;">Delivered</button></a>
    </div>
<?php
}
if($_SESSION['role']=='Administrator')
{
?>    
		<div class="navigation">
		<a href="selltrans.php"><button>Sell transactions</button></a>
		</div>
    
    <div class="navigation">
	
		<a href="inventory.php"><button>Inventory</button></a>
	</div>
   <div class="navigation">	
		<a href="insertcatalog.php"><button>Inventory insert</button></a>
    </div>
<?php
}
?>	
</div>