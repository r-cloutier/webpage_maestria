<?php 
	function RV_K($P, $Ms, $mp) {
		$G = 6.67408e-11;
		$pi = 3.141592653589;
		$MSun2kg = 1.98855e30;
		$MEarth2kg = 5.972e24;
		$days2sec = 86400.;
		$K = pow(2*$pi*$G/($Ms*$Ms*$MSun2kg*$MSun2kg*$P*$days2sec),1./3) * $MEarth2kg*$mp;
		return $K;
	}

	function Omega($P, $rp) {
		return $rp / pow($P, 1./3);
	}
?>

<!-- Set dumby variables for spectrograph parameters -->
<?php 
	$wlminin = (($_GET['wlmin']>0) ? $_GET['wlmin'] : 0);
	$wlmaxin = (($_GET['wlmax']>0) ? $_GET['wlmax'] : 0);
	$Rin = (($_GET['R']>0) ? $_GET['R'] : 0);
	$aperturein = (($_GET['aperture']>0) ? $_GET['aperture'] : 0);
	$throughputin = (($_GET['throughput']>0) ? $_GET['throughput'] : 0);
	$maxtelluricin = (($_GET['maxtelluric']>0) ? $_GET['maxtelluric'] : 0);
	$floorin = (($_GET['floor']>0) ? $_GET['floor'] : 0);
	$overheadin = (($_GET['overhead']>0) ? $_GET['overhead'] : 0);
	$sigRVphotin = (($_GET['sigRVphot']>0) ? $_GET['sigRVphot'] : 0);
	$sigRVactin = (($_GET['sigRVact']!=NULL) ? floatval($_GET['sigRVact']) : -1);
	$sigRVplanetsin = (($_GET['sigRVplanets']!=NULL) ? floatval($_GET['sigRVplanets']) : -1);
	$sigRVeffin = (($_GET['sigRVeff']>0) ? $_GET['sigRVeff'] : -1);
	$mpin = (($_GET['mp']>0) ? $_GET['mp'] : 0);
	$magin = (($_GET['mag']>0) ? $_GET['mag'] : 0);
	$Msin = (($_GET['Ms']>0) ? $_GET['Ms'] : 0);
	$Rsin = (($_GET['Rs']>0) ? $_GET['Rs'] : 0);
	$Teffin = (($_GET['Teff']>0) ? $_GET['Teff'] : 0);
	$Zin = (($_GET['Z']>0) ? $_GET['Z'] : 0);
	$vsiniin = (($_GET['vsini']>0) ? $_GET['vsini'] : 0);
	$Protin = (($_GET['Prot']>0) ? $_GET['Prot'] : 0);

	// Run calculator and save the output to a txt file
        $arguments = $wlminin." ".$wlmaxin." ".$Rin." ".$aperturein." ".$throughputin." ".$floorin." ".$maxtelluricin." ".$overheadin."	".$_GET['texp']." ".$sigRVphotin." ".$sigRVactin." ".$sigRVplanetsin." ".$sigRVeffin." ".$_GET['P']." ".$_GET['rp']." ".$mpin." ".$magin." ".$Msin." ".$Rsin." ".$Teffin." ".$Zin." ".$vsiniin." ".$Protin." ".$_GET['Kdetsig']." ".$_GET['NGPtrials'];
	echo "/usr/bin/python2.7 php2python.py ".$arguments;
	$output_fname = exec("/usr/bin/python2.7 php2python.py ".$arguments);

	// Read output
	$file = fopen($output_fname, 'r');
	$data = fgetcsv($file, filesize($output_fname));
	$Pout = $data[0];
	$rpout = $data[1];
	$mpout = $data[2];
	$magsout_arr = explode("-",$data[3]);
	$magsout = "";
	for ($i=0; $i<sizeof($magsout_arr); $i++) {	
		$suffix = ($i < sizeof($magsout_arr)-1 ? ", " : "");
		$magsout .= number_format($magsout_arr[$i],2,".","").$suffix;
	}
	$band_strsout = $data[4];
	$Msout = $data[5];
	$Rsout = $data[6];
	$Teffout = $data[7];
	$Zout = $data[8];
	$vsiniout = $data[9];
	$Protout = $data[10];
	$Rout = $data[11];
	$apertureout = $data[12];
	$throughputout = $data[13];
	$floorout = $data[14];
	$centralwlout = $data[15];
	$maxtelluricout = $data[16];
	$overheadout = $data[17];
	$texpout = $data[18];
	$sigRV_photout = $data[19];
	$sigRV_actout = $data[20];
	$sigRV_planetsout = $data[21];
	$sigRV_effout = $data[22];
	$sigK_targetout = $data[23];
	$NGPtrials = $data[24];
	$nRVout = $data[25];
	$nRVGPout = $data[26];
	$tobsout = $data[27];
	$tobsGPout = $data[28];
