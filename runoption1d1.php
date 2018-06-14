<!-- check for all required fields first -->
<?php

	function report_missing_fields() {
		$wlminErr = ((is_wlmin_bad()) ? '<b>&#955;<sub>min</sub> is required</b>' : NULL);
              	$wlmaxErr = ((is_wlmax_bad()) ? '<b>&#955;<sub>max</sub> is required</b>' : NULL);
		$RErr = ((is_R_bad()) ? '<b>spectral resolution is required</b>' : NULL);
		$apertureErr = ((is_aperture_bad()) ? '<b>telescope aperture is required</b>' : NULL);
		$throughputErr = ((is_throughput_bad()) ? '<b>throughput is required</b>' : NULL);
		$maxtelluricErr = ((is_maxtelluric_bad()) ? '<b>max. telluric absorption is required</b>' : NULL);
		$floorErr = ((is_floor_bad()) ? '<b>RV noise floor is required</b>' : NULL);
		$texpErr = ((is_texp_bad()) ? '<b>exposure time is required</b>' : NULL);
		$overheadErr = ((is_overhead_bad()) ? '<b>overhead is required</b>' : NULL);
		$PErr = ((is_P_bad()) ? '<b>orbital period is required</b>' : NULL);
                $rpErr = ((is_rp_bad()) ? '<b>planetary radius is required</b>' : NULL);
		$mpErr = ((is_mp_bad()) ? '<b>* planetary mass must be positive and non-zero</b>' : NULL);
		$magErr = ((is_mag_bad()) ? '<b>stellar magnitude is required</b>' : NULL);
		$MsErr = ((is_Ms_bad()) ? '<b>stellar mass is required</b>' : NULL);
                $RsErr = ((is_Rs_bad()) ? '<b>stellar radius is required</b>' : NULL);
                $TeffErr = ((is_Teff_bad()) ? '<b>effective temperature is required</b>' : NULL);
                $ZErr = ((is_Z_bad()) ? '<b>metallicity is required</b>' : NULL);
		$vsiniErr = ((is_vsini_bad()) ? '<b>vsini is required</b>' : NULL);
                $ProtErr = ((is_Prot_bad()) ? '<b>rotation period is required</b>' : NULL);
		$KdetsigErr = ((is_Kdetsig_bad()) ? '<b>desired K detection significance is required</b>' : NULL);
		$NGPtrialsErr = ((is_NGPtrials_bad()) ? '<b>number of GP trials is required</b>' : NULL);
		$error_messages = array($wlminErr, $wlmaxErr, $RErr, $apertureErr, $throughputErr, $maxtelluricErr, $floorErr, $texpErr,
		$overheadErr, $PErr, $rpErr, $mpErr, $magErr, $MsErr, $RsErr, $TeffErr, $ZErr, $vsiniErr, $ProtErr, $KdetsigErr, $NGPtrialsErr);
		return $error_messages;
	}

	function is_wlmin_bad() {
		if (($_GET['wlmin']==NULL) || ($_GET['wlmin']<0)) { $wlmin_bad = True; } else { $wlmin_bad = False; }
		return $wlmin_bad; }
        function is_wlmax_bad() {
	        if (($_GET['wlmax']==NULL) || ($_GET['wlmax']<0)) { $wlmax_bad = True; } else { $wlmax_bad = False; }
	        return $wlmax_bad; }
	function is_R_bad() {
	        if (($_GET['R']==NULL) || ($_GET['R']<0)) { $R_bad = True; } else { $R_bad = False; }
		return $R_bad; }
        function is_aperture_bad() {
	        if (($_GET['aperture']==NULL) || ($_GET['aperture']<0)) { $aperture_bad = True; } else { $aperture_bad = False; }
                return $aperture_bad; }
	function is_throughput_bad() {
	        if (($_GET['throughput']==NULL) || ($_GET['throughput']<=0) || ($_GET['throughput']>1)) { $throughput_bad = True; } 
		else { $throughput_bad = False;}
		return $throughput_bad; }
	function is_maxtelluric_bad() {
	        if (($_GET['maxtelluric']==NULL) || ($_GET['maxtelluric']<0) || ($_GET['maxtelluric']>=1)) { $maxtelluric_bad = True; } 
		else { $maxtelluric_bad = False;}
                return $maxtelluric_bad; }
	function is_floor_bad() {
	        if (($_GET['floor']==NULL) || ($_GET['floor']<0)) { $floor_bad = True; } else { $floor_bad = False;}
                return $floor_bad; }
	function is_texp_bad() {
	        if (($_GET['texp']==NULL) || ($_GET['texp']<0)) { $texp_bad = True; } else { $texp_bad = False;}
                return $texp_bad; }
	function is_overhead_bad() {
	        if (($_GET['overhead']==NULL) || ($_GET['overhead']<0)) { $overhead_bad = True; } else { $overhead_bad = False;}
                return $overhead_bad; }
	function is_P_bad() {
		if (($_GET['P']==NULL) || ($_GET['P']<0)) { $P_bad = True; } else { $P_bad = False;}
		return $P_bad; }
	function is_rp_bad() {
	        if (($_GET['rp']==NULL) || ($_GET['rp']<0)) { $rp_bad = True; } else { $rp_bad = False;}    
		return $rp_bad; }
        function is_mp_bad() {
	        if (($_GET['mp']<=0) && ($_GET['mp']!=NULL)) { $mp_bad = True; } else { $mp_bad = False;}
		return $mp_bad; }
	function is_mag_bad() {
	        if (($_GET['mag']==NULL)) { $mag_bad = True; } else { $mag_bad = False;}    
		return $mag_bad; }
        function is_Ms_bad() {
	        if (($_GET['Ms']==NULL) || ($_GET['Ms']<0)) { $Ms_bad = True; } else { $Ms_bad = False;}    
		return $Ms_bad; }
	function is_Rs_bad() {
	        if (($_GET['Rs']==NULL) || ($_GET['Rs']<0)) { $Rs_bad = True; } else { $Rs_bad = False;}
		return $Rs_bad; }
        function is_Teff_bad() {
	        if (($_GET['Teff']==NULL) || ($_GET['Teff']<0)) { $Teff_bad = True; } else { $Teff_bad = False;} 
		return $Teff_bad; }
	function is_Z_bad() {
	        if (($_GET['Z']==NULL)) { $Z_bad = True; } else { $Z_bad = False;}
		return $Z_bad; }
        function is_vsini_bad() {
	        if (($_GET['vsini']==NULL) || ($_GET['vsini']<0)) { $vsini_bad = True; } else { $vsini_bad = False;}
		return $vsini_bad; }
        function is_Prot_bad() {
                if ((($_GET['NGPtrials']>0) && ($_GET['Prot']==0)) || ($_GET['Prot']==NULL) || ($_GET['Prot']<0)) 
		{ $Prot_bad = True;} else { $Prot_bad = False;}
		return $Prot_bad; }
        function is_Kdetsig_bad() {
	        if (($_GET['Kdetsig']==NULL) || ($_GET['Kdetsig']<0)) { $Kdetsig_bad = True; } else { $Kdetsig_bad = False;}    
		return $Kdetsig_bad; }
        function is_NGPtrials_bad() {
	        if (($_GET['NGPtrials']==NULL) || ($_GET['NGPtrials']<0)) { $NGPtrials_bad = True; } else { $NGPtrials_bad = False;}    
		return $NGPtrials_bad; }
	

	// reload the option page if missing any required fields
	// otherwise run the RVFC
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if ((is_wlmin_bad()) || (is_wlmax_bad()) || (is_R_bad()) || (is_aperture_bad()) || (is_throughput_bad()) || (is_maxtelluric_bad())
		|| (is_floor_bad()) || (is_texp_bad()) || (is_overhead_bad()) ||
		(is_P_bad()) || (is_rp_bad()) || (is_mp_bad()) || (is_mag_bad()) || (is_Ms_bad()) || (is_Rs_bad()) || (is_Teff_bad()) ||
		(is_Z_bad()) || (is_vsini_bad()) || (is_Prot_bad()) || (is_Kdetsig_bad()) || (is_NGPtrials_bad())) {
			$Errs = report_missing_fields();
			$wlminErr = $Errs[0];
			$wlmaxErr = $Errs[1];
			$RErr = $Errs[2];
			$apertureErr = $Errs[3];
			$throughputErr = $Errs[4];
			$maxtelluricErr = $Errs[5];
			$floorErr = $Errs[6];
			$texpErr = $Errs[7];
			$overheadErr = $Errs[8];
			$PErr = $Errs[9];
			$rpErr = $Errs[10];
			$mpErr = $Errs[11];
			$magErr = $Errs[12];
			$MsErr = $Errs[13];
			$RsErr = $Errs[14];
			$TeffErr = $Errs[15];
			$ZErr = $Errs[16];
			$vsiniErr = $Errs[17];
			$ProtErr = $Errs[18];
			$KdetsigErr = $Errs[19];
			$NGPtrialsErr = $Errs[20];
			$error1d1 = True;
			include "option1d1.php";
		} else {
			include "runRVFC.php";
		}
	}
?>
