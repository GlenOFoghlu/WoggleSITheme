<?php
    // get theme options
    $options = get_option('scout_theme_options');    
?>
    <div class="clear" style="padding-top:10px;"></div>
<br />
<div id="ssbar">
<div id="sstitle">Scout Sections:</div>
<div id="sslinks">
<?php wp_nav_menu(array('theme_location' => 'footer_menu')); ?>
</div>
</div>

<br />

<div id="footer">

<?php echo $options['group_name']; ?><br />
<?php if ($options['group_address']!='') { echo $options['group_address'].'<br />'; } ?>
<?php if ($options['group_charity']!='') { echo 'Registered Charity: <a href="http://www.charity-commission.gov.uk/SHOWCHARITY/RegisterOfCharities/CharityWithoutPartB.aspx?RegisteredCharityNumber='.$options['group_charity'].'" target="_blank">'.$options['group_charity'].'</a><br />'; } ?>



<strong><a href="#">Jump to Top</a></strong> | <a href="/uat/scouts/legal/terms">Terms</a> | <a href="/uat/scouts/legal/privacy">Privacy</a> | <a href="/uat/scouts/credits">Credits</a>
</div>
<br />
<center> &copy; Copyright <?php echo date("Y"); ?>, <?php echo $options['group_name']; ?>, All Rights Reserved.</center>
<br /><br />
</div>

	<?php wp_footer(); ?>


<!-- here comes the javascript -->

<!-- jQuery is called via the Wordpress-friendly way via functions.php -->

<!-- this is where we put our custom functions -->
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>



<!-- Asynchronous google analytics; this is the official snippet. -->


	
</body>

</html>