?>


<p style="font-size:30px">&nbsp;&nbsp;&nbsp;<b>RVFC input parameters:</b></p>&nbsp;&nbsp;&nbsp;


<!-- Print parameters to outut screen -->
<?php if (isset($_GET['R']) && floatval($_GET['R'])>0) : ?>
<table>
	<tr>
		<td style="padding: 5px 10px; font-size:20px" width="22%"><b>Spectrograph parameters:</b></td>
		<td></td>
		<td></td>
                <td></td>
                <td></td>
                <td></td>
	</tr>
	<tr>
		<td style="padding: 5px 10px;" width="22%">Spectral coverage</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo
		number_format($wlminin,0,"","")."-".number_format($wlmaxin,0,"",""); ?> nm</td>
		<td style="padding: 5px 10px;" width="22%">Spectral resolution</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($Rout,0,"",""); ?></td>
                <td></td>
                <td></td>
	</tr>
        <tr>
		<td style="padding: 5px 10px;" width="22%">Telescope aperture</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($apertureout,2,".",""); ?> m</td>
                <td style="padding: 5px 10px;" width="22%">Throughput</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($throughputout,2,".",""); ?></td>
                <td></td>
                <td></td>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">Telluric absorption upper limit</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($maxtelluricout,2,".",""); ?></td>
                <td style="padding: 5px 10px;" width="22%">RV noise floor</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($floorout,1,".",""); ?> m/s</td>
                <td></td>
                <td></td>
        </tr>
        <tr>
		<td style="padding: 5px 10px;" width="22%">Exposure time</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($texpout,2,".",""); ?> minn</td>
                <td style="padding: 5px 10px;" width="22%">Overhead</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($overheadout,2,".",""); ?> min</td>
                <td></td>
                <td></td>
        </tr>
</table>
<br>
<?php endif; ?>


