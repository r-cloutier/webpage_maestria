<!-- check for all required fields first -->
<?php

	function report_missing_fields() {
		$PErr = ((is_P_bad()) ? '<b>orbital period is required</b>' : NULL);
                $rpErr = ((is_rp_bad()) ? '<b>planetary radius is required</b>' : NULL);
		$MsErr = ((is_Ms_bad()) ? '<b>stellar mass is required</b>' : NULL);
		$texpErr = ((is_texp_bad()) ? '<b>exposure time is required</b>' : NULL);
		$overheadErr = ((is_overhead_bad()) ? '<b>overhead is required</b>' : NULL);
		$KdetsigErr = ((is_Kdetsig_bad()) ? '<b>desired K detection significance is required</b>' : NULL);
		$NGPtrialsErr = ((is_NGPtrials_bad()) ? '<b>number of GP trials is required</b>' : NULL);
		$error_messages = array($PErr, $rpErr, $MsErr, $texpErr, $overheadErr, $KdetsigErr, $NGPtrialsErr);
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
	        if ((is_P_bad()) || (is_rp_bad()) || (is_Ms_bad()) || (is_texp_bad()) || (is_overhead_bad()) || (is_Kdetsig_bad()) ||
		(is_NGPtrials_bad())) {
			$Errs = report_missing_fields();
			$PErr = $Errs[0];
			$rpErr = $Errs[1];
			$MsErr = $Errs[2];
			$texpErr = $Errs[3];
			$overheadErr = $Errs[4];
			$KdetsigErr = $Errs[5];
			$NGPtrialsErr = $Errs[6];
			echo 'missing a required field';
			include "option2.php";
		} else {
			echo 'no missing fields';
			//include "runRVFC.php";
		}
	}
?>
