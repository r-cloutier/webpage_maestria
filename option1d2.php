<br><br>
<p style="font-size:24px" align="left">&nbsp;&nbsp;&nbsp;<b>Option 1.2</b><span style="font-size:18px">: manually set the RV noise sources</span></p>&nbsp;&nbsp;&nbsp;
<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Spectrograph parameters:</b></p><br>&nbsp;&nbsp;&nbsp;


<body onload="print_warning()">
<script>
function print_warning() {
        var no_error = "<?php echo ($error1d2==NULL) ? True : False ; ?>";
        if (no_error) {
         	var warning = "Note that the RVFC will take a few seconds to interpolate the photon-noise limited RV precision in Option 1.2.";
                alert(warning);
	}
	stellar_magnitude();
}
</script>


<FONT COLOR="990000">(optional: select a spectrograph template)&nbsp;&nbsp;&nbsp;</FONT>
<select name="spectrograph">
<option value="nospec">--</option>
<option value="APF">APF</option>
<option value="CARMENES-NIR">CARMENES-NIR</option>
<option value="CARMENES-VIS">CARMENES-VIS</option>
<option value="CORALIE">CORALIE</option>
<option value="ESPRESSO">ESPRESSO</option>
<option value="EXPRES">EXPRES</option>
<option value="G-CLEF">G-CLEF</option>
<option value="GANS">GANS</option>
<option value="GIANO">GIANO</option>
<option value="HARPS">HARPS</option>
<option value="HARPS-3">HARPS-3</option>
<option value="HARPS-N">HARPS-N</option>
<option value="HDS">HDS</option>
<option value="HPF">HPF</option>
<option value="iLocater">iLocater</option>
<option value="IRD">IRD</option>
<option value="iSHELL">iSHELL</option>
<option value="KPF">KPF</option>
<option value="MAROON-X">MAROON-X</option>
<option value="MINERVA">MINERVA</option>
<option value="NEID">NEID</option>
<option value="NIRPS">NIRPS</option>
<option value="NRES">NRES</option>
<option value="PARAS">PARAS</option>
<option value="PEPSI">PEPSI</option>
<option value="PFS">PFS</option>
<option value="SALT-HRS">SALT-HRS</option>
<option value="SOPHIE">SOPHIE</option>
<option value="SPIRou">SPIRou</option>
<option value="TOU">TOU</option>
<option value="WISDOM">WISDOM</option>
</select>&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit_spec1d2" value="Resolve spectrograph" />

<!--<php
	if(sset($_GET['submit_spec'])) {
    		$spectrograph_input_file = $_GET['spectrograph'];
    		$file = fopen($spectrograph_input_file, 'r');
    		$data = fgetcsv($file, filesize($spectrograph_input_file));
   		$specname = $data[0];
		$wlminin = number_format($data[1],0,"","");
		$wlmaxin = number_format($data[2],0,"","");
		$Rin = number_format($data[3],0,"","");
		$aperturein = number_format($data[4],2,".","");
		$throughputin = number_format($data[5],2,".","");
		$maxtelluricin = number_format($data[6],2,".","");
		$floorin = number_format($data[7],1,".",""); 
		$texpin = number_format($data[8],1,".","");
		$overheadin = number_format($data[9],0,"","");

		// get spectral bands
		/*for ($i=8; $i<=sizeof($data)-1; $i++) {
                            if ($data[$i] == "U") {
                                $Ubandin = "Yes";
                            } elseif ($data[$i] == "B") {
                                $Bbandin = "Yes";
                            } elseif ($data[$i] == "V") {
                                $Vbandin = "Yes";
                            } elseif ($data[$i] == "R") {
                                $Rbandin = "Yes";
                            } elseif ($data[$i] == "I") {
                                $Ibandin = "Yes";
                            } elseif ($data[$i] == "Y") {
                                $Ybandin = "Yes";
                            } elseif ($data[$i] == "J") {
                                $Jbandin = "Yes";
                            } elseif ($data[$i] == "H") {
                                $Hbandin = "Yes";
                            } elseif ($data[$i] == "K") {
                                $Kbandin = "Yes";
                            }
                 }*/
                 fclose($file);
	}
?>-->

