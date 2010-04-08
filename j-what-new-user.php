<?php
/*
Plugin Name: Jet What New User
URI: http://milordk.ru
Author: Jettochkin
Author URI: http://milordk.ru
Plugin URI: http://milordk.ru/r-lichnoe/opyt-l/cms/jet-what-new-user.html
Donate URI: http://milordk.ru/uslugi.html
Description: En: Widget for the publication of their status, placing a note in groups, Ru: Виджет для публикации своего статуса, размещения заметки в группах
Tags: BuddyPress, Wordpress MU, meta, blog, could
Version: 0.3
Site Wide Only: true
*/
?>
<?

class JetWhatnewf extends WP_Widget {
	function JetWhatnewf() {
		parent::WP_Widget(false, $name = __('JetWhatnewf','JetWhatnewf') );
	}


function widget($args, $instance) {
		extract( $args );
		echo $before_widget;
		$keyavatar = $instance['jvavatar'];
		$keytitle = $instance['jvtitle'];
	if ($keytitle)
		{
			echo $before_title . $instance['title'] . $after_title;
		}
		else
		{
		echo $before_title;
		?>
			<?php if ( bp_is_group() ) : ?>
			    <?php printf( __( "What's new in %s, %s?", 'buddypress' ), bp_get_group_name(), bp_get_user_firstname() ) ?>
			<?php else : ?>
			    <?php printf( __( "What's new %s?", 'buddypress' ), bp_get_user_firstname() ) ?>
			<?php endif; ?>
		<? echo $after_title; 
		}
		

/* Start */ ?>
<? /* With Avatar */ ?>
<? if ($keyavatar) { ?>
  <style type="text/css">
form#whats-new-form {
	margin-bottom: 5px;
	border-bottom: 1px solid #f0f0f0;
	overflow: hidden;
	padding-bottom: 20px;
}
	#item-body form#whats-new-form {
		margin-top: 20px;
		border: none;
	}

	.home-page form#whats-new-form {
		border-bottom: none;
		padding-bottom: 0;
	}

	form#whats-new-form h5 {
		margin: 0;
		font-weight: normal;
		font-size: 12px;
		color: #888;
		margin-left: 76px;
		padding: 0 0 3px 0;
	}

	form#whats-new-form #whats-new-avatar {
		float: left;
	}

	form#whats-new-form #whats-new-content {
		margin-left: 54px;
		padding-left: 22px;
	}

	form#whats-new-form #whats-new-textarea {
		padding: 8px;
		border: 1px inset #ccc;
		background: #fff;
		margin-bottom: 10px;
		-moz-border-radius: 3px;
		-webkit-border-radius: 3px;
		border-radius: 3px;
	}
	form#whats-new-form textarea {
		width: 100%;
		height: 60px;
		font-size: 14px;
		font-family: inherit;
		color: #555;
		border: none;
		margin: 0;
		padding: 0;
	}

	form#whats-new-form #whats-new-options select {
		max-width: 200px;
	}

	form#whats-new-form #whats-new-submit {
		float: left;
		margin: 0;
	}
  </style>
<? /* With Avatar */ ?>
<? } else { ?>
<? /* Without Avatar */ ?>
  <style type="text/css">
form#whats-new-form {
	margin-bottom: 5px;
	border-bottom: 1px solid #f0f0f0;
	overflow: hidden;
	padding-bottom: 20px;
}
	#item-body form#whats-new-form {
		margin-top: 20px;
		border: none;
	}

	.home-page form#whats-new-form {
		border-bottom: none;
		padding-bottom: 0;
	}

	form#whats-new-form h5 {
		margin: 0;
		font-weight: normal;
		font-size: 12px;
		color: #888;
		margin-left: 76px;
		padding: 0 0 3px 0;
	}

	form#whats-new-form #whats-new-content {
		margin-left: 5px;
		padding-left: 5px;
	}

	form#whats-new-form #whats-new-textarea {
		padding: 8px;
		border: 1px inset #ccc;
		background: #fff;
		margin-bottom: 10px;
		-moz-border-radius: 3px;
		-webkit-border-radius: 3px;
		border-radius: 3px;
	}
	form#whats-new-form textarea {
		width: 100%;
		height: 60px;
		font-size: 14px;
		font-family: inherit;
		color: #555;
		border: none;
		margin: 0;
		padding: 0;
	}

	form#whats-new-form #whats-new-options select {
		max-width: 200px;
	}

	form#whats-new-form #whats-new-submit {
<? /*		align: left;*/?>
		margin: 0;
	}
  </style>
