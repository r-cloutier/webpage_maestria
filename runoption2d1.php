<!-- check for all required fields first -->
<?php

	function report_missing_fields() {
		$PErr = ((is_P_bad()) ? '<b>orbital period is required</b>' : NULL);
                $rpErr = ((is_rp_bad()) ? '<b>planetary radius is required</b>' : NULL);
		$mpErr = ((is_mp_bad()) ? '<b>* planetary mass must be positive and non-zero</b>' : NULL);
		$MsErr = ((is_Ms_bad()) ? '<b>stellar mass is required</b>' : NULL);
                $RsErr = ((is_Rs_bad()) ? '<b>stellar radius is required</b>' : NULL);
                $TeffErr = ((is_Teff_bad()) ? '<b>effective temperature is required</b>' : NULL);
                $ZErr = ((is_Z_bad()) ? '<b>metallicity is required</b>' : NULL);
                $ProtErr = ((is_Prot_bad()) ? '<b>rotation period is required</b>' : NULL);
		$floorErr = ((is_floor_bad()) ? '<b>RV noise floor is required</b>' : NULL);
		$sigRVphotErr = ((is_sigRVphot_bad()) ? $_GET['sigRVphot'].' '.'<b>Photon-noise limited RV precision is required</b>' : NULL);
		$texpErr = ((is_texp_bad()) ? '<b>exposure time is required</b>' : NULL);
		$overheadErr = ((is_overhead_bad()) ? '<b>overhead is required</b>' : NULL);
		$KdetsigErr = ((is_Kdetsig_bad()) ? '<b>desired K detection significance is required</b>' : NULL);
		$NGPtrialsErr = ((is_NGPtrials_bad()) ? '<b>number of GP trials is required</b>' : NULL);
		$error_messages = array($PErr, $rpErr, $mpErr, $MsErr, $RsErr, $TeffErr, $ZErr, $ProtErr, $floorErr, $sigRVphotErr, $texpErr, $overheadErr, $KdetsigErr, $NGPtrialsErr);
		return $error_messages;
	}

	function is_P_bad() {
		if (($_GET['P']==NULL) || ($_GET['P']<0)) { $P_bad = True; } else { $P_bad = False;}
		return $P_bad; }
	function is_rp_bad() {
	        if (($_GET['rp']==NULL) || ($_GET['rp']<0)) { $rp_bad = True; } else { $rp_bad = False;}    
		return $rp_bad; }
        function is_mp_bad() {
	        if (($_GET['mp']<=0)  && ($_GET['mp']!=NULL)) { $mp_bad = True; } else { $mp_bad = False;}
		return $mp_bad; }
        function is_Ms_bad() {
	        if (($_GET['Ms']==NULL) || ($_GET['Ms']<0)) { $Ms_bad = True; } else { $Ms_bad = False;}    
		return $Ms_bad; }
	/*function is_Rs_bad() {
		if (((($_GET['sigRVact']==NULL) && ($_GET['sigRVeff']==NULL)) || (($_GET['sigRVact']==NULL) && ($_GET['NGPtrials']>0))) && 
		(($_GET['Rs']==NULL) || ($_GET['Rs']<0))) { $Rs_bad = True; } else { $Rs_bad = False;}
		return $Rs_bad; }*/
	function is_Rs_bad() {
		if (($_GET['Rs']==NULL) || ($_GET['Rs']<0)) { $Rs_bad = True; } else { $Rs_bad = False;}
		return $Rs_bad; }
        function is_Teff_bad() {
	        if (($_GET['Teff']==NULL) || ($_GET['Teff']<0)) { $Teff_bad = True; } else { $Teff_bad = False;} 
		return $Teff_bad; }
	function is_Z_bad() {
	        if ($_GET['Z']==NULL) { $Z_bad = True; } else { $Z_bad = False;}
		return $Z_bad; }
        function is_Prot_bad() {
	        if (($_GET['Prot']==NULL) || ($_GET['Prot']<=0)) { $Prot_bad = True; } else { $Prot_bad = False;} 
		return $Prot_bad; }
        function is_floor_bad() {
	        if (($_GET['floor']==NULL)) { $floor_bad = True; } else { $floor_bad = False;}
		return $floor_bad; }
        function is_sigRVphot_bad() {
	        if (($_GET['sigRVphot']==NULL) || ($_GET['sigphotRV']<0)) { $sigRVphot_bad = True; } else { $sigRVphot_bad = False;} 
		return $sigRVphot_bad; }
        function is_texp_bad() {
	        if (($_GET['texp']==NULL) || ($_GET['texp']<0)) { $texp_bad = True; } else { $texp_bad = False;}    
		return $texp_bad; }
        function is_overhead_bad() {
	        if (($_GET['overhead']==NULL) || ($_GET['overhead']<0)) { $overhead_bad = True; } else { $overhead_bad = False;}    
		return $overhead_bad; }
        function is_Kdetsig_bad() {
	        if (($_GET['Kdetsig']==NULL) || ($_GET['Kdetsig']<=0)) { $Kdetsig_bad = True; } else { $Kdetsig_bad = False;}    
		return $Kdetsig_bad; }
        function is_NGPtrials_bad() {
	        if (($_GET['NGPtrials']==NULL) || ($_GET['NGPtrials']<0)) { $NGPtrials_bad = True; } else { $NGPtrials_bad = False;}    
		return $NGPtrials_bad; }

	// reload the option2 page if missing any required fields
	// otherwise run the RVFC
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
	        if ((is_P_bad()) || (is_rp_bad()) || (is_mp_bad()) || (is_Ms_bad()) || (is_Rs_bad()) || (is_Teff_bad()) || (is_Z_bad()) || 
		(is_Prot_bad()) || (is_floor_bad()) || (is_sigRVphot_bad()) || (is_texp_bad()) || (is_overhead_bad()) || 
		(is_Kdetsig_bad()) || (is_NGPtrials_bad())) {
			$Errs = report_missing_fields();
			$PErr = $Errs[0];
			$rpErr = $Errs[1];
			$mpErr = $Errs[2];
			$MsErr = $Errs[3];
			$RsErr = $Errs[4];
			$TeffErr = $Errs[5];
			$ZErr = $Errs[6];
			$ProtErr = $Errs[7];
			$floorErr = $Errs[8];
			$sigRVphotErr = $Errs[9];
			$texpErr = $Errs[10];
			$overheadErr = $Errs[11];
			$KdetsigErr = $Errs[12];
			$NGPtrialsErr = $Errs[13];
			include "option2d1.php";
		} else {
			include "runRVFC.php";
		}
	}
?>