<!---<br>&emsp;&emsp;<input type="checkbox" value="Uband" <php if (sset($_GET['Uband'])) : ?> checked<php endif; ?> name="Uband">&nbsp;&nbsp;U band
<br>&emsp;&emsp;<input type="checkbox" value="Bband" <php if (sset($_GET['Bband'])) : ?> checked<php endif; ?> name="Bband">&nbsp;&nbsp;B band
<br>&emsp;&emsp;<input type="checkbox" value="Vband" <php if (sset($_GET['Vband'])) : ?> checked<php endif; ?> name="Vband">&nbsp;&nbsp;V band
<br>&emsp;&emsp;<input type="checkbox" value="Rband" <php if (sset($_GET['Rband'])) : ?> checked<php endif; ?> name="Rband">&nbsp;&nbsp;R band
<br>&emsp;&emsp;<input type="checkbox" value="Iband" <php if (sset($_GET['Iband'])) : ?> checked<php endif; ?> name="Iband">&nbsp;&nbsp;I band
<br>&emsp;&emsp;<input type="checkbox" value="Yband" <php if (sset($_GET['Yband'])) : ?> checked<php endif; ?> name="Yband">&nbsp;&nbsp;Y band
<br>&emsp;&emsp;<input type="checkbox" value="Jband" <php if (sset($_GET['Jband'])) : ?> checked<php endif; ?> name="Jband">&nbsp;&nbsp;J band
<br>&emsp;&emsp;<input type="checkbox" value="Hband" <php if (sset($_GET['Hband'])) : ?> checked<php endif; ?> name="Hband">&nbsp;&nbsp;H band
<br>&emsp;&emsp;<input type="checkbox" value="Kband" <php if (sset($_GET['Kband'])): ?> checked<php endif; ?> name="Kband">&nbsp;&nbsp;K band-->

<br><br><br>
<table>
        <tr>
	        <td style="padding: 0px 0px 10px 30px;"><b>&#42; required field</b></td>
		<td></td>	
	</tr>
        <?php if ($specdomainErr!=NULL) : ?>
                <tr>
                      	<td style="padding: 0px 0px 10px 30px;"><span class="error"><?php echo $specdomainErr ?></span></td>
			<td></td>
                </tr>
        <?php endif; ?>
	<tr>
	        <td style="padding: 0px 0px 10px 30px;">Minimum wavelength (nm) :&nbsp;&nbsp;<input type="text" name="wlmin" 
		id="wlmin" onkeyup="stellar_magnitude()"  
		value="<?php echo isset($_GET['wlmin']) ? $_GET['wlmin'] : $wlmin ?>" size="10" maxlength="50" onkeypress="return noenter()"/>
		<b> &#42;</b>
		<span class="error"><?php echo ($wlminErr!=NULL) ? $wlminErr : "" ?></span></td>
		<td style="padding: 0px 0px 10px 30px;">Maximum wavelength (nm) :&nbsp;&nbsp;<input type="text" name="wlmax" 
		onkeyup="stellar_magnitude()" id="wlmax" value="<?php echo isset($_GET['wlmax']) ? $_GET['wlmax'] : $wlmax ?>" 
		size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
		<span class="error"><?php echo ($wlmaxErr!=NULL) ? $wlmaxErr : "" ?></span></td>
	</tr>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">Spectral resolution (R = &lambda;/&delta;&lambda;) :&nbsp;&nbsp;<input type="text" name="R"
		value="<?php echo isset($_GET['R']) ? $_GET['R'] : $R ?>" size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
		<span class="error"><?php echo ($RErr!=NULL) ? $RErr : "" ?></span></td>
                <td style="padding: 0px 0px 10px 30px;">Effective telescope diameter (metres) :&nbsp;&nbsp;<input type="text" name="aperture" value="<?php echo
		isset($_GET['aperture']) ? $_GET['aperture'] : $aperture ?>" size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
		<span class="error"><?php echo ($apertureErr!=NULL) ? $apertureErr : "" ?></span></td>
        </tr>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">End-to-end throughput (0-1) :&nbsp;&nbsp;<input type="text" name="throughput" value="<?php echo
		isset($_GET['throughput']) ? $_GET['throughput'] : $throughput ?>" size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
		<span class="error"><?php echo ($throughputErr!=NULL) ? $throughputErr : "" ?></span></td>
                <td style="padding: 0px 0px 10px 30px;">RV noise floor (m/s) :&nbsp;&nbsp;<input type="text" name="floor" value="<?php echo
		isset($_GET['floor']) ? $_GET['floor'] : $floor ?>" size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
		<span class="error"><?php echo ($floorErr!=NULL) ? $floorErr : "" ?></span></td>
	</tr>
	<tr>
                <td style="padding: 0px 0px 10px 30px;">Exposure time (min) :&nbsp;&nbsp;<input type="text" name="texp" value="<?php echo
		isset($_GET['texp']) ? $_GET['texp'] : $texp ?>" size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
		<span class="error"><?php echo ($texpErr!=NULL) ? $texpErr : "" ?></span></td>
		<td style="padding: 0px 0px 10px 30px;">Overhead (min) :&nbsp;&nbsp;<input type="text" name="overhead" value="<?php echo
		isset($_GET['overhead']) ? $_GET['overhead'] : $overhead ?>" size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
		<span class="error"><?php echo ($overheadErr!=NULL) ? $overheadErr : "" ?></span></td>
	</tr>
