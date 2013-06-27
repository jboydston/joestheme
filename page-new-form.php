<?php
/*
Template Name: The Form
*/

if( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) &&  $_POST['action'] == "new_post") {

	$title =  $_POST['title'];
	$description = $_POST['description'];
	$tags = $_POST['post_tags'];

	// ADD THE FORM INPUT TO $new_post ARRAY
	$new_post = array(
	'post_title'	=>	$title,
	'post_content'	=>	$description,
	'post_category'	=>	array(32),  // Usable for custom taxonomies too
	'tags_input'	=>	array($tags),
	'post_status'	=>	'Live',           // Choose: publish, preview, future, draft, etc.
	'post_type'	=>	'post'  //'post',page' or use a custom post type if you want to
	);

	//SAVE THE POST
	$pid = wp_insert_post($new_post);

    //SET OUR TAGS UP PROPERLY
	wp_set_post_tags($pid, $tags);
	add_post_meta($pid, 'livestatus', 'true', true);

	//REDIRECT TO THE NEW POST ON SAVE
	$link = get_permalink( $pid );
	wp_redirect( $link );


} // END THE IF STATEMENT THAT STARTED THE WHOLE FORM








get_header(); ?>

	<div id="container">
	<div id="content" role="main">
	<div class="form-content">

	<!-- FORM -->
	<div class="joes-form-container">
				<form id="new_post" name="new_post" method="post" action="" class="joes-form" enctype="multipart/form-data">


				<!-- title -->
				<fieldset name="name">
					<label for="title"></label>
					<input type="text" id="title" value="Headline - Maximum 72 characters" size="91" required tabindex="5" maxlength="72" name="title" />
				</fieldset>


				<!-- content -->
				<fieldset class="content">
					<label for="description"></label>
					<textarea id="description" tabindex="15" name="description" cols="80" required rows="10">Tell your story here.</textarea>
				</fieldset>

				<!-- tags -->
				<fieldset class="tags">
					<label for="post_tags">Hashtag:</label>
					<input type="text" value="#" tabindex="35" name="post_tags" id="post_tags" />
				</fieldset>

				<!-- button -->				
				<fieldset class="submit">
					<input type="submit" value="Break some news" tabindex="40" id="submit" name="submit" />
				</fieldset>

				<input type="hidden" name="action" value="new_post" />
<?php wp_nonce_field( 'new-post' ); ?>
				</form>
			
		</div> <!-- END joes-form-container -->
		
		</div><!-- form-content -->
        </div><!-- #content -->
        </div><!-- #container -->


<?php
get_footer();
?>