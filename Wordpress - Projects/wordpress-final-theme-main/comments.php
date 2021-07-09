<?php if (post_password_required()) {
	return;
} ?>
<?php comment_form(); ?>
<div id="comments" class="comments-area">
	<?php if (have_comments()) { ?>
		<h4 class="comments-title"><?php comments_number(__('No Comments', 'your-text-domain'), __('1 Comment', 'your-text-domain'), '% ' . __('Comments', 'your-text-domain')); ?></h4>
		<span class="title-line"></span>
		<ol class="comment-list">
			<?php wp_list_comments(array('avatar_size' => 70, 'style' => 'ul', 'callback' => 'your_theme_slug_comments', 'type' => 'all')); ?>
		</ol>
		<?php the_comments_pagination(array('prev_text' => '<i class="fa fa-angle-left" aria-hidden="true"></i> <span class="screen-reader-text">' . __('Previous', 'your-text-domain') . '</span>', 'next_text' => '<span class="screen-reader-text">' . __('Next', 'your-text-domain') . '</span> <i class="fa fa-angle-right" aria-hidden="true"></i>',)); ?>
	<?php } ?>
	<?php if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) { ?>
		<p class="no-comments"><?php _e('Comments are closed.', 'your-text-domain'); ?></p>
	<?php } ?>
	
</div>


<style type="text/css">
	/* Images */

	.img-responsive {
		display: block;
		max-width: 100%;
		height: auto;
		margin: 0px auto;
	}

	.img-circle {
		border-radius: 50%;
	}

	/* Comments */

	textarea,
	input {
		border: 1px solid #e4e4e4;
	}

	textarea {
		width: 80%;
		height: 35px;	
	}
	textarea:focus {
	  color: #495057;
	  background-color: #fff;
	  border-color: #80bdff;
	  outline: 0;
	  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
	/*
	textarea:focus{
		background-color: #dbdbdb;
	}
    */
	.comment-list,
	.children {
		list-style: none;
	}

	ul.children {
		list-style: none;
		padding-left: 0px;
		margin-left: 0px;
	}

	.comment-wrap {
		border-bottom: 1px solid #ccc;
		padding-bottom: 40px;
		margin-bottom: 50px;
		position: relative;
	}

	.comment-wrap .comments-title {
		padding-top: 60px;
	}

	.comment-wrap .comment-img {
		float: left;
		margin-right: 20px;
		padding-bottom: 25px;
	}

	.comment-author {
		text-align: left;
	}

	.comment-reply {
		position: absolute;
		top: 0px;
		right: 0px;
		font-style: italic;
		padding: 5px 5px;
		}

	.comment-author,
	.comment-author a {
		font-size: 14px;
		text-transform: uppercase;
		letter-spacing: 2px;
		margin-bottom: 2px;
	}

	.comment-date {
		font-size: 10px;
		text-transform: uppercase;
		letter-spacing: 2px;
		font-style: italic;
		display: block;
		padding-bottom: 7px;
	}

	.depth-2 .comment-wrap {
		padding-left: 30px;
	}

	.depth-3 .comment-wrap {
		padding-left: 60px;
	}

	.depth-4 .comment-wrap {
		padding-left: 90px;
	}

	.depth-5 .comment-wrap {
		padding-left: 120px;
	}

	.depth-6 .comment-wrap {
		padding-left: 150px;
	}

	.depth-7 .comment-wrap {
		padding-left: 180px;
	}

	.depth-8 .comment-wrap {
		padding-left: 210px;
	}

	.depth-9 .comment-wrap {
		padding-left: 240px;
	}

	.depth-10 .comment-wrap {
		padding-left: 270px;
	}

	#commentform #comment,
	#commentform #author,
	#commentform #email,
	#commentform #url {
		display: block;
		width: 100%;
	}

	#commentform input[type="submit"] {
		display: inline-block;
		padding: 8px 15px;
		border: 1px solid #e4e4e4;
		font-size: 10px;
		text-transform: uppercase;
		letter-spacing: 3px;
		background: #fff;
		margin-top: 15px;
	}

	#commentform input[type="submit"]:hover {
		background: #e2fcff;
	}

	.title-line {
		border-top: 1px dotted #ccc;
		display: block;
		max-width: 30%;
		margin: 0 auto 25px;
	}

	.comment-reply-link {
		color: red;
	}

	/* Responsive */

	@media (max-width: 767px) {

		.comment-list,
		.children {
			padding-left: 0px;
		}

		.comment-wrap .comment-img {
			float: none;
			margin: 0px;
			width: 100%;
			padding-bottom: 0px;
		}

		.comment-img>img {
			display: block;
			margin: 0px auto;
		}

		.comment-author,
		.comment-author a,
		.comment-date {
			text-align: center;
		}

		.depth-2 .comment-wrap,
		.depth-3 .comment-wrap,
		.depth-4 .comment-wrap,
		.depth-5 .comment-wrap,
		.depth-6 .comment-wrap,
		.depth-7 .comment-wrap,
		.depth-8 .comment-wrap,
		.depth-9 .comment-wrap,
		.depth-10 .comment-wrap {
			padding-left: 0px;
		}

		.comment-reply {
			position: relative;
			text-align: center;
			display: block;
			margin-top: 25px;
		}
	}
	.comment-reply-title{
		display: none;
	}
	.logged-in-as{
		display: none;
	}
</style>