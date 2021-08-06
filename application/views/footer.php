<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- back to top button -->
	<div id="back-to-top" class="w3-hide" style="position:fixed; right: 10px; bottom: 5px;">
		<a id="back-to-top-btn" class="w3-opacity" href="#" title="Back to top">
        	<span class="w3-xxlarge w3-text-black fa fa-arrow-circle-up"></span>
        </a>
	</div>
	
	<!-- footer -->
	<footer class="w3-bar w3-bottom w3-padding w3-teal w3-hide-small w3-tiny" role="footer">
		<a class="w3-bar-item w3-border-right w3-button" href="https://w3aplicativos.com.br" title="Site do desenvolvedor" target="_blank">
			APH - DiemounyX <?php echo ENVIRONMENT == 'development' ? 'Local' : ''; ?> &copy; <?php echo date('Y', time()); ?> - w3aplicativos.com.br
		</a>
		<div class="w3-bar-item w3-border-right">
			<span class="fa fa-map-marker"></span> Irecê - Bahia - Brasil
		</div>
	</footer>
	<!-- footer small devices -->
	<ul class="w3-ul  w3-bottom w3-teal w3-hide-medium w3-hide-large w3-tiny" role="footer">
		<li class="w3-center">
			<a class="w3-teal" href="https://w3aplicativos.com.br" title="Site do desenvolvedor" target="_blank">
				APH - DiemounyX <?php echo ENVIRONMENT == 'development' ? 'Local' : ''; ?> &copy; <?php echo date('Y', time()); ?> - w3aplicativos.com.br
			</a>
		</li>
		<li class="w3-center">
			<span class="fa fa-map-marker"></span> Irecê - Bahia - Brasil
		</li>
	</ul>
	
	<!-- modal -->
	<div class="w3-modal" id="main_modal" style="display: none">
		<div class="w3-modal-content">
			<span onclick="toggleModal('#main_modal')" class="w3-button w3-display-topright w3-red">&times;</span>
			<div id="main_modal_content"></div>
		</div>
	</div>
	</body>
</html>