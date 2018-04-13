<br><p style="font-size:30px">&nbsp;&nbsp;&nbsp;<b>Option 1: calculator-derived RV precision</b></p>&nbsp;&nbsp;&nbsp;

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

<br><br><br>
<table>
        <tr>
	       <td style="padding: 0px 0px 10px 30px;">Minimum wavelength (nm) :&nbsp;&nbsp;<input type="text"
		name="wlmin" value="<?php echo isset($_GET['wlmin']) ? $wlminin : $wlmin ?>"  size="10"
		maxlength="50"/></td>
               <td style="padding: 0px 0px 10px 30px;">Maximum wavelength (nm) :&nbsp;&nbsp;<input type="text"
	       name="wlmax" value="<?php echo isset($_GET['wlmax']) ? $wlmaxin : $wlmax ?>"  size="10" maxlength="50"/></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Spectral resolution (R = &lambda;/&delta;&lambda;) :&nbsp;&nbsp;<input type="text" name="R" value="<?php echo isset($_GET['R']) ? $Rin : $R ?>"  size="10" maxlength="50"/></td>
		<td style="padding: 0px 0px 10px 30px;">Telescope aperture (metres) :&nbsp;&nbsp;<input type="text" name="aperture" value="<?php echo isset($_GET['aperture']) ? $aperturein : $aperture ?>"  size="10" maxlength="50"/></td>
	</tr>
	<tr>
	        <td style="padding: 0px 0px 10px 30px;">Throughput (0-1) :&nbsp;&nbsp;<input type="text" name="throughput" value="<?php echo isset($_GET['throughput']) ? $throughputin : $throughput ?>"  size="10" maxlength="50"/></td>
		<td style="padding: 0px 0px 10px 30px;">Telluric absorption upper limit (0-1) : <input type="text" name="maxtelluric" value="<?php echo isset($_GET['maxtelluric']) ? $maxtelluricin : $maxtelluric ?>"  size="10" maxlength="50"/></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">RV noise floor (m/s) :&nbsp;&nbsp;<input type="text" name="floor" value="<?php echo isset($_GET['floor']) ? $floorin : $floor ?>"  size="10" maxlength="50"/></td>
		<td style="padding: 0px 0px 10px 30px;">Exposure time (min) :&nbsp;&nbsp;<input type="text" name="texp" value="<?php echo
		isset($_GET['texp']) ? $texpin : $texp ?>"  size="10" maxlength="50"/></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Overhead (min) :&nbsp;&nbsp;<input type="text" name="overhead" value="<?php echo isset($_GET['overhead']) ? $overheadin : $overhead ?>"  size="10" maxlength="50"/></td>
	</tr>
	<td></td>
</table>

<br>&emsp;<input type=submit value="Resolve remaining fields" name="stellar"/>
<?php endif; ?>
