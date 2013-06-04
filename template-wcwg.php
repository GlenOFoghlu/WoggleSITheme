<?php
/*
Template Name: Where Can We Go?
*/
?>
<?php get_header(); ?>

<div id="main-content">
<div id="page-content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="post" id="post-<?php the_ID(); ?>">
            <h1><?php the_title(); ?></h1>
            <div class="entry">
                <?php the_content(); ?>
            </div>
        
    <?php endwhile; endif; ?>
    
    <?php


    
$url = 'http://www.wcwg.info/feeds/localeventsrss.aspx?a=00404&p='.$options['wcwg_rss'].'&c=0011011100010000001&d=25';    
$xml = simplexml_load_file($url);

$title=$xml->channel->title;
$distance=$xml->channel->Distance;
$postcode=$xml->channel->Postcode;
echo '<p>Events kindly provided and updated by <a href="http://www.wherecanwego.com/" target="_blank">WhereCanWeGo.com</a></p>';

foreach($xml->channel->item as $event)
{
    echo '<div class="wcwg_event" style="border:1px solid #ccc;margin-bottom:10px;padding:10px;">
    <h3>'.$event->dates.' - <a href="'.$event->link.'" target="_blank">'.$event->title.'</a></h3>
    <p><b>Where: </b>'.$event->venue.'</p>
    <p><b>Details: </b>'.$event->description.'</p>
    <p><a href="'.$event->link.'" target="_blank">More info...</a></p>
    </div>';
}

echo '<p>Showing events within '.$distance.' miles from '.$postcode.'</p>';

?>
       </article>
    
<br /><br />
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>  

</div>
<div id="main-sidebar">

<?php get_sidebar(); ?>

</div>
</div>

<?php get_footer(); ?>
