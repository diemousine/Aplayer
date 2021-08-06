<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Overlay -->
<div id="overlay" class="w3-overlay" onclick="w3.hide('#main_mobilebar'); w3.hide('#overlay')"></div>

<!-- side bar -->
<nav id="main_mobilebar" class="w3-sidebar w3-bar-block w3-teal w3-card-4 w3-animate-left w3-hide-medium w3-hide-large" role="menubar" aria-label="Main Mobile Bar" style="display:none; z-index: 2">
    <button class="w3-button w3-right" onclick="w3.hide('#main_mobilebar'); w3.hide('#overlay')" role="menuitem"><span class="fa fa-close"></span></button>
    <?php
    /*
     * O array é percorrido para identificar quais linhas são dropdown e quais são links
     * se a linha for um dropdown, uma div é impressa.
     */
    foreach ($menus['main'] as $element):
        if ($element['dropdown'] && is_null($element['parent_id'])):

	?><div id="ddb_sb_<?php echo $element['id']; ?>" class="w3-dropdown-click w3-border-bottom" role="dropdown">
		<button class="dbtn w3-button" onclick="w3.toggleShow('#ddc_sb_<?php echo $element['id']; ?>')" role="menuitem" aria-haspopup="true">
			<span class="<?php echo $element['icon']; ?>"></span> <?php echo $element['title']; ?> 
			<i class="fa fa-caret-down"></i>
		</button>
		<div id="ddc_sb_<?php echo $element['id']; ?>" class="dctt w3-dropdown-content w3-bar-block w3-card-4" role="none" style="display:none">
			<?php
			/*
			 * Logo após imprimir a div, é verificado quais links no array
			 * pertencem ao dropdown em questão. Aqueles links encontrados serão impressos.
			 */
			foreach ($menus['main'] as $subelement):
				if ($subelement['parent_id'] === $element['id']):

			// se o link for externo, usa o href puro
					if ($subelement['external']):
			?><a href="<?php echo $subelement['href']; ?>" target="_blank" class="w3-bar-item w3-button" onclick="w3.hide('#main_mobilebar'); w3.hide('#overlay')" title="<?php echo $subelement['title']; ?>" role="menuitem" >
				<?php

			// se o link for modal, usa o href com loadModal()
					elseif($subelement['modal']):
			?><a class="w3-bar-item w3-button" onclick="loadModal('<?php echo base_url($subelement['href']); ?>'); w3.hide('#main_mobilebar'); w3.hide('#overlay')" title="<?php echo $subelement['title']; ?>" role="menuitem">
				<?php

			// se o link for interno, usa o href com base_url()
					else:
			?><a href="<?php echo base_url($subelement['href']); ?>" class="w3-bar-item w3-button" onclick="w3.hide('#main_mobilebar'); w3.hide('#overlay')" title="<?php echo $subelement['title']; ?>" role="menuitem">
				<?php

					endif;

				?><span class="<?php echo $subelement['icon']; ?>"></span> <?php echo $subelement['title']; ?> 
			</a>
		<?php
				endif;
			endforeach;
		// Ao terminar a montagem do dropdown, a div é fechada.
		?></div>
	</div>
	<?php
		
		// Se a linha for um link, um botão é impresso
		elseif ($element['parent_id'] === NULL):
			
			// se o link for externo, usa o href puro
            if ($element['external']):
	?><a href="<?php echo $element['href']; ?>" target="_blank" class="w3-bar-item w3-button w3-border-bottom" onclick="w3.hide('#main_mobilebar'); w3.hide('#overlay')" title="<?php echo $element['title']; ?>" role="menuitem" >
		<?php

			elseif($element['modal']):

	// se o link for modal, usa o href com loadModal()
	?><a class="w3-bar-item w3-button w3-border-bottom" onclick="loadModal('<?php echo $element['href']; ?>'); w3.hide('#main_mobilebar'); w3.hide('#overlay')" title="<?php echo $element['title']; ?>" role="menuitem">
		<?php

			else:

	// se o link for interno, usa o href com base_url()
	?><a href="<?php echo base_url($element['href']); ?>" class="w3-bar-item w3-button w3-border-bottom" onclick="w3.hide('#main_mobilebar'); w3.hide('#overlay')" title="<?php echo $element['title']; ?>" role="menuitem">
		<?php

			endif;

		?><span class="<?php echo $element['icon']; ?>"></span> <?php echo $element['title']; ?> 
	</a>
