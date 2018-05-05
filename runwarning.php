<br><br>
<?php if ((isset($_GET['R'])) && ($_GET['NGPtrials']==0)) : ?>
	<div align="center" style="padding-left:160px;padding-right:160px">
		<h5>*RVFC may take a few minutes to calculate the photon-noise limited RV precision.</h5>
		<h5>Please be patient.</h5>
	</div>
	<?php include "runRVFC.php"; ?>
<?php endif; ?>


<?php if (($_GET['R']==NULL) && ($_GET['NGPtrials']!=NULL) && ($_GET['NGPtrials']>0)) : ?>
	<div align="center" style="padding-left:160px;padding-right:160px">
	       	<h5>*RVFC may take a few minutes to run <?php echo $_GET['NGPtrials']; ?> GP <?php echo ($_GET['NGPtrials']>1) ? 'trials.' : 'trial.'
		?></h5>
		<h5>Please be patient.</h5>
        </div>
	<?php include "runRVFC.php"; ?>
<?php endif; ?>


<?php if (($_GET['R']==NULL) && ($_GET['NGPtrials']==0)) : ?>
	<?php include "runRVFC.php"; ?>
<?php endif; ?>
