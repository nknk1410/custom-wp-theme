<?php get_header(); ?>

<div class="container py-30">
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <h1 class="py-30 text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
            <div class="pb-60"><?php the_content(); ?></div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No posts found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
