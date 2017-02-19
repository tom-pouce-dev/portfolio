<?php
	$key="779710054180cf47b130dc266601b2be52b280732c77602f5d3b4c7bb7277176";
	$partner="AntoineB";

	$dslashUID=$_REQUEST["dslashUID"];
	$api=$_REQUEST["api"];
	$nonce=$_REQUEST["nonce"];
	
	$action="stl";
	$sign=hash("sha256","$key|$partner|$nonce|$dslashUID|$action");
	$urlstl=$api."?action=$action&alias=$dslashUID&partner=$partner&nonce=$nonce&sign=$sign";
	header("location: $urlstl");
	
?>
