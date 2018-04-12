<p style="font-size:30px">&nbsp;&nbsp;&nbsp;<b>RVFC input parameters:</b></p>&nbsp;&nbsp;&nbsp;

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

<!-- Save parameters to a file to be read by the calculator -->


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
		number_format($_GET['wlmin'],0,"","")."-".number_format($_GET['wlmax'],0,"",""); ?> nm</td>
		<td style="padding: 5px 10px;" width="22%">Spectral resolution</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['R'],0,"",""); ?></td>
                <td></td>
                <td></td>
	</tr>
        <tr>
		<td style="padding: 5px 10px;" width="22%">Telescope aperture</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['aperture'],2,".",""); ?> m</td>
                <td style="padding: 5px 10px;" width="22%">Throughput</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['throughput'],2,".",""); ?></td>
                <td></td>
                <td></td>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">Telluric absorption upper limit</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['maxtelluric'],2,".",""); ?></td>
                <td style="padding: 5px 10px;" width="22%">RV noise floor</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['floor'],1,".",""); ?> m/s</td>
                <td></td>
                <td></td>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">Overhead</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['overhead'],0,"",""); ?> min</td>
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
		<td style="padding: 5px 10px;" width="22%"><?php echo $mag_str; ?></td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['mag'],2,".",""); ?></td>
		<td></td>
		<td></td>
		</tr>
	<?php endif; ?>
	<tr>
		<td style="padding: 5px 10px;" width="22%">Orbital Period</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo $_GET['P']; ?> days</td>
		<td style="padding: 5px 10px;" width="22%">Stellar mass</td>
		<td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['Ms'],2,".",""); ?> M<sub>&#x02299;</sub></td>
                <td style="padding: 5px 10px;" width="22%">Exposure time</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo $_GET['texp']; ?> min</td>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">Planetary radius</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['rp'],2,".",""); ?> R<sub>&#x02295;</sub></td>
        	<td style="padding: 5px 10px;" width="22%">Stellar radius</td>
		<?php if (floatval($_GET['Rs']) > 0) : ?>
                	<td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['Rs'],2,".",""); ?> R<sub>&#x02299;</sub></td>
		<?php else: ?>
                        <td style="padding: 5px 10px;" width="11%">-</td>
		<?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">Photon-noise RV precision</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['sigRVphot'],2,".",""); ?> m/s</td>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">Planetary mass</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['mp'],2,".",""); ?> M<sub>&#x02295;</sub></td>
                <td style="padding: 5px 10px;" width="22%">Effective temperature</td>
                <?php if (floatval($_GET['Teff']) > 0) : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['Teff'],0,"",""); ?> K</td>
		<?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">RV activity rms</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['sigRVact'],2,".",""); ?> m/s</td>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="22%">RV semi-amplitude</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format(RV_K($_GET['P'],$_GET['Ms'],$_GET['mp']),2,'.',''); ?> m/s</td>
		<td style="padding: 5px 10px;" width="22%">Metallicity</td>
                <?php if ($_GET['Z'] != "") : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['Z'],2,'.',''); ?> [Fe/H]</td>
                <?php else: ?>
			<td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">RV rms from additional planets</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['sigRVplanets'],2,'.',''); ?> m/s</td>
        </tr>
        <tr>    
                <td style="padding: 5px 10px;" width="22%">&#x3A9;&emsp;[R<sub>&#x02295;</sub>/days<sup>1/3</sup>]</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format(Omega($_GET['P'],$_GET['rp']),2,'.',''); ?></td>
                <td style="padding: 5px 10px;" width="22%">Projected rotation velocity</td>
                <?php if (floatval($_GET['vsini']) > 0) : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['vsini'],2,'.',''); ?> km/s</td>
                <?php else: ?>
                        <td style="padding: 5px 10px;" width="11%">-</td>
                <?php endif; ?>
                <td style="padding: 5px 10px;" width="22%">Effective RV rms</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['sigRVeff'],2,'.',''); ?> m/s</td>
        </tr>
        <tr>
                <td></td>
                <td></td>
                <td style="padding: 5px 10px;" width="22%">Rotation period</td>
                <?php if (floatval($_GET['Prot']) > 0) : ?>
                        <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['Prot'],2,'.',''); ?> days</td>
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
		<td style="padding: 5px 10px;" width="24%">Desired K detection significance</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['Kdetsig'],2,'.',''); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
        </tr>
        <tr>
                <td style="padding: 5px 10px;" width="24%">Number of GP trials</td>
                <td style="padding: 5px 10px;" width="11%"><?php echo number_format($_GET['NGPtrials'],0,'',''); ?></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
	</tr>
</table>


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
	$sigRVactin = (($_GET['sigRVact']>0) ? $_GET['sigRVact'] : -1);
	$sigRVplanetsin = (($_GET['sigRVplanets']>0) ? $_GET['sigRVplanets'] : -1);
	$sigRVeffin = (($_GET['sigRVeff']>0) ? $_GET['sigRVeff']-1 : -1);
	$mpin = (($_GET['mp']>0) ? $_GET['mp'] : 0);
	$magin = (($_GET['mag']>0) ? $_GET['mag'] : 0);
	$Msin = (($_GET['Ms']>0) ? $_GET['Ms'] : 0);
	$Rsin = (($_GET['Rs']>0) ? $_GET['Rs'] : 0);
	$Teffin = (($_GET['Teff']>0) ? $_GET['Teff'] : 0);
	$Zin = (($_GET['Z']>0) ? $_GET['Z'] : 0);
	$vsiniin = (($_GET['vsini']>0) ? $_GET['vsini'] : 0);
	$Protin = (($_GET['Prot']>0) ? $_GET['Prot'] : 0);
?>


<br>
<p style="font-size:30px">&nbsp;&nbsp;&nbsp;<b>RVFC Results:</b></p>&nbsp;&nbsp;&nbsp;
<?php 
	$arguments = $wlminin." ".$wlmaxin." ".$Rin." ".$aperturein." ".$throughputin." ".$floorin." ".$maxtelluricin." ".$overheadin."
	".$_GET['texp']." ".$sigRVphotin." ".$sigRVactin." ".$sigRVplanetsin." ".$sigRVeffin." ".$_GET['P']." ".$_GET['rp']." ".$mpin." ".$magin."
	".$Msin." ".$Rsin." ".$Teffin." ".$Zin." ".$vsiniin." ".$Protin." ".$_GET['Kdetsig']." ".$_GET['NGPtrials'];
	//$results = exec("/usr/bin/python2.7 /data/cpapir/www/rvfc/php2python.py ".$arguments);
	echo $arguments;
?>
