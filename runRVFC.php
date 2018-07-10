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

	function compute_logg($Ms, $Rs) {
		$G = 6.67408e-11;
                $Msun2kg = 1.98855e30;
		$Rsun2m = 6.957e8;
		$logg = log10($G*$Ms*$Msun2kg*1e2/($Rs*$Rs*$Rsun2m*$Rsun2m));
		return $logg;
	}
?>


<!-- Set dumby variables for spectrograph parameters -->
<?php 
	$wlminin = (($_GET['wlmin']>0) ? $_GET['wlmin'] : 0);
	$wlmaxin = (($_GET['wlmax']>0) ? $_GET['wlmax'] : 0);
	$Rin = (($_GET['R']>0) ? $_GET['R'] : 0);
	$aperturein = (($_GET['aperture']>0) ? $_GET['aperture'] : 0);
	$throughputin = (($_GET['throughput']>0) ? $_GET['throughput'] : 0);
	$maxtelluricin = 0;//($_GET['maxtelluric']>0) ? $_GET['maxtelluric'] : 0);
	$floorin = (($_GET['floor']>0) ? $_GET['floor'] : 0);
	$overheadin = (($_GET['overhead']>0) ? $_GET['overhead'] : 0);
	$sigRVphotin = (($_GET['sigRVphot']>0) ? $_GET['sigRVphot'] : 0);
	$sigRVactin = (($_GET['sigRVact']!=NULL) ? floatval($_GET['sigRVact']) : -1);
	$sigRVplanetsin = (($_GET['sigRVplanets']!=NULL) ? floatval($_GET['sigRVplanets']) : -1);
	$sigRVeffin = (($_GET['sigRVeff']>0) ? $_GET['sigRVeff'] : -1);
	$mpin = (($_GET['mp']>0) ? $_GET['mp'] : 0);
	$magin = (($_GET['mag']!=NULL) ? $_GET['mag'] : 0);
	$Msin = (($_GET['Ms']>0) ? $_GET['Ms'] : 0);
	$Rsin = (($_GET['Rs']>0) ? $_GET['Rs'] : 0);
	$Teffin = (($_GET['Teff']>0) ? $_GET['Teff'] : 0);
	$Zin = (($_GET['Z']!=NULL) ? $_GET['Z'] : 0);
	$vsiniin = (($_GET['vsini']>0) ? $_GET['vsini'] : 0);
	$Protin = (($_GET['Prot']>0) ? $_GET['Prot'] : 0);
	$NGPtrialsin = (($_GET['NGPtrials']!=NULL) ? $_GET['NGPtrials'] : 0);

	// Run calculator and save the output to a txt file
        $arguments = $wlminin." ".$wlmaxin." ".$Rin." ".$aperturein." ".$throughputin." ".$floorin." ".$maxtelluricin." ".$overheadin." ".$_GET['texp']." ".$sigRVphotin." ".$sigRVactin." ".$sigRVplanetsin." ".$sigRVeffin." ".$_GET['P']." ".$_GET['rp']." ".$mpin." ".$magin." ".$Msin." ".$Rsin." ".$Teffin." ".$Zin." ".$vsiniin." ".$Protin." ".$_GET['Kdetsig']." ".$NGPtrialsin;
	//echo "/usr/bin/python2.7 php2python.py ".$arguments;
	$output_fname = exec("/usr/bin/python2.7 php2python.py ".$arguments);
	if (($output_fname==NULL)) {
		echo '<br><br><p style="font-size:18px">&nbsp;&nbsp;&nbsp;<b>&#42;&#42; Calculation failure.<br>&nbsp;&nbsp;&nbsp;This can often be due to an issue with interpolation parameters. Please ensure that your input parameters are correct in the previous step.</b></p>&nbsp;&nbsp;&nbsp;';
	} 

	// Read output
	$file = fopen($output_fname, 'r');
	$data = fgetcsv($file, filesize($output_fname));
	$Pout = $data[0];
	$rpout = $data[1];
	$mpout = $data[2];
	$empout = $data[3];
	$magsout_arr = explode("-",$data[4]);
	$magsout = "";
	for ($i=0; $i<sizeof($magsout_arr); $i++) {	
		$suffix = ($i < sizeof($magsout_arr)-1 ? ", " : "");
		$magsout .= number_format($magsout_arr[$i],2,".","").$suffix;
	}
	$band_strsout = $data[5];
	$Msout = $data[6];
	$Rsout = $data[7];
	$Teffout = $data[8];
	$Zout = $data[9];
	$vsiniout = $data[10];
	$Protout = $data[11];
	$Rout = $data[12];
	$apertureout = $data[13];
	$throughputout = $data[14];
	$floorout = $data[15];
	$centralwlout = $data[16];
	$maxtelluricout = $data[17];
	$overheadout = $data[18];
	$texpout = $data[19];
	$sigRV_photout = $data[20];
	$sigRV_actout = $data[21];
	$esigRV_actout = $data[22];
	$sigRV_planetsout = $data[23];
	$esigRV_planetsout = $data[24];
	$sigRV_effout = $data[25];
	$esigRV_effout = $data[26];
	$sigK_targetout = $data[27];
	$esigK_targetout = $data[28];
	$NGPtrialsout = $data[29];
	$nRVout = $data[30];
	$enRVout = $data[31];
	$nRVGPout = $data[32];
	$enRVGPout = $data[33];
	$tobsout = $data[34];
	$etobsout = $data[35];
	$tobsGPout = $data[36];
	$etobsGPout = $data[37];
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
		<td style="padding: 5px 10px;" width="22%">Effective telescope diameter</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($apertureout,2,".",""); ?> m</td>
                <td style="padding: 5px 10px;" width="22%">Throughput</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($throughputout,2,".",""); ?></td>
                <td></td>
                <td></td>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">RV noise floor</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($floorout,1,".",""); ?> m/s</td>
		<td style="padding: 5px 10px;" width="22%">Exposure time</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($texpout,2,".",""); ?> min</td>
		<td></td>
		<td></td>
	</tr>
	<tr>
                <td style="padding: 5px 10px;" width="22%">Overhead</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($overheadout,2,".",""); ?> min</td>
                <td></td>
		<td></td>
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
		<?php if ((floatval($_GET['floor']) > 0) && ($_GET['sigRVeff']==NULL)): ?>
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
		<?php if (($sigRV_photout >= 0) && ($_GET['sigRVeff']==NULL)) : ?>
                	<td style="padding: 5px 10px;" width="11%"><?php echo number_format($sigRV_photout,2,".",""); ?> m/s</td>
		<?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
		<?php endif; ?>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">Planetary mass</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($mpout,2,".","").' &plusmn; '.number_format($empout,2,'.',''); ?> M<sub>&#x02295;</sub></td>
                <td style="padding: 5px 10px;" width="22%">Effective temperature</td>
                <?php if (floatval($_GET['Teff']) > 0) : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo number_format($Teffout,0,"",""); ?> K</td>
		<?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">RV activity rms</td>
		<?php if ((($sigRV_actout >= 0) && ($_GET['sigRVeff']==NULL)) || (($sigRV_actout>=0) && ($_GET['NGPtrials']>0))) : ?>
                	<td style="padding: 5px 10px;" width="11%"><?php echo number_format($sigRV_actout,2,".","").' &plusmn; '.number_format($esigRV_actout,2,'.',''); ?> m/s</td>
		<?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
		<?php endif; ?>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">RV semi-amplitude</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format(RV_K($Pout,$Msout,$mpout),2,'.','').' &plusmn; '.number_format(RV_K($Pout,$Msout,$empout),2,'.',''); ?> m/s</td>
		<td style="padding: 5px 10px;" width="22%">logg</td>
                <?php if ($_GET['Z'] != "") : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo number_format(compute_logg($Msout,$Rsout),2,'.',''); ?> [cgs]</td>
                <?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">RV rms from additional planets</td>
		<?php if (($sigRV_planetsout >= 0) && ($_GET['sigRVeff']==NULL)) : ?>
                	<td style="padding: 5px 10px;" width="11%"><?php echo number_format($sigRV_planetsout,2,'.','').' &plusmn; '.number_format($esigRV_planetsout,2,'.',''); ?> m/s</td>
		<?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
		<?php endif; ?>
        </tr>
        <tr>    
                <td style="padding: 5px 10px;" width="22%">&#937; &#8801; (r<sub>p</sub>/R<sub>&#x02295;</sub>) (P/day)<sup>-1/3</sup></td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format(Omega($Pout,$rpout),2,'.',''); ?></td>
                <td style="padding: 5px 10px;" width="22%">Metallicity</td>
                <?php if (floatval($_GET['Z']) != "") : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo number_format($Zout,2,'.',''); ?> [Fe/H]</td>
                <?php else: ?>
                        <td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td style="padding: 5px 10px;" width="22%"><b>Effective RV rms</b></td>
                <td style="padding: 5px 10px;" width="11%"><?php echo '<b>'.number_format($sigRV_effout,2,'.','').' &plusmn; '.number_format($esigRV_effout,2,'.','').'</b>'; ?> <b>m/s</b></td>
        </tr>
	<tr>
		<td></td>
		<td></td>
                <td style="padding: 5px 10px;" width="22%">vsini</td>
                <?php if (floatval($_GET['vsini']) > 0) : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo number_format($vsiniout,2,'.',''); ?> [km/s]</td>
                <?php else: ?>
                        <td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
		<td></td>
		<td></td>
	</tr>
        <tr>
                <td></td>
                <td></td>
                <td style="padding: 5px 10px;" width="22%">Rotation period</td>
                <?php if ((floatval($_GET['Prot'])>0) || (($_GET['vsini']>0) && ($_GET['Rs']>0))) : ?>
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
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['Kdetsig'],2,'.','').'&#963;'; ?></td>
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
		<td style="padding: 5px 10px;" width="24%"><b>Desired K measurement precision</b></td>
		<td style="padding: 5px 10px;" width="11%"><?php echo '<b>'.number_format($sigK_targetout,2,'.','').' &plusmn; '.number_format($esigK_targetout,2,'.','').'</b>'; ?> <b>m/s</b></td>
		<td></td>
	</tr>
	<tr>
		<td style="padding: 5px 10px;" width="24%"><b>Number of RV measurements (white noise)</b></td>
                <td style="padding: 5px 10px;" width="11%"><?php echo '<b>'.number_format($nRVout,1,'.','').' &plusmn; '.number_format($enRVout,1,'.','').'</b>'; ?></td>
		<td style="padding: 5px 10px;" width="24%"><b>Total observing time (white noise)</b></td>
		<td style="padding: 5px 10px;" width="11%"><?php echo '<b>'.number_format($tobsout,1,'.','').' &plusmn; '.number_format($etobsout,1,'.','').' hrs
		&nbsp;('.number_format($tobsout/7.,1,'.','').' &plusmn; '.number_format($etobsout/7.,1,'.','').' nights)</b>'; ?></td>
	</tr>
	<tr>	
		<td style="padding: 5px 10px;" width="24%"><b>Number of RV measurements (correlated noise)</b></td>
		<?php if ($NGPtrialsout>0) : ?>
		    	<td style="padding: 5px 10px;" width="11%"><?php echo '<b>'.number_format($nRVGPout,1,'.','').' &plusmn; '.number_format($enRVGPout,1,'.','').'</b>'; ?></td>
		<?php else: ?>
		        <td style="padding: 5px 10px;" width="11%"><b>-</b></td>
		<?php endif; ?>
		<td style="padding: 5px 10px;" width="24%"><b>Total observing time (correlated noise)</b></td>
		<?php if ($NGPtrialsout>0) : ?>
			<td style="padding: 5px 10px;" width="11%"><?php echo '<b>'.number_format($tobsGPout,1,'.','').' &plusmn; '.number_format($etobsGPout,1,'.','').' hrs &nbsp;('.number_format($tobsGPout/7.,1,'.','').' &plusmn; '.number_format($etobsGPout/7.,1,'.','').' nights)</b>'; ?></td>
		<?php else: ?>
		        <td style="padding: 5px 10px;" width="11%"><b>-</b></td>
		<?php endif; ?>
	</tr>
</table>
