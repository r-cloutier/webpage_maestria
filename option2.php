<br><br>
<p style="font-size:24px" align="center">&nbsp;&nbsp;&nbsp;<b>Option 2: user-specified RV precision</b></p>&nbsp;&nbsp;&nbsp;

            <div style="padding-left:160px;padding-right:160px">
		Option 2 should be used when either the photon-noise limited RV precision or the effective RV rms are known a-priori for the target 
		of interest (often from previous runs of the RVFC or from independent calculations). To proceed, select one of the sub-options below 
		based on the user's prior knowledge of the various RV noise sources.
	    </div>
	    <div style="padding-left:180px;padding-right:160px">
	        <br>
			<input type="submit" name="submit_2d1" style="font-weight:normal;" value="Option 2.1"/> <br>
			Select <b>option 2.1</b> if no astrophysical RV noise sources are known. In this case the RV noise
			from stellar activity and from additional planets will be sampled from appropriate empirical distributions.<br><br><br>
			<input type="submit" name="submit_2d2" style="font-weight:normal;" value="Option 2.2"/><br>
			Select <b>option 2.2</b> to set the individual RV noise sources explicitly.</br><br><br>
			<input type="submit" name="submit_2d3" style="font-weight:normal;" value="Option 2.3"/><br> 
			Select <b>option 2.3</b> to set the effective RV rms verbatim thus negating the need to specify any other RV noise source. This
			option is not compatible with GP calculations.
	    </div>
