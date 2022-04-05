<?php
  get_header(); // Call the theme’s header.php file.
?>
      <section id="pageContent">
        <?php
          // Start “The Wordpess Loop”
          if ( have_posts() ) :
              while (  have_posts() ) : the_post();
                  ?>
                  <article>
                  <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1> <!-- displays the title of our post. -->
                  <?php
                  echo 'index template';
                  the_content();  // display the content of our post.
                  ?>
                </article>
                  <?php
              endwhile; // There  are no more posts to display, let’s shut this down.
          else : // If we don’t have any posts, let’s display a custom  message below.
              _e( 'Sorry, no  posts matched your criteria.', 'textdomain' );
          endif; // OK, we can stop looking for posts now.
          // End of “The Loop”
         ?>
      </section>
<?php
  get_sidebar(); // Call the theme’s sidebar.php file.
  get_footer(); // Call the theme’s footer.php file.
?>
