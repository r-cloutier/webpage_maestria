<br><br>
<p style="font-size:24px" align="center">&nbsp;&nbsp;&nbsp;<b>Option 2.3</b></p>&nbsp;&nbsp;&nbsp;

            <div style="padding-left:160px;padding-right:160px">
		<b>Option 2:</b> to-be used when the photon-noise limited RV precision or the effective RV rms is known a-priori for the target 
		of interest (often from previous runs of the RVFC or from independent calculations).
	    </div>
	    <div style="padding-left:180px;padding-right:160px">
	        <br>
		<ul>
			<li>&emsp;1) enter the required parameters of the transiting planet of interest. Including a value of the planetary mass is
			optional. If left blank, the planet's mass is calculated from an empirically-derived mass-radius relation.</li><br>
			<li>&emsp;2) enter the required stellar parameters. Most stellar parameters are only needed if sampling RV noise sources
			(see step 3).</li><br>
			<li>&emsp;3) enter the additive RV noise sources individually or the effective RV rms alone. If individual RV noise sources
			are added (i.e. the spectrograph's RV noise floor, the photon-noise limited RV precision, RV activity, and RV rms from
			additional planets) then these values are used to calculate the effective RV rms which can alternatively be set verbatim,
			thus negating the need to specify any other RV noise source. Input values for the stellar activity and/or additional planets 
			in the system can be set to zero to be ignored or if left blank, their values will be sampled from appropriate empirical 
			distributions according to the planetary and stellar parameters specified in steps 1 and 2.</li><br>
			<li>&emsp;4) enter the required values of the simulation parameters. This includes the number of GP trials to-be run
			which&#8213;if used&#8213;we recommend be set to at least ten as these results are sensitive to the window function of 
			the observations and should therefore be sampled. Alternatively, this value can be set to zero to only consider the white 
			noise calculation.</li><br>
			<li>&emsp;5) Click "Run RVFC" to begin the calculations. Reporting of the results to screen can take seconds up to
			a few minutes of wall time depending on the number of GP trials selected.</li><br>
		</ul>
	    </div>

<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Transiting planet parameters:</b></p><br>
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
</table>

<br>
<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>RV noise sources:</b></p><br>&nbsp;&nbsp;&nbsp;
<table>
	<tr>                
		<td style="padding: 0px 0px 10px 30px;">Effective RV rms (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVeff" value="<?php echo
		isset($_GET['sigRVeff']) ? $_GET['sigRVeff'] : $sigRVeff ?>"  size="10" maxlength="50"/><b> &#42;</b>
		<span class="error"><?php echo ($sigRVeffErr!=NULL) ? $sigRVeffErr : "" ?></span></td>
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
		<td style="padding: 0px 0px 10px 30px;">Desired K detection significance (K/&sigma;<sub>K</sub>) :&nbsp;&nbsp;<input type="text"
		name="Kdetsig" value="<?php echo isset($_GET['Kdetsig']) ? $_GET['Kdetsig'] : 3 ?>"  size="10" maxlength="50"/> <b>&#42;</b>
		<span class="error"><?php echo ($KdetsigErr!=NULL) ? $KdetsigErr : "" ?></span></td>
        </tr>
</table>

<br>&emsp;<input type=submit value="Run RVFC" name="runrvfc2d3"/>