<?php
		endif;
	endforeach;
// A rotina que percorre o array é finalizada.
?></nav>

<!-- mobile top bar -->
<nav id="main_mobiletopbar" class="w3-bar w3-teal w3-card w3-hide-medium w3-hide-large" role="menubar" aria-label="Mobile Top Bar">
    <button class="w3-button" onclick="w3.show('#main_mobilebar'); w3.show('#overlay')" role="menuitem" aria-haspopup="true"><span class="fa fa-bars"></span></button>
</nav>

<!-- top bar -->
<nav id="main_topbar" class="w3-bar w3-border-bottom w3-hide-small w3-teal" role="menubar" aria-label="Main Top Bar">
    <?php
    /*
     * O array é percorrido para identificar quais linhas são dropdown e quais são links
     * se a linha for um dropdown, uma div é impressa.
     */
    foreach ($menus['main'] as $element):
        if ($element['dropdown'] == TRUE & $element['parent_id'] === NULL):
	
	?><div id="ddb_<?php echo $element['id']; ?>" class="w3-dropdown-hover w3-<?php echo $element['pos']; ?>" role="dropdown">
		<button class="w3-button" onclick="w3.toggleShow('ddc_<?php echo $element['id']; ?>')" role="menuitem" aria-haspopup="true">
			<span class="<?php echo $element['icon']; ?>"></span> <?php echo $element['title']; ?> 
			<i class="fa fa-caret-down"></i>
		</button>
		<div id="ddc_<?php echo $element['id']; ?>" class="w3-dropdown-content w3-bar-block w3-card" role="none" <?php echo ($element['pos']=='right') ? 'style="right:0"' : ''; ?>>
			<?php
			/*
			 * Logo após imprimir a div, é verificado quais links no array
			 * pertencem ao dropdown em questão. Aqueles links encontrados serão impressos.
			 */
			foreach ($menus['main'] as $subelement):
				if ($subelement['parent_id'] === $element['id']):

			// se o link for externo, usa o href puro
					if ($subelement['external']):
			?><a href="<?php echo $subelement['href']; ?>" target="_blank" class="w3-bar-item w3-button w3-border-bottom" title="<?php echo $subelement['title']; ?>" role="menuitem" >
				<?php

			// se o link for modal, usa o href com loadModal()
					elseif($subelement['modal']):
			?><a onclick="loadModal('<?php echo base_url($subelement['href']) ;?>')" class="w3-bar-item w3-button w3-border-bottom" title="<?php echo $subelement['title']; ?>" role="menuitem">
				<?php

			// se o link for interno, usa o href com base_url()
					else:
			?><a href="<?php echo base_url($subelement['href']); ?>" class="w3-bar-item w3-button w3-border-bottom" title="<?php echo $subelement['title']; ?>" role="menuitem">
				<?php

					endif;

				?><span class="<?php echo $subelement['icon']; ?>"></span> <?php echo $subelement['title']; ?> 
			</a>
		<?php
				endif;
			endforeach;
		// Ao terminar a montagem do dropdown, a div é fechada.
		?></div>
	</div>
	<?php
		// Se a linha for um link, um botão é impresso
        elseif ($element['parent_id'] === NULL):

	// se o link for externo, usa o href puro
            if ($element['external']):
	?><a href="<?php echo $element['href']; ?>" target="_blank" class="w3-bar-item w3-button w3-<?php echo $element['pos']; ?>" title="<?php echo $element['title']; ?>" role="menuitem" >
		<?php

	// se o link for modal, usa o href com loadModal()
			elseif($element['modal']):

	?><a onclick="loadModal('<?php echo $element['href']; ?>')" class="w3-bar-item w3-button w3-<?php echo $element['pos']; ?>"  title="<?php echo $element['title']; ?>" role="menuitem">
		<?php

	// se o link for interno, usa o href com base_url()
			else:

	?><a href="<?php echo base_url($element['href']); ?>" class="w3-bar-item w3-button w3-<?php echo $element['pos']; ?>" title="<?php echo $element['title']; ?>" role="menuitem">
		<?php

			endif;

		?><span class="<?php echo $element['icon']; ?>"></span> <?php echo $element['title']; ?> 
	</a>
<?php
        endif;
    endforeach;
?></nav>