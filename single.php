 <?php get_header();
 while(have_posts()){
     the_post()
 
 ?>

<h2 class="page-heading"><?php the_title();?></h2>
    <div id="post-container">
      <section id="blogpost">
        <div class="card">
          <div class="card-meta-blogpost">
            posted by <?php the_author();?> on <?php the_time('F j,Y');?>
 <?php if(get_post_type()=='post'){?> in <a href="#"><?php echo get_the_category_list(',');?></a><?php } ?>
          </div>
          <div class="card-image">
            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="Card Image">
          </div>
          <div class="card-description">
           <?php the_content();?>
          </div>
        </div>

        <div id="comments-section">
             <?php
      $comments_args = array(
        // Change the title of send button 
        'label_submit' => __( 'Send', 'textdomain' ),
        // Change the title of the reply section
        'title_reply' => __( 'Write a Reply or Comment', 'textdomain' ),
        // Remove "Text or HTML to be displayed after the set of comment fields".
        'comment_notes_after' => '',
        // Redefine your own textarea (the comment body).
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
);
comment_form( $comments_args );
           
            $comments_number= get_comments_number();
            if($comments_number!=0){
                ?>
                <div class="comments">
                <h3>what others say</h3>
                <ol class="all-comments">
                <?php $comments=get_comments(array(
                    'post_id'=>$post->ID,
                    'status'=>'approve'
                ));
                wp_list_comments(array(
                    'per_page'=>15
                ), $comments);
               ?>
                </ol></div>
                <?php
            }
             ?>
        </div>
      </section>
 <?php } ?>
      <aside id="sidebar">
        <?php dynamic_sidebar('main_sidebar');?>
      </aside>
    </div>


<?php get_footer();?>


