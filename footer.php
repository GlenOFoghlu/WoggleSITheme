<?php   $options = get_option('WoggleSITheme_theme_options'); ?>

    <div class="clear" style="padding-top:10px;"></div>
<br/>
<div id="ssbar">
	<div id="sstitle">Scout Sections:</div>
	<div id="sslinks"><?php wp_nav_menu(array('theme_location' => 'footer_menu')); ?></div>
</div>
<div id="footer">
	<div id="footerContent">
	<div id="SIFooter">
		<img src="<?php bloginfo('template_directory'); ?>/_/img/SILogolongFoot.png" />
	</div>
	<div id="groupInfoFooter">
		<?php echo $options['group_name']; ?><br/>
		<?php if ($options['group_address']!='') { echo $options['group_address'].'<br/>'; } ?>
		<?php if ($options['group_county']!='') { echo $options['group_county'].' Scout County'.'<br/>'; } ?>
	</div>
</div>
	<div id="legal">
		<strong><a href="#">Jump to Top</a></strong> | 
		<a href="#">Child Protection</a> | 
		<a href="#">Privacy</a> | 
		<a href="#">Credits</a>
	</div>
</div>
<br/>
<div id="copyright"><img src="<?php bloginfo('template_directory'); ?>/_/img/SI_icon.png"/> &copy; Copyright <?php echo date("Y"); ?>, <?php echo $options['group_name']; ?>, All Rights Reserved.<img src="<?php bloginfo('template_directory'); ?>/_/img/SI_icon.png"/></div>
<br/><br/>
</div>
	<?php wp_footer(); ?>
<!-- here comes the javascript -->
<!-- jQuery is called via the Wordpress-friendly way via functions.php -->
<!-- this is where we put our custom functions -->
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>
<!-- Asynchronous google analytics; this is the official snippet. -->	
</body>

</html>
y