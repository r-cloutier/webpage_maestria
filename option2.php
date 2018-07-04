<br><br>
<p style="font-size:24px" align="center">&nbsp;&nbsp;&nbsp;<b>Option 2: user-specified RV precision</b></p>&nbsp;&nbsp;&nbsp;

            <div style="padding-left:160px;padding-right:160px">
		To-be used when the photon-noise limited RV precision or the effective RV rms is known a-priori for the target
                of interest (often from previous runs of the RVFC or from independent calculations).
	    </div>
	    <div style="padding-left:180px;padding-right:160px">
	        <br><h5>Select a suboption:</h5>	
	        <br>
			<input type="submit" name="submit_2d1" style="font-weight:bold;" value="Option 2.1"/> 
			: select if no astrophysical RV noise sources are known. In this case the RV noise
			from stellar activity and from additional planets will be sampled from appropriate empirical distributions.<br><br><br>
			<input type="submit" name="submit_2d2" style="font-weight:bold;" value="Option 2.2"/>
			: select to set the individual RV noise sources explicitly.</br><br><br>
			<input type="submit" name="submit_2d3" style="font-weight:bold;" value="Option 2.3"/>
			: select to set the effective RV rms verbatim thus negating the need to specify any other RV noise source. This
			option is not compatible with RVFC calculations in the presence of correlated noise.
	    </div>