<table>
	<tr>
		<td style="padding: 5px 10px; font-size:20px" width="22%"><b>Planet parameters:</b></td>
		<td></td>
                <td style="padding: 5px 10px; font-size:20px" width="22%"><b>Stellar parameters:</b></td>
		<td></td>
                <td style="padding: 5px 10px; font-size:20px" width="22%"><b>RV noise sources:</b></td>
                <td></td>
	</tr>
	<?php if (isset($_GET['R']) && floatval($_GET['R'])>0) : ?>
		<tr>
		<td></td>
		<td></td>
		<?php
			if (($_GET['wlmin'] <= 555) && ($_GET['wlmax'] >= 555)) {
				$mag_str = 'V';
			} elseif (($_GET['wlmin'] <= 1250) && ($_GET['wlmax'] >= 1250)) {
				$mag_str = 'J';
			}
		?>
		<td style="padding: 5px 10px;" width="22%"><?php echo $band_strsout; ?></td>
		<td style="padding: 5px 10px;" width="11%"><?php echo $magsout; ?></td>
		<td></td>
		<td></td>
		</tr>
	<?php endif; ?>
	<tr>
		<td style="padding: 5px 10px;" width="22%">Orbital Period</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo $_GET['P']; ?> days</td>
		<td style="padding: 5px 10px;" width="22%">Stellar mass</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($Msout,2,".",""); ?> M<sub>&#x02299;</sub></td>
		<td style="padding: 5px 10px;" width="22%">RV noise floor</td>
		<?php if (floatval($_GET['floor']) > 0) : ?>
			<td style="padding: 5px 10px;" width="11%"><?php echo number_format($floorout,2,".",""); ?> m/s</td>
		<?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
		<?php endif; ?>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">Planetary radius</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($rpout,2,".",""); ?> R<sub>&#x02295;</sub></td>
        	<td style="padding: 5px 10px;" width="22%">Stellar radius</td>
		<?php if (floatval($_GET['Rs']) > 0) : ?>
                	<td style="padding: 5px 10px;" width="11%"><?php echo number_format($Rsout,2,".",""); ?> R<sub>&#x02299;</sub></td>
		<?php else: ?>
                        <td style="padding: 5px 10px;" width="11%">-</td>
		<?php endif; ?>
		<td style="padding: 5px 10px;" width="22%">Photon-noise RV precision</td>
		<?php if ($sigRV_photout > 0) : ?>
                	<td style="padding: 5px 10px;" width="11%"><?php echo number_format($sigRV_photout,2,".",""); ?> m/s</td>
		<?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
		<?php endif; ?>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">Planetary mass</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($mpout,2,".",""); ?> M<sub>&#x02295;</sub></td>
                <td style="padding: 5px 10px;" width="22%">Effective temperature</td>
                <?php if (floatval($_GET['Teff']) > 0) : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo number_format($Teffout,0,"",""); ?> K</td>
		<?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">RV activity rms</td>
		<?php if (($_GET['sigRVact'] > 0) && ($sigRV_actout >= 0)) : ?>
                	<td style="padding: 5px 10px;" width="11%"><?php echo number_format($sigRV_actout,2,".",""); ?> m/s</td>
		<?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
		<?php endif; ?>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">RV semi-amplitude</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format(RV_K($Pout,$Msout,$mpout),2,'.',''); ?> m/s</td>
		<td style="padding: 5px 10px;" width="22%">Metallicity</td>
                <?php if ($_GET['Z'] != "") : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo number_format($Zout,2,'.',''); ?> [Fe/H]</td>
                <?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">RV rms from additional planets</td>
		<?php if (($_GET['sigRVplanets'] > 0) && ($sigRV_planetsout >= 0)) : ?>
                	<td style="padding: 5px 10px;" width="11%"><?php echo number_format($sigRV_planetsout,2,'.',''); ?> m/s</td>
		<?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
		<?php endif; ?>
        </tr>
        <tr>    
                <td style="padding: 5px 10px;" width="22%">&#x3A9;&emsp;[R<sub>&#x02295;</sub>/days<sup>1/3</sup>]</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format(Omega($Pout,$rpout),2,'.',''); ?></td>
                <td style="padding: 5px 10px;" width="22%">Projected rotation velocity</td>
                <?php if (floatval($_GET['vsini']) > 0) : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo number_format($vsiniout,2,'.',''); ?> km/s</td>
                <?php else: ?>
                        <td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">Effective RV rms</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($sigRV_effout,2,'.',''); ?> m/s</td>
        </tr>
        <tr>
                <td></td>
                <td></td>
                <td style="padding: 5px 10px;" width="22%">Rotation period</td>
                <?php if (floatval($_GET['Prot']) > 0) : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo number_format($Protout,2,'.',''); ?> days</td>
                <?php else: ?>
                        <td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td></td>
                <td></td>
        </tr>
</table>

<table>
        <tr>
                <td style="padding: 5px 10px; font-size:20px" width="24%"><b>Simulation parameters:</b></td>
		<td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
	</tr>
	<tr>
		<td style="padding: 5px 10px;" width="24%">Exposure time</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($texpout,2,'.',''); ?> min</td>
		<td style="padding: 5px 10px;" width="24%">Overhead</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($overheadout,2,'.',''); ?> min</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td style="padding: 5px 10px;" width="24%">Desired K detection significance</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['Kdetsig'],2,'.',''); ?></td>
                <td style="padding: 5px 10px;" width="24%">Number of GP trials</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($NGPtrialsout,0,'',''); ?></td>
                <td></td>
                <td></td>
	</tr>
</table>


<br>
<p style="font-size:30px">&nbsp;&nbsp;&nbsp;<b>RVFC Results:</b></p>&nbsp;&nbsp;&nbsp;
<table>
	<tr>
		<td style="padding: 5px 10px;" width="24%">K measurement precision</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($sigK_targetout,2,'.',''); ?> m/s</td>
		<td></td>
	</tr>
	<tr>
		<td style="padding: 5px 10px;" width="24%">Number of RV measurements (white noise)</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($nRVout,1,'.',''); ?></td>
		<td style="padding: 5px 10px;" width="24%">Total observing time (white noise)</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($tobsout,1,'.',''); ?> hrs</td>
	</tr>
	<tr>	
		<td style="padding: 5px 10px;" width="24%">Number of RV measurements (correlated noise)</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($nRVGPout,1,'.',''); ?></td>
		<td style="padding: 5px 10px;" width="24%">Total observing time (correlated noise)</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($tobsGPout,1,'.',''); ?> hrs</td>
	</tr>
</table>
