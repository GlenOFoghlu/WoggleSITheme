<div id="sidebar">

<?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('purple-sidebar')) : ?>

<?php dynamic_sidebar( 'orange-sidebar' ); ?>

<?php dynamic_sidebar( 'green-sidebar' ); ?>


<!-- TO DO: finish Social Media widget
<div class="sidebar-orange-box">
	<div class="sidebar-orange-box-title">Keep up-to-date</div>
	<div class="sidebar-orange-box-content">
		<ul class="social-links">
			<li><a href="/uat/scouts/update-contact-details/">Update your details</a></li>
		</ul>
	</div>
</div>
-->

<div class="clear" style="padding-top:10px;"></div>

<?php else : ?>
    
            Widgets empty! Eek!

<?php endif; ?>

</div>