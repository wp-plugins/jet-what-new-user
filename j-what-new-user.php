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
Version: 0.1
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
		echo $before_title . $instance['title'] . $after_title;
include('post-form.php');
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
				<p><? _e('Show','buddypress'); _e('Title:','buddypress'); ?></p>
				<p><input class="checkbox" type="checkbox" <?php if ($jvavatar) {echo '"checked"';} ?> id="<? echo $this->get_field_id('jvtitle'); ?>" name="<? echo $this->get_field_name('jvtitle'); ?>" value="1" /></p>
				<p><? _e('Show','buddypress'); _e('Avatar','buddypress'); ?></p>
                <p><input class="checkbox" type="checkbox" <?php if ($jvavatar) {echo '"checked"';} ?> id="<? echo $this->get_field_id('jvavatar'); ?>" name="<? echo $this->get_field_name('jvavatar'); ?>" value="1" /></p>
	<?php
	}
}
add_action('widgets_init', create_function('', 'return register_widget("JetWhatnewf");'));
?>