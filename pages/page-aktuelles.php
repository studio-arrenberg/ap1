<?php

/**
 * 
 * Template Name: Aktuelles
 * Template Post Type: page
 * 
 */


// redirect before acf_form_head
wp_maintenance_mode();

// acf_form_head(); // before wp header !important!
get_header();

?>


<main id="site-content" role="main" data-track-content>

	<?php
		$text = __('Hier findest du alle Nachrichten, Umfragen und Veranstaltungen in deinem Quartier. Lerne die Menschen in deiner Nachbarschaft und ihre Projekte kennen oder erstelle selbst ein eigenes Projekt!', "quartiersplattform");
		reminder_card('helloss', 'Neuigkeiten und Projektupdates', $text );
		// 'Impressum', home_url( ).'/impressum'
	?>


	<?php 
		$args4 = array(
		'post_type'=> array('veranstaltungen', 'nachrichten', 'projekte', 'angebote', 'fragen', 'umfragen'), 
		'post_status'=>'publish', 
		'posts_per_page'=> 12,
		'orderby' => 'modified'
	);
	?>  
	
	<div class="grid" data-grid>
		<?php set_query_var( 'additional_info', true )?>
		<?php card_list($args4);?>
    </div>

	<!-- <script src="<?php echo get_template_directory_uri()?>/assets/js/bricks.js"></script> -->
    <script>
		const sizes = [
			{ columns: 1, gutter: 25 }, // assumed to be mobile, because of the missing mq property
			{ mq: '750px', columns: 2, gutter: 25 },
			{ mq: '800px', columns: 2, gutter: 100 },
			{ mq: '875px', columns: 2, gutter: 175 },
		]

		// create an instance
		const instance = Bricks({
			container: '.grid',
			packed:    'data-packed',        // if not prefixed with 'data-', it will be added
			sizes:     sizes,
			position: false
		})

		// bind callbacks
		instance
			.on('pack',   () => console.log('ALL grid items packed.'))
			.on('update', () => console.log('NEW grid items packed.'))
			.on('resize', size => console.log('The grid has be re-packed to accommodate a new BREAKPOINT.'))

		// start it up, when the DOM is ready
		// note that if images are in the grid, you may need to wait for document.readyState === 'complete'
		document.addEventListener('DOMContentLoaded', event => {
		instance
			.resize(true)     // bind resize handler
			.pack()           // pack initial items
		})
    </script>
	
</main><!-- #site-content -->

<div class="right-sidebar">
	<?php 
		// Projekte
		if (is_user_logged_in(  )) {
			get_template_part('components/smart-card/projekte');
			
			// Call to Action Card 
			//call_to_action_card('bg_red-light', 'angebot-erstellen', 'Teile ein Angebot', 'Biete deine Hilfe an und unterstütze dein Viertel.' );
			//call_to_action_card('bg_blue-light', 'frage-erstellen', 'Frage dein Quartier', 'Was wünscht du dir in deinem Viertel? Wie können dich deine Nachbarn unterstützen?' );
			call_to_action_card('bg_green', 'projekt-erstellen', 'Erstelle ein Projekt', 'Lege ein Projekt an, profitiere von der Community und verändere dein Quartier!' );
	
		}
		else {
			$text = 'Registriere dich auf deiner <span class="highlight"> Quartiersplattform</span> und schöpfe dein volles Potenzial aus!<br>';
		
			reminder_card('register', 'Werde Mitglied in deinem Quartier', $text, 'Jetzt Registieren', home_url( ).'/register' );
		}
	?>	
</div>

<?php get_footer(); ?>