<div class="[ header ] [ flex ]">
<h1 class="[ site-title ]"><a class="[ upper font-size:s3 font:light ]"href="<?php echo get_bloginfo( 'wpurl' ); ?>"><?php echo get_bloginfo( 'name' ); ?></a></h1>
<?php $title = explode('Brooke Kaufman', get_bloginfo('description')); ?>

<p class="[ site-description ]"><?php echo $title[0]; 

if (count($title) > 1) { 
  echo '<a href="/about" class="[ link ] ">Brooke Kaufman</a>';
}
for ($i = 1; $i < count($title); $i++) {
  echo $title[$i];
}?>

</p>
</div>