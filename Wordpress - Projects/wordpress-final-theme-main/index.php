<?php get_header() ?>
<div class="container mt-5">
	<div class="row">
		<div class="col-md-8">

					<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				get_template_part('template-parts/content', 'archive');
			}
			echo "<br>";
			echo "<br>";
		}
		?>

				<?php the_posts_pagination();?>
		</div>

		<div class="col-md-2">
			<div class="ads">
			
			
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			</div>
		</div>

	</div>
</div>
<?php get_footer() ?>

<style type="text/css">
	.page-numbers{
		justify-content: center;
		width: auto;
		height: auto;
		background-color: #0c78ff;
		border: solid black 1px;
		border-radius: 4px;
		padding: 15px;
		text-decoration: none;
		color: white;
	}
	.current{
		font-weight: bold;
		background-color: #0046FF;
	}
	.page-numbers:hover{
		background-color: #1B00FF;
	}
</style>