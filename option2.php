<br><br>
<p style="font-size:24px" align="center">&nbsp;&nbsp;&nbsp;<b>Option 2: user-specified RV precision</b></p>&nbsp;&nbsp;&nbsp;

            <div style="padding-left:160px;padding-right:160px">
		<b>Option 2:</b> to-be used when the photon-noise limited RV precision is known a-priori for the target of interest (often from
		previous runs of the RVFC or from independent calculations).
	    </div>
	    <div style="padding-left:180px;padding-right:160px">
	        <br>
		<ul>
			<li>&emsp;1) enter the required parameters of the transiting planet of interest. Including a value of the planetary mass is
			optional. If left blank, the planet's mass is calculated from an empirically-derived mass-radius relation.</li><br>
			<li>&emsp;2) enter the required stellar parameters. Most stellar parameters are only needed if sampling RV noise sources
			(see step 3).</li><br>
			<li>&emsp;3) enter the additive RV noise sources including the spectrograph's RV noise floor and photon-noise
			limited RV precision. Values from stellar activity and/or additional planets in the system can be set to zero to be ignored
			or if left blank, their values will be sampled from appropriate empirical distributions according to the planetary and
			stellar parameters specified in steps 1 and 2. The aforementioned values will be used to calculate the effective RV rms
			which can alternatively be set verbatim thus negating the need to specify any other RV noise sources.</li><br>
			<li>&emsp;4) enter the required values of the simulation parameters. This includes the number of GP trials to-be run which
			we recommend be set to at least ten as these results are sensitive to the window function of the observations and should
			therefore be sampled. Alternatively, this value can be set to zero to only consider the white noise calculation.</li><br>
			<li>&emsp;5) Click "Run RVFC" to begin the calculations. Reporting of the results to screen can take seconds up to
			a few minutes of wall time depending on the number of GP trials selected.</li><br>
		</ul>
	    </div>

