<br><br>
<p style="font-size:24px" align="center">&nbsp;&nbsp;&nbsp;<b>Option 1: RVFC-derived RV precision</b></p>&nbsp;&nbsp;&nbsp;

   	    <div style="padding-left:160px;padding-right:160px">
		<br><h5>Instructions</h5>
		<b>Option 1:</b> to-be used when the photon-noise limited RV precision and the effective RV rms are unknown for the target of interest.
	    </div>
	    <div style="padding-left:180px;padding-right:160px">
	        <br>
		<ul>
			<li>&emsp;1) enter the required parameters of the RV spectrograph. Alternatively, a set of spectrographs with default
			parameter values can be resolved from the corresponding drop-down menu. The default values are not fixed and may be modified
			before proceeding if desired. Click "Resolve remaining fields" to proceed.</li><br>
			<li>&emsp;2) enter the required parameters of the transiting planet of interest. Including a value of the planetary mass is
			optional. If left blank, the planet's mass is calculated from an empirically-derived mass-radius relation.</li><br>
			<li>&emsp;3) enter the required stellar parameters including the apparent stellar magnitude in either the <i>V</i> or
			<i>J</i> band. The passband corresponding to the input magnitude is determined by the wavelength domain of the spectrograph
			specified in step 1 which should span either the <i>V</i> or <i>J</i> central wavelengths (i.e. 555 and 1250 nm
			respectively).</li><br>
			<li>&emsp;4) optionally, enter the rms values of additive RV noise sources from stellar activity and/or additional planets
			in the system. These values can be set to zero to be ignored. If left blank, their values will be sampled from appropriate
			empirical distributions according to the planetary and stellar parameters specified in steps 2 and 3.</li><br>
			<li>&emsp;5) enter the required values of the simulation parameters. This includes the number of GP trials to-be run
			which&#8213;if used&#8213;we recommend be set to at least ten as these results are sensitive to the window function of 
			the observations and should therefore be sampled. Alternatively, this value can be set to zero to only consider the white 
			noise calculation.</li><br>
			<li>&emsp;6) Click "Run RVFC" to begin the calculations. Reporting of the results to screen can take seconds up to
			a few minutes of wall time depending on the number of GP trials selected.</li><br>
		</ul>
	    </div>

<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Spectrograph parameters:</b></p><br>&nbsp;&nbsp;&nbsp;
	    
<!-- only add blank spectrograph fields if not resolved the star yet-->
<?php if (! isset($_GET['stellar'])) : ?>

<FONT COLOR="990000">(optional: select a spectrograph template)&nbsp;&nbsp;&nbsp;</FONT>
<select name="spectrograph">
<option value="nospec">--</option>
<!--<option value="SpectrographFiles/apfinfile.txt">APF</option>
<option value="SpectrographFiles/carmenesirinfile.txt">CARMENES-IR</option>
<option value="SpectrographFiles/carmenesvisinfile.txt">CARMENES-VIS</option>
<option value="SpectrographFiles/coralieinfile.txt">CORALIE</option>
<option value="SpectrographFiles/espressoinfile.txt">ESPRESSO</option>
<option value="SpectrographFiles/expresinfile.txt">EXPRES</option>
<option value="SpectrographFiles/gclefinfile.txt">G-CLEF</option>
<option value="SpectrographFiles/gianoinfile.txt">GIANO</option>-->
<option value="SpectrographFiles/harpsinfile.txt">HARPS</option>
<!--<option value="SpectrographFiles/harpsninfile.txt">HARPS-N</option>
<option value="SpectrographFiles/hdsinfile.txt">HDS</option>
<option value="SpectrographFiles/hiresinfile.txt">HIRES</option>
<option value="SpectrographFiles/hpfinfile.txt">HPF</option>
<option value="SpectrographFiles/irdinfile.txt">IRD</option>
<option value="SpectrographFiles/ishellinfile.txt">iSHELL</option>
<option value="SpectrographFiles/maroonxinfile.txt">MAROON-X</option>
<option value="SpectrographFiles/minervainfile.txt">MINERVA</option>
<option value="SpectrographFiles/minervaredinfile.txt">MINERVA-Red</option>
<option value="SpectrographFiles/neidinfile.txt">NEID</option>-->
<option value="SpectrographFiles/nirpsinfile.txt">NIRPS</option>
<!--<option value="SpectrographFiles/nresinfile.txt">NRES</option>
<option value="SpectrographFiles/parasinfile.txt">PARAS</option>
<option value="SpectrographFiles/pepsiinfile.txt">PEPSI</option>
<option value="SpectrographFiles/pfsinfile.txt">PFS</option>
<option value="SpectrographFiles/salthrsinfile.txt">SALT-HRS</option>
<option value="SpectrographFiles/sophieinfile.txt">SOPHIE</option>-->
<option value="SpectrographFiles/spirouinfile.txt">SPIRou</option>
<!--<option value="SpectrographFiles/wisdominfile.txt">WISDOM</option>-->
</select>&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit_spec" value="Resolve spectrograph" />