</table>

<br><br>
<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Transiting planet parameters:</b></p><br>&nbsp;
<table>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">Orbital period (days) :&nbsp;&nbsp;<input type="text" name="P" value="<?php echo
		isset($_GET['P']) ? $_GET['P'] : $P ?>"  size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
		<span class="error"><?php echo ($PErr!=NULL) ? $PErr : "" ?></span></td>
        </tr>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">Planetary radius (R<sub>&#x02295;</sub>) :&nbsp;&nbsp;<input type="text" name="rp"
		value="<?php echo isset($_GET['rp']) ? $_GET['rp'] : $rp ?>"  size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
		<span class="error"><?php echo ($rpErr!=NULL) ? $rpErr : "" ?></span></td>
        </tr>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">Planetary mass (M<sub>&#x02295;</sub>) :&nbsp;&nbsp;<input type="text" name="mp"
		value="<?php echo isset($_GET['mp']) ? $_GET['mp'] : $mp ?>"  size="10" maxlength="50" onkeypress="return noenter()"/>
		<span class="error"><?php echo ($mpErr!=NULL) ? $mpErr : "" ?></span></td>
        </tr>
</table>



<br>
<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Stellar parameters:</b></p><br>
<table>

	<!--<php if (sset($_GET['Uband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">U :&nbsp;&nbsp;<input type="text" name="Umag" value="<php echo sset($_GET['Umag']) ? $_GET['Umag'] : $Umag ?>"  size="10" maxlength="50"/></td>
                        </tr>
                    <php endif; ?>
                    <php if (sset($_GET['Bband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">B :&nbsp;&nbsp;<input type="text" name="Bmag" value="<php echo sset($_GET['Bmag']) ? $_GET['Bmag'] : $Bmag ?>"  size="10" maxlength="50"/></td>
                        </tr>
                    <php endif; ?>
                    <php if (sset($_GET['Vband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">V :&nbsp;&nbsp;<input type="text" name="Vmag" value="<php echo sset($_GET['Vmag']) ? $_GET['Vmag'] : $Vmag ?>"  size="10" maxlength="50"/></td>
                        </tr>
                    <php endif; ?>
                    <php if (sset($_GET['Rband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">R :&nbsp;&nbsp;<input type="text" name="Rmag" value="<php echo sset($_GET['Rmag']) ? $_GET['Rmag'] : $Rmag ?>"  size="10" maxlength="50"/></td>
                        </tr>
                    <php endif; ?>
                    <php if (sset($_GET['Iband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">I :&nbsp;&nbsp;<input type="text" name="Imag" value="<php echo sset($_GET['Imag']) ? $_GET['Imag'] : $Imag ?>"  size="10" maxlength="50"/></td>
                        </tr>
                    <php endif; ?>
                    <php if (sset($_GET['Yband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">Y :&nbsp;&nbsp;<input type="text" name="Ymag" value="<php echo sset($_GET['Ymag']) ? $_GET['Ymag'] : $Ymag ?>"  size="10" maxlength="50"/></td>
                        </tr>
                    <php endif; ?>
                    <php if (sset($_GET['Jband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">J :&nbsp;&nbsp;<input type="text" name="Jmag" value="<php echo sset($_GET['Jmag']) ? $_GET['Jmag'] : $Jmag ?>"  size="10" maxlength="50"/></td>
                        </tr>
                    <php endif; ?>
                    <php if (sset($_GET['Hband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">H :&nbsp;&nbsp;<input type="text" name="Hmag" value="<php echo sset($_GET['Hmag']) ? $_GET['Hmag'] : $Hmag ?>"  size="10" maxlength="50"/></td>
                        </tr>
                    <php endif; ?>
                    <php if (sset($_GET['Kband'])) : ?>
                        <tr>
                            <td style="padding: 0px 0px 10px 30px;">K :&nbsp;&nbsp;<input type="text" name="Kmag" value="<php echo sset($_GET['Kmag']) ? $_GET['Kmag'] : $Kmag ?>"  size="10" maxlength="50"/></td>
                        </tr>
	<php endif; ?>
</table>
<table>
        <php if (!sset($_GET['Uband']) &&
                  !sset($_GET['Bband']) &&
                  !sset($_GET['Vband']) &&
                  !sset($_GET['Rband']) &&
                  !sset($_GET['Iband']) &&
                  !sset($_GET['Yband']) &&
                  !sset($_GET['Jband']) &&
                  !sset($_GET['Hband']) &&
                  !sset($_GET['Kband'])) {
                  echo "No spectral bands selected!";
                  }
		  ?>
-->
		    <tr>
			<td style="padding: 0px 0px 10px 30px;"><span id="mag_label"></span><input type="text" name="mag"
			value="<?php echo isset($_GET['mag']) ? $_GET['mag'] : $mag ?>"  size="10" maxlength="50" onkeypress="return noenter()"/>
			<b> &#42;</b>
			<span class="error"><?php echo ($magErr!=NULL) ? $magErr : "" ?></span></td>
			<td></td>
		    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Stellar mass (M<sub>&#x02299;</sub>) :&nbsp;&nbsp;<input type="text" name="Ms"
			value="<?php echo isset($_GET['Ms']) ? $_GET['Ms'] : $Ms ?>"  size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
			<span class="error"><?php echo ($MsErr!=NULL) ? $MsErr : "" ?></span></td>
                        <td style="padding: 0px 0px 10px 30px;">Stellar radius (R<sub>&#x02299;</sub>) : <input type="text" name="Rs" value="<?php
			echo isset($_GET['Rs']) ? $_GET['Rs'] : $Rs ?>"  size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
			<span class="error"><?php echo ($RsErr!=NULL) ? $RsErr : "" ?></span></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">Effective temperature (K) :&nbsp;&nbsp;<input type="text" name="Teff" value="<?php
			echo isset($_GET['Teff']) ? $_GET['Teff'] : $Teff ?>"  size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
			<span class="error"><?php echo ($TeffErr!=NULL) ? $TeffErr : "" ?></span></td>
                        <td style="padding: 0px 0px 10px 30px;">Metallicity ([Fe/H]) : <input type="text" name="Z" value="<?php echo
			isset($_GET['Z']) ? $_GET['Z'] : $Z ?>"  size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b>
			<span class="error"><?php echo ($ZErr!=NULL) ? $ZErr : "" ?></span></td>
                    </tr>
                    <tr>
                        <td style="padding: 0px 0px 10px 30px;">vsini (km/s) :&nbsp;&nbsp;<input type="text" name="vsini"
			value="<?php echo isset($_GET['vsini']) ? $_GET['vsini'] : $vsini ?>"  size="10" maxlength="50"
			onkeypress="return noenter()"/><b> &#42;</b>
			<span class="error"><?php echo ($vsiniErr!=NULL) ? $vsiniErr : "" ?></span></td>
		        <?php if ($_GET['NGPtrials']>0) : ?>
		                <td style="padding: 0px 0px 10px 30px;">Rotation period (days) :&nbsp;&nbsp;<input
				type="text" name="Prot" value="<?php echo isset($_GET['Prot']) ? $_GET['Prot'] : $Prot ?>"  size="10"
				maxlength="50" onkeypress="return noenter()"/>
				<span class="error"><?php echo ($ProtErr!=NULL) ? $ProtErr : "" ?></span></td>
		        <?php endif; ?>
			<?php if ($_GET['NGPtrials']<=0) : ?>
				<td></td>
			<?php endif; ?>
                    </tr>
</table>


<br>
<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>RV noise sources:</b></p><br>&nbsp;&nbsp;&nbsp;
<table>
        <tr>
	    	<td style="padding: 0px 0px 10px 30px;">RV activity rms (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVact" value="<?php echo
		isset($_GET['sigRVact']) ? $_GET['sigRVact'] : $sigRVact ?>"  size="10" maxlength="50" onkeypress="return noenter()"/> <b>&#42;</b>
		<span class="error"><?php echo ($sigRVactErr!=NULL) ? $sigRVactErr : "" ?></span></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">RV rms from additional planets (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVplanets"
		value="<?php echo isset($_GET['sigRVplanets']) ? $_GET['sigRVplanets'] : $sigRVplanets ?>" size="10" maxlength="50"
		onkeypress="return noenter()"/> <b>&#42;</b>
		<span class="error"><?php echo ($sigRVplanetsErr!=NULL) ? $sigRVplanetsErr : "" ?></span></td>
	</tr>
</table>


<br>
<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Simulation parameters:</b></p><br>&nbsp;&nbsp;&nbsp;
<table>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">Desired K detection significance (K/&sigma;<sub>K</sub>) :&nbsp;&nbsp;<input type="text"
		name="Kdetsig" value="<?php echo isset($_GET['Kdetsig']) ? $_GET['Kdetsig'] : 5 ?>"  size="10" maxlength="50" 
		onkeypress="return noenter()"/><b> &#42;</b>
		<span class="error"><?php echo ($KdetsigErr!=NULL) ? $KdetsigErr : "" ?></span></td>
        </tr>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">Number of GP trials :&nbsp;&nbsp;<input type="text" name="NGPtrials"
		onkeyup="print_warningGP()" id="NGPtrials" value="<?php echo isset($_GET['NGPtrials']) ? $_GET['NGPtrials'] : 0 ?>" 
		size="10" maxlength="50" onkeypress="return noenter()"/><b> &#42;</b> 
		<span class="error"><?php echo ($NGPtrialsErr!=NULL) ? $NGPtrialsErr : "" ?></span></td>
        </tr>
</table>
<span id="Warning"></span>
<br>


<script>
function print_warningGP() {
        var NGPtrials = document.getElementById("NGPtrials").value;
        // if null then do nothing
	if (NGPtrials === "") {
	} else {
                var NGPtrials_int = parseInt(NGPtrials);
		// if greater than one send a warning alert
                if (NGPtrials_int > 0) {
                        var NGPtrials_label = NGPtrials_int.toFixed(0);
	        	var trial_label = (NGPtrials_int == 1 ? "trial" : "trials");
                        var warning = "&emsp;&emsp;<b>&#42;Note that the RVFC will take a few minutes to run "+NGPtrials_label+" GP "+trial_label+"  (&asymp; 90 seconds per GP trial).</b>";
                        //alert(warning);
                        document.getElementById("Warning").innerHTML = warning;
		}
	}
}

function stellar_magnitude() {
	var wlmin = document.getElementById("wlmin").value;
	var wlmax = document.getElementById("wlmax").value;
	if (wlmin < 555 && wlmax > 555) {
		var mag_label = "<i>V</i> band mangitude :&nbsp;&nbsp;";
	} else if (wlmin < 1250 && wlmax > 1250) {
		var mag_label = "<i>J</i> band magnitude :&nbsp;&nbsp;";
	} else {
		var mag_label = "<b>&#42; the spectrograph wavelength coverage must span either the <i>V</i> or <i>J</i> band (i.e. 555 and 1250 nm respectively) </b> :&nbsp;&nbsp;"
	}
	document.getElementById("mag_label").innerHTML = mag_label;
}

function noenter() {
        return !(window.event && window.event.keyCode == 13); 
}
</script>

<br>&emsp;<input type=submit value="Run RVFC" name="runrvfc1d2"/>
