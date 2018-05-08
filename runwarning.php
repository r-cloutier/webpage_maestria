<br><br>
<?php if ((isset($_GET['R'])) && ($_GET['NGPtrials']==0)) : ?>
	<?php //ob_start(); ?>
	<div align="center" style="padding-left:160px;padding-right:160px">
		<h5>*RVFC may take a few minutes to calculate the photon-noise limited RV precision.</h5>
		<h5>Please be patient.</h5>
	</div>
	<?php //include "runRVFC.php"; ?>
<?php endif; ?>


<?php if (($_GET['R']==NULL) && ($_GET['NGPtrials']!=NULL) && ($_GET['NGPtrials']>0)) : ?>
	<div align="center" style="padding-left:160px;padding-right:160px">
	       	<h5>*RVFC may take a few minutes to run <?php echo $_GET['NGPtrials']; ?> GP <?php echo ($_GET['NGPtrials']>1) ? 'trials.' : 'trial.'
		?></h5>
		<h5>Please be patient.</h5>
        </div>
	<?php 
		$pass_warning = True;
	?>
	<br>&emsp;<input type=submit value="Run RVFC" name="runrvfc2d1"/>
<?php endif; ?>


<?php if (($_GET['R']==NULL) && ($_GET['NGPtrials']==0)) : ?>
	<?php 
		echo $_GET['P'].' warn';
	?>
	<!--<body onload="AutoSubmit()">
	<script type="text/javascript">
		function AutoSubmit() {
			document.getElementById('runrvfcfinal').click();
		}
	</script>-->
<?php endif; ?>