<!---
<br>&emsp;&emsp;<input type="checkbox" value="Uband" < if ($Ubandin == "Yes") : ?> checked< endif; ?> name="Uband">&nbsp;&nbsp;U band
<br>&emsp;&emsp;<input type="checkbox" value="Bband" < if ($Bbandin == "Yes") : ?> checked< endif; ?> name="Bband">&nbsp;&nbsp;B band
<br>&emsp;&emsp;<input type="checkbox" value="Vband" < if ($Vbandin == "Yes") : ?> checked< endif; ?> name="Vband">&nbsp;&nbsp;V band
<br>&emsp;&emsp;<input type="checkbox" value="Rband" < if ($Rbandin == "Yes") : ?> checked< endif; ?> name="Rband">&nbsp;&nbsp;R band
<br>&emsp;&emsp;<input type="checkbox" value="Iband" < if ($Ibandin == "Yes") : ?> checked< endif; ?> name="Iband">&nbsp;&nbsp;I band
<br>&emsp;&emsp;<input type="checkbox" value="Yband" < if ($Ybandin == "Yes") : ?> checked< endif; ?> name="Yband">&nbsp;&nbsp;Y band
<br>&emsp;&emsp;<input type="checkbox" value="Jband" < if ($Jbandin == "Yes") : ?> checked< endif; ?> name="Jband">&nbsp;&nbsp;J band
<br>&emsp;&emsp;<input type="checkbox" value="Hband" < if ($Hbandin == "Yes") : ?> checked< endif; ?> name="Hband">&nbsp;&nbsp;H band
<br>&emsp;&emsp;<input type="checkbox" value="Kband" < if ($Kbandin == "Yes") : ?> checked< endif; ?>
name="Kband">&nbsp;&nbsp;K band-->

<br><br>
<table>
	<tr>
	       	<td style="padding: 0px 0px 10px 30px;"><b>&#42; required field</b></td>
	       	<td></td>
	</tr>
        <tr>
	       	<td style="padding: 0px 0px 10px 30px;">Minimum wavelength (nm) :&nbsp;&nbsp;<input type="text"
		name="wlmin" value="<?php echo isset($_GET['wlmin']) ? $wlminin : $wlmin ?>"  size="10"
		maxlength="50"/><b> &#42;</b>
		<span class="error"><?php echo ($wlminErr!=NULL) ? $wlminErr : "" ?></span></td>
               	<td style="padding: 0px 0px 10px 30px;">Maximum wavelength (nm) :&nbsp;&nbsp;<input type="text"
	       	name="wlmax" value="<?php echo isset($_GET['wlmax']) ? $wlmaxin : $wlmax ?>"  size="10" maxlength="50"/><b> &#42;</b>
	       	<span class="error"><?php echo ($wlmaxErr!=NULL) ? $wlmaxErr : "" ?></span></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Spectral resolution (R = &lambda;/&delta;&lambda;) :&nbsp;&nbsp;<input type="text" name="R"
		value="<?php echo isset($_GET['R']) ? $Rin : $R ?>"  size="10" maxlength="50"/><b> &#42;</b>
		<span class="error"><?php echo ($RErr!=NULL) ? $RErr : "" ?></span></td>
		<td style="padding: 0px 0px 10px 30px;">Telescope aperture (metres) :&nbsp;&nbsp;<input type="text" name="aperture" value="<?php
		echo isset($_GET['aperture']) ? $aperturein : $aperture ?>"  size="10" maxlength="50"/></b> &#42;</b>
		<span class="error"><?php echo ($apertureErr!=NULL) ? $apertureErr : "" ?></span></td>
	</tr>
	<tr>
	        <td style="padding: 0px 0px 10px 30px;">Throughput (0-1) :&nbsp;&nbsp;<input type="text" name="throughput" value="<?php echo
		isset($_GET['throughput']) ? $throughputin : $throughput ?>"  size="10" maxlength="50"/><b> &#42;</b>
		<span class="error"><?php echo ($throughputErr!=NULL) ? $throughputErr : "" ?></span></td>
		<td style="padding: 0px 0px 10px 30px;">Maximum telluric absorption (0-1) : <input type="text" name="maxtelluric" value="<?php
		echo isset($_GET['maxtelluric']) ? $maxtelluricin : $maxtelluric ?>"  size="10" maxlength="50"/><b> &#42;</b>
		<span class="error"><?php echo ($maxtelluricErr!=NULL) ? $maxtelluricErr : "" ?></span></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">RV noise floor (m/s) :&nbsp;&nbsp;<input type="text" name="floor" value="<?php echo
		isset($_GET['floor']) ? $floorin : $floor ?>"  size="10" maxlength="50"/><b> &#42;</b>
		<span class="error"><?php echo ($floorErr!=NULL) ? $floorErr : "" ?></span></td>
		<td style="padding: 0px 0px 10px 30px;">Exposure time (min) :&nbsp;&nbsp;<input type="text" name="texp" value="<?php echo
		isset($_GET['texp']) ? $texpin : $texp ?>"  size="10" maxlength="50"/></b> &#42;</b>
		<span class="error"><?php echo ($texpErr!=NULL) ? $texpErr : "" ?></span></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Overhead (min) :&nbsp;&nbsp;<input type="text" name="overhead" value="<?php echo
		isset($_GET['overhead']) ? $overheadin : $overhead ?>"  size="10" maxlength="50"/><b> &#42;</b>
		<span class="error"><?php echo ($overheadErr!=NULL) ? $overheadErr : "" ?></span></td>
	</tr>
	<td></td>
</table>

<br>&emsp;<input type=submit value="Resolve remaining fields" name="stellar"/>
<?php endif; ?>