<? /* Without Avatar */ ?>
<? } ?>

<form action="<?php bp_activity_post_form_action() ?>" method="post" id="whats-new-form" name="whats-new-form">

	<?php do_action( 'bp_before_activity_post_form' ) ?>

	<?php if ( isset( $_GET['r'] ) ) : ?>
		<div id="message" class="info">
			<p><?php printf( __( 'You are mentioning %s in a new update, this user will be sent a notification of your message.', 'buddypress' ), bp_get_mentioned_user_display_name( $_GET['r'] ) ) ?></p>
		</div>
	<?php endif; ?>
<?	if ($keyavatar)
		{ ?>
	<div id="whats-new-avatar">
		<a href="<?php echo bp_loggedin_user_domain() ?>">
			<?php bp_loggedin_user_avatar( 'width=60&height=60' ) ?>
		</a>
	</div>
<? } ?>

	<div id="whats-new-content">
		<div id="whats-new-textarea">
			<textarea name="whats-new" id="whats-new" value="" /><?php if ( isset( $_GET['r'] ) ) : ?>@<?php echo esc_attr( $_GET['r'] ) ?> <?php endif; ?></textarea>
		</div>

		<div id="whats-new-options">
			<?php if ( function_exists('bp_has_groups') && !bp_is_my_profile() && !bp_is_group() ) : ?>
				<div id="whats-new-post-in-box">
					<?php _e( 'Post in', 'buddypress' ) ?>:

					<select id="whats-new-post-in" name="whats-new-post-in">
						<option selected="selected" value="0"><?php _e( 'My Profile', 'buddypress' ) ?></option>

						<?php if ( bp_has_groups( 'user_id=' . bp_loggedin_user_id() . '&type=alphabetical&max=100&per_page=100&populate_extras=0' ) ) : while ( bp_groups() ) : bp_the_group(); ?>
							<option value="<?php bp_group_id() ?>"><?php bp_group_name() ?></option>
						<?php endwhile; endif; ?>
					</select>
				</div>
				<input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
			<?php elseif ( bp_is_group_home() ) : ?>
				<input type="hidden" id="whats-new-post-object" name="whats-new-post-object" value="groups" />
				<input type="hidden" id="whats-new-post-in" name="whats-new-post-in" value="<?php bp_group_id() ?>" />
			<?php endif; ?>

			<?php do_action( 'bp_activity_post_form_options' ) ?>
			<div id="whats-new-submit">
				<span class="ajax-loader"></span> &nbsp;
				<input type="submit" name="aw-whats-new-submit" id="aw-whats-new-submit" value="<?php _e( 'Post Update', 'buddypress' ) ?>" />
			</div>
		</div><!-- #whats-new-options -->
	</div><!-- #whats-new-content -->

	<?php wp_nonce_field( 'post_update', '_wpnonce_post_update' ); ?>
	<?php do_action( 'bp_after_activity_post_form' ) ?>

</form><!-- #whats-new-form -->
<?
/* End */
			echo $after_widget;
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['jvtitle'] = $new_instance['jvtitle'];
		$instance['jvavatar'] = $new_instance['jvavatar'];
		return $instance;
	}

	function form($instance) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'jvtitle'=>'1','jvavatar'=>'1'));
		$title = strip_tags( $instance['title']); 
        $jvtitle = $instance['jvtitle'];
        $jvavatar = $instance['jvavatar'];
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'buddypress'); ?>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo attribute_escape( stripslashes( $title ) ); ?>" /></label></p>
		
<p><?php if ( WPLANG == 'ru_RU' ) { 
            echo 'Показывать заголовок:';
        }else{
                _e('Show'); _e( ' ' );  _e('Title:','buddypress');
        } ?></p>
		<p><input class="checkbox" type="checkbox" <?php if ($jvtitle) {echo 'checked="checked"';} ?> id="<?php echo $this->get_field_id('jvtitle'); ?>" name="<?php echo $this->get_field_name('jvtitle'); ?>" value="1" /></p>
<p><?php if ( WPLANG == 'ru_RU' ) { 
            echo 'Показывать аватар:';
        }else{
                _e('Show'); _e( ' ' );  _e('Avatar','buddypress');
        } ?></p>		
		<p><input class="checkbox" type="checkbox" <?php if ($jvavatar) {echo 'checked="checked"';} ?> id="<?php echo $this->get_field_id('jvavatar'); ?>" name="<?php echo $this->get_field_name('jvavatar'); ?>" value="1" /></p>
	<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("JetWhatnewf");'));
?>