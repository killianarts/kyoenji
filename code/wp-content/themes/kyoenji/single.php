<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <div class="grid md:grid-cols-3 gap-6">
        <?php while (have_posts()) : the_post(); ?>
            <article class="bg-white shadow-md rounded-lg p-6">
                <?php if (has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-48 object-cover rounded">
                <?php endif; ?>
                <h2 class="text-xl font-bold mt-4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="text-gray-600 mt-2"><?php the_content(); ?></p>
                <a href="<?php the_permalink(); ?>" class="text-blue-500 hover:underline">Read More</a>
            </article>
        <?php endwhile; ?>
    </div>
    <?php the_posts_pagination(); ?>
<?php else : ?>
    <p class="text-center text-gray-500">No posts found.</p>
<?php endif; ?>

<?php get_footer(); ?>
