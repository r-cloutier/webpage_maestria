<br><br>
<p style="font-size:24px" align="left">&nbsp;&nbsp;&nbsp;<b>Option 2.2</b></p>&nbsp;&nbsp;&nbsp;
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
		<td style="padding: 0px 0px 10px 30px;">Planetary mass (M<sub>&#x02295;</sub>) :&nbsp;&nbsp;<input type="text" name="mp" 
		value="<?php echo isset($_GET['mp']) ? $_GET['mp'] : $mp ?>"  size="10" maxlength="50"/>
		<span class="error"><?php echo ($mpErr!=NULL) ? $mpErr : "" ?></span></td>
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
		<td style="padding: 0px 0px 10px 30px;">RV noise floor (m/s) :&nbsp;&nbsp;<input type="text" name="floor" value="<?php echo
		isset($_GET['floor']) ? $_GET['floor'] : $floor ?>" size="10" maxlength="50"/><b> &#42;</b>
		<span class="error"><?php echo ($floorErr!=NULL) ? $floorErr : "" ?></span></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Photon-noise limited RV precision (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVphot"
		value="<?php echo isset($_GET['sigRVphot']) ? $_GET['sigRVphot'] : $sigRVphot ?>" size="10" maxlength="50"><b> &#42;</b>
		<span class="error"><?php echo ($sigRVphotErr!=NULL) ? $sigRVphotErr : "" ?></span></td>
	</tr>
	<tr>                
		<td style="padding: 0px 0px 10px 30px;">RV activity rms (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVact" value="<?php echo
		isset($_GET['sigRVact']) ? $_GET['sigRVact'] : $sigRVact ?>"  size="10" maxlength="50"/><b> &#42;</b>
		<span class="error"><?php echo ($sigRVactErr!=NULL) ? $sigRVactErr : "" ?></span></td>
	</tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">RV rms from additional planets (m/s) :&nbsp;&nbsp;<input type="text" name="sigRVplanets" 
		value="<?php echo isset($_GET['sigRVplanets']) ? $_GET['sigRVplanets'] : $sigRVplanets ?>"  size="10" maxlength="50"/><b> &#42;</b>
		<span class="error"><?php echo ($sigRVplanetsErr!=NULL) ? $sigRVplanetsErr : "" ?></span></td>
        </tr>
</table>

<br>
<p style="font-size:20px">&nbsp;&nbsp;&nbsp;<b>Simulation parameters:</b></p><br>&nbsp;&nbsp;&nbsp;
<table>
        <tr>
	      	<td style="padding: 0px 0px 10px 30px;">Exposure time (min) :&nbsp;&nbsp;<input type="text" name="texp" value="<?php echo
		isset($_GET['texp']) ? $_GET['texp'] : 10 ?>"  size="10" maxlength="50"/> <b>&#42;</b>
                <span class="error"><?php echo ($texpErr!=NULL) ? $texpErr : "" ?></span></td>
        </tr>
        <tr>
                <td style="padding: 0px 0px 10px 30px;">Overhead (min) :&nbsp;&nbsp;<input type="text" name="overhead" value="<?php echo
		isset($_GET['overhead']) ? $_GET['overhead'] : 0 ?>"  size="10" maxlength="50"/> <b>&#42;</b>
		<span class="error"><?php echo ($overheadErr!=NULL) ? $overheadErr : "" ?></span></td>
        </tr>
	<tr>
		<td style="padding: 0px 0px 10px 30px;">Desired K detection significance (K/&sigma;<sub>K</sub>) :&nbsp;&nbsp;<input type="text"
		name="Kdetsig" value="<?php echo isset($_GET['Kdetsig']) ? $_GET['Kdetsig'] : 3 ?>"  size="10" maxlength="50"/> <b>&#42;</b>
		<span class="error"><?php echo ($KdetsigErr!=NULL) ? $KdetsigErr : "" ?></span></td>
        </tr>
        <tr>
		<td style="padding: 0px 0px 10px 30px;">Number of GP trials :&nbsp;&nbsp;<input type="text" name="NGPtrials" value="<?php echo
		isset($_GET['NGPtrials']) ? $_GET['NGPtrials'] : 0 ?>"  size="10" maxlength="50"/> <b>&#42;</b> (note that increasing the number of
		GP trials will increase the wall time of the RVFC calculation)
		<span class="error"><?php echo ($NGPtrialsErr!=NULL) ? $NGPtrialsErr : "" ?></span></td>
    	</tr>
</table>

<br>&emsp;<input type=submit value="Run RVFC" name="runrvfc2d2"/>