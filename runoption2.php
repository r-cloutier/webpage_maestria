<!-- check for all required fields first -->
<?php

	function report_missing_fields() {
		$PErr = ((is_P_bad()) ? '<b>orbital period is required</b>' : NULL);
                $rpErr = ((is_rp_bad()) ? '<b>planetary radius is required</b>' : NULL);
		$MsErr = ((is_Ms_bad()) ? '<b>stellar mass is required</b>' : NULL);
                $RsErr = ((is_Rs_bad()) ? '<b>* stellar radius is required to sample "RV activity rms"</b>' : NULL);
                $TeffErr = ((is_Teff_bad()) ? '<b>* effective temperature is required to sample "RV activity rms" and/or "RV rms from additional
		planets"</b>' : NULL);
                $ZErr = ((is_Z_bad()) ? '<b>* metallicity is required to sample "RV activity rms"</b>' : NULL);
                $ProtErr = ((is_Prot_bad()) ? '<b>* rotation period is required to sample "RV activity rms"</b>' : NULL);
		$floorErr = ((is_floor_bad()) ? '<b>* RV noise floor is required to calculate "Effective RV rms"</b>' : NULL);
		$texpErr = ((is_texp_bad()) ? '<b>exposure time is required</b>' : NULL);
		$overheadErr = ((is_overhead_bad()) ? '<b>overhead is required</b>' : NULL);
		$KdetsigErr = ((is_Kdetsig_bad()) ? '<b>desired K detection significance is required</b>' : NULL);
		$NGPtrialsErr = ((is_NGPtrials_bad()) ? '<b>number of GP trials is required</b>' : NULL);
		$error_messages = array($PErr, $rpErr, $MsErr, $RsErr, $TeffErr, $ZErr, $ProtErr, $floorErr, $texpErr, $overheadErr, $KdetsigErr, $NGPtrialsErr);
		return $error_messages;
	}

	function is_P_bad() {
		if (($_GET['P']==NULL) || ($_GET['P']<0)) { $P_bad = True; } else { $P_bad = False;}
		return $P_bad; }
	function is_rp_bad() {
	        if (($_GET['rp']==NULL) || ($_GET['rp']<0)) { $rp_bad = True; } else { $rp_bad = False;}    
		return $rp_bad; }
        function is_Ms_bad() {
	        if (($_GET['Ms']==NULL) || ($_GET['Ms']<0)) { $Ms_bad = True; } else { $Ms_bad = False;}    
		return $Ms_bad; }
	function is_Rs_bad() {
		if (($_GET['sigRVact']==NULL) && (($_GET['Rs']==NULL) || ($_GET['Rs']<0))) { $Rs_bad = True; } else { $Rs_bad = False;}
		return $Rs_bad; }
        function is_Teff_bad() {
	        if ((($_GET['sigRVact']==NULL) || ($_GET['sigRVplanets']==NULL)) && (($_GET['Teff']==NULL) || ($_GET['Teff']<0))) { $Teff_bad = True; }
		else { $Teff_bad = False;} 
		return $Teff_bad; }
	function is_Z_bad() {
	        if (($_GET['sigRVact']==NULL) && (($_GET['Z']==NULL) || ($_GET['Z']<0))) { $Z_bad = True; } else { $Z_bad = False;}
		return $Z_bad; }
        function is_Prot_bad() {
	        if (($_GET['sigRVact']==NULL) && (($_GET['Prot']==NULL) || ($_GET['Prot']<0))) { $Prot_bad = True; } else { $Prot_bad = False;}
		return $Prot_bad; }
        function is_floor_bad() {
	        if (($_GET['sigRVeff']==NULL) && (($_GET['floor']==NULL) || ($_GET['floor']<0))) { $floor_bad = True; } else { $floor_bad = False;}
		return $floor_bad; }
        function is_texp_bad() {
	        if (($_GET['texp']==NULL) || ($_GET['texp']<0)) { $texp_bad = True; } else { $texp_bad = False;}    
		return $texp_bad; }
        function is_overhead_bad() {
	        if (($_GET['overhead']==NULL) || ($_GET['overhead']<0)) { $overhead_bad = True; } else { $overhead_bad = False;}    
		return $overhead_bad; }
        function is_Kdetsig_bad() {
	        if (($_GET['Kdetsig']==NULL) || ($_GET['Kdetsig']<0)) { $Kdetsig_bad = True; } else { $Kdetsig_bad = False;}    
		return $Kdetsig_bad; }
        function is_NGPtrials_bad() {
	        if (($_GET['NGPtrials']==NULL) || ($_GET['NGPtrials']<0)) { $NGPtrials_bad = True; } else { $NGPtrials_bad = False;}    
		return $NGPtrials_bad; }
	

	// reload the option2 page if missing any required fields
	// otherwise run the RVFC
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
	        if ((is_P_bad()) || (is_rp_bad()) || (is_Ms_bad()) || (is_Rs_bad()) || (is_Teff_bad()) || (is_Z_bad()) || (is_Prot_bad()) ||
		(is_floor_bad()) || (is_texp_bad()) || (is_overhead_bad()) || (is_Kdetsig_bad()) ||
		(is_NGPtrials_bad())) {
			$Errs = report_missing_fields();
			$PErr = $Errs[0];
			$rpErr = $Errs[1];
			$MsErr = $Errs[2];
			$RsErr = $Errs[3];
			$TeffErr = $Errs[4];
			$ZErr = $Errs[5];
			$ProtErr = $Errs[6];
			$floorErr = $Errs[7];
			$texpErr = $Errs[8];
			$overheadErr = $Errs[9];
			$KdetsigErr = $Errs[10];
			$NGPtrialsErr = $Errs[11];
			echo 'missing a required field';
			include "option2.php";
		} else {
			echo 'no missing fields';
			//include "runRVFC.php";
		}
	}
?>
