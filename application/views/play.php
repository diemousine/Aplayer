<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<form class="w3-container w3-padding-32">
	<input type="url" class="w3-input" name="url" placeholder="url" />
</form>
<div class="w3-content w3-card w3-white">
	<ul class="w3-ul" />
		<?php
		$i = 1;
		foreach($folders as $row):
		?><a href="?url=<?php echo urlencode(($url . $row['href'])); ?>" >
			<li class="w3-hover-blue w3-border-bottom"><?php echo html_escape(utf8_decode($row['text'])); ?></li>
		</a>
	<?php 
	$i++;
	endforeach;
	?></ul>
</div>
<div class="w3-content w3-center">
	<?php
	$i = 1;
	foreach($links as $row):
	?><audio <?php echo "id=\"a$i\""; ?> controls preload="metadata" class="w3-hide audio" >
		<source src="<?php echo($url . $row['href']); ?>" type="audio/mpeg">
	</audio>
<?php 
$i++;
endforeach;
?></div>
<div class="w3-content w3-card w3-white">
	<ul class="w3-ul" />
		<?php
		$i = 1;
		foreach($links as $row):
		?><li id="<?php echo "ta$i"; ?>" class="maozinha w3-hover-blue lista" onclick="playTrack('<?php echo "a$i"; ?>')" ><?php echo $i . " - " . html_escape(utf8_decode($row['text'])); ?></li>
	<?php 
	$i++;
	endforeach;
	?></ul>
</div>
<script>
track = document.createElement("AUDIO");
track.id = "a0";
function playTrack(trackId) {
	if(track.id === trackId) track.pause();
	else {
		track.load();
		track.pause();
		$("#"+track.id).toggleClass("w3-hide");
		$("#t"+track.id).toggleClass("w3-blue");
		track = document.getElementById(trackId);
		$("#"+track.id).toggleClass("w3-hide");
		$("#t"+track.id).toggleClass("w3-blue");
		track.play();
		track.addEventListener('ended', function() { nextTrack(); });
	}
}
function nextTrack() {
	if($("#"+track.id).next().get(0).id != 'undefined') playTrack($("#"+track.id).next().get(0).id);
}
</script>
<br />
<br />
<br />
<br />