<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Planet parameters:</b></p><br>
<table>
	<tr>
		<td style="padding: 0px 0px 10px 30px;"><b>&#42; required field</b></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Orbital period (days) :&nbsp;&nbsp;<input type="text" name="P" value="<?php echo
		isset($_GET['P']) ? $_GET['P'] : $P ?>"  size="10" maxlength="50"/><b> &#42;</b>
		<span class="error"><?php echo ($PErr!=NULL) ? $PErr : "" ?></span></td>
        </tr>
        <tr>
		<td style="padding: 0px 0px 10px 30px;">Planetary radius (R<sub>&#x02295;</sub>) :&nbsp;&nbsp;<input type="text" name="rp"
		value="<?php echo isset($_GET['rp']) ? $_GET['rp'] : $rp ?>"  size="10" maxlength="50"/><b> &#42;</b>
		<span class="error"><?php echo ($rpErr!=NULL) ? $rpErr : "" ?></span></td>
        </tr>
        <tr>
		<td style="padding: 0px 0px 10px 30px;">Planetary mass (M<sub>&#x02295;</sub>) :&nbsp;&nbsp;<input type="text" name="mp" value="<?php echo isset($_GET['mp']) ? $_GET['mp'] : $mp ?>"  size="10" maxlength="50"/></td>
        </tr>
</table>

<br>
<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Stellar parameters:</b></p><br>&nbsp;&nbsp;&nbsp;
<table>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Stellar mass (M<sub>&#x02299;</sub>) :&nbsp;&nbsp;<input type="text" name="Ms" value="<?php
		echo isset($_GET['Ms']) ? $_GET['Ms'] : $Ms ?>"  size="10" maxlength="50"/><b> &#42;</b>
                <span class="error"><?php echo ($MsErr!=NULL) ? $MsErr : "" ?></span></td>
	</tr>
	<tr>
	        <td style="padding: 0px 0px 10px 30px;">Stellar radius (R<sub>&#x02299;</sub>) :&nbsp;&nbsp;<input type="text" name="Rs"
		value="<?php echo isset($_GET['Rs']) ? $_GET['Rs'] : $Rs ?>"  size="10" maxlength="50"/>
		<span class="error"><?php echo ($RsErr!=NULL) ? $RsErr : "" ?></span></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Effective temperature (K) :&nbsp;&nbsp;<input type="text" name="Teff" value="<?php echo
		isset($_GET['Teff']) ? $_GET['Teff'] : $Teff ?>"  size="10" maxlength="50"/>
		<span class="error"><?php echo ($TeffErr!=NULL) ? $TeffErr : "" ?></span></td>
        </tr>
	<tr>                
		<td style="padding: 0px 0px 10px 30px;">Metallicity ([Fe/H]) :&nbsp;&nbsp;<input type="text" name="Z" value="<?php echo
		isset($_GET['Z']) ? $_GET['Z'] : $Z ?>"  size="10" maxlength="50"/>
		<span class="error"><?php echo ($ZErr!=NULL) ? $ZErr : "" ?></span></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Rotation period (days) :&nbsp;&nbsp;<input type="text" name="Prot" value="<?php echo
		isset($_GET['Prot']) ? $_GET['Prot'] : $Prot ?>"  size="10" maxlength="50"/>
		<span class="error"><?php echo ($ProtErr!=NULL) ? $ProtErr : "" ?></span></td>
        </tr>
</table>

<br>
<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>RV noise sources:</b></p><br>&nbsp;&nbsp;&nbsp;
<table>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">RV noise floor (m/s) :&nbsp;&nbsp;<input type="text" name="floor" value="<?php echo
		isset($_GET['floor']) ? $floorin : $floor ?>"  size="10" maxlength="50"/>
		<span class="error"><?php echo ($floorErr!=NULL) ? $floorErr : "" ?></span></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Photon-noise limited RV precision (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVphot"
		value="<?php echo isset($_GET['sigRVphot']) ? $_GET['sigRVphot'] : $sigRVphot ?>"  size="10" maxlength="50"/>
		<span class="error"><?php echo ($sigRVphotErr!=NULL) ? $sigRVphotErr : "" ?></span></td>
	</tr>
        <tr>
		<td style="padding: 0px 0px 10px 30px;">RV activity rms (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVact" value="<?php echo
		isset($_GET['sigRVact']) ? $_GET['sigRVact'] : NULL ?>"  size="10" maxlength="50"/></td>
        </tr>
        <tr>
		<td style="padding: 0px 0px 10px 30px;">RV rms from additional planets (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVplanets" value="<?php echo isset($_GET['sigRVplanets']) ? $_GET['sigRVplanets'] : $sigRVplanets ?>"  size="10" maxlength="50"/></td>
        </tr>
        <tr>
		<td style="padding: 0px 0px 10px 30px;">Effective RV rms (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVeff" value="<?php echo isset($_GET['sigRVeff']) ? $_GET['sigRVeff'] : $sigRVplanets ?>"  size="10" maxlength="50"/></td>
        </tr>
</table>

<br>
<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Simulation parameters:</b></p><br>&nbsp;&nbsp;&nbsp;
<table>
        <tr>
	      	<td style="padding: 0px 0px 10px 30px;">Exposure time (min) :&nbsp;&nbsp;<input type="text" name="texp" value="<?php echo
		isset($_GET['texp']) ? $_GET['texp'] : $texp ?>"  size="10" maxlength="50"/> <b>&#42;</b>
                <span class="error"><?php echo ($texpErr!=NULL) ? $texpErr : "" ?></span></td>
        </tr>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">Overhead (min) :&nbsp;&nbsp;<input type="text" name="overhead" value="<?php echo
		isset($_GET['overhead']) ? $_GET['overhead'] : $overhead ?>"  size="10" maxlength="50"/> <b>&#42;</b>
		<span class="error"><?php echo ($overheadErr!=NULL) ? $overheadErr : "" ?></span></td>
        </tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Desired K detection signficance (K/&sigma;<sub>K</sub>) :&nbsp;&nbsp;<input type="text"
		name="Kdetsig" value="<?php echo isset($_GET['Kdetsig']) ? $_GET['Kdetsig'] : 3 ?>"  size="10" maxlength="50"/> <b>&#42;</b>
		<span class="error"><?php echo ($KdetsigErr!=NULL) ? $KdetsigErr : "" ?></span></td>
        </tr>
        <tr>
		<td style="padding: 0px 0px 10px 30px;">Number of GP trials :&nbsp;&nbsp;<input type="text" name="NGPtrials" value="<?php echo
		isset($_GET['NGPtrials']) ? $_GET['NGPtrials'] : 0 ?>"  size="10" maxlength="50"/> <b>&#42;</b>
		<span class="error"><?php echo ($NGPtrialsErr!=NULL) ? $NGPtrialsErr : "" ?></span></td>
    	</tr>
</table>

<br>&emsp;<input type=submit value="Run RVFC" name="runrvfc2"/>
