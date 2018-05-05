<!-- check for all required fields first -->
<?php

	function report_missing_fields() {
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
		$error_messages = array($PErr, $rpErr, $mpErr, $magErr, $MsErr, $RsErr, $TeffErr, $ZErr, $vsiniErr, $ProtErr, 
		$KdetsigErr, $NGPtrialsErr);
		return $error_messages;
	}

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
	        if (($_GET['Prot']==NULL) || ($_GET['Prot']<=0)) { $Prot_bad = True; } else { $Prot_bad = False;} 
		return $Prot_bad; }
        function is_Kdetsig_bad() {
	        if (($_GET['Kdetsig']==NULL) || ($_GET['Kdetsig']<0)) { $Kdetsig_bad = True; } else { $Kdetsig_bad = False;}    
		return $Kdetsig_bad; }
        function is_NGPtrials_bad() {
	        if (($_GET['NGPtrials']==NULL) || ($_GET['NGPtrials']<0)) { $NGPtrials_bad = True; } else { $NGPtrials_bad = False;}    
		return $NGPtrials_bad; }
	

	// reload the option2 page if missing any required fields
	// otherwise run the RVFC
	if ($_SERVER["REQUEST_METHOD"] == "GET") {
		if ((is_P_bad()) || (is_rp_bad()) || (is_mp_bad()) || (is_mag_bad()) || (is_Ms_bad()) || (is_Rs_bad()) || (is_Teff_bad()) ||
		(is_Z_bad()) || (is_vsini_bad()) || (is_Prot_bad()) || (is_Kdetsig_bad()) || (is_NGPtrials_bad())) {
			$Errs = report_missing_fields();
			$PErr = $Errs[0];
			$rpErr = $Errs[1];
			$mpErr = $Errs[2];
			$magErr = $Errs[3];
			$MsErr = $Errs[4];
			$RsErr = $Errs[5];
			$TeffErr = $Errs[6];
			$ZErr = $Errs[7];
			$vsiniErr = $Errs[8];
			$ProtErr = $Errs[9];
			$KdetsigErr = $Errs[10];
			$NGPtrialsErr = $Errs[11];
			include "option1d1.php";
		} else {
			include "runwarning.php";
		}
	}
?>
