<?php

/**
 * Adds InfoBanner_Widget widget.
 */
class InfoBanner_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'infobanner_widget', // Base ID
			esc_html__( 'Information Banner', 'ib_domain' ), // Name
			array( 'description' => esc_html__( 'Add an information banner to your site', 'ib_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

        $current_time = date('Y-m-d');
        $date_from  =   date( $instance['date_from_input'] );
        $date_to    =   date( $instance['date_to_input'] );

        echo '
        
        <style>
            .ib_alert-'.$instance['hexcode_color'].' {
                margin-bottom: 0px !important;
                margin-top: 15px !important;
                padding: 10px !important;
                background: #'.$instance['hexcode_color'].' !important;
                color: #565656 !important;
            }
        </style>
        
        ';

        if( 'on' == $instance[ 'active_status' ] ){

            if( 'on' == $instance[ 'date_on' ] ){

                if($current_time >= $date_from && $current_time <= $date_to){

                    echo $args['before_widget'];
                    
                    if( 'on' == $instance[ 'show_title' ] ){
                        if ( ! empty( $instance['title'] ) ) {
            
                            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
                        }          
                    }
                    //WIDGET CONTENT OUTPUT
        
                    if( $instance['link'] == '' ){
                        if($instance['hexcode_color'] == '' ){
                            echo '<div class="ib_alert ib_alert-'.$instance['color'].' "><p><b><i class="fa fa-'.$instance['icon_name'].'" aria-hidden="true"></i> '.$instance['bold__1'].' </b> '.$instance['text'].'</p></div>';                            
                        }else{
                            echo '<div class="ib_alert ib_alert-'.$instance['hexcode_color'].' "><p><b><i class="fa fa-'.$instance['icon_name'].'" aria-hidden="true"></i> '.$instance['bold__1'].' </b> '.$instance['text'].'</p></div>';                                                        
                        }
                    }else{

                        if($instance['hexcode_color'] == '' ){
                            echo '<div class="ib_alert ib_alert-'.$instance['color'].' "><p><b><i class="fa fa-'.$instance['icon_name'].'" aria-hidden="true"></i> '.$instance['bold__1'].' </b> <a href="'.$instance['link'].'" target="_blank" > '.$instance['text'].' </a></p></div>';            
                        }else{
                            echo '<div class="ib_alert ib_alert-'.$instance['hexcode_color'].' "><p><b><i class="fa fa-'.$instance['icon_name'].'" aria-hidden="true"></i> '.$instance['bold__1'].' </b> <a href="'.$instance['link'].'" target="_blank" > '.$instance['text'].' </a></p></div>';            
                        }
                    }
    
                    echo $args['after_widget'];

                }else {/*nothing*/}

            }else{

                echo $args['before_widget'];
                
                if( 'on' == $instance[ 'show_title' ] ){
                    if ( ! empty( $instance['title'] ) ) {
        
                        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
                    }          
                }
                
    
                //WIDGET CONTENT OUTPUT

                if( $instance['link'] == '' ){

                    if($instance['hexcode_color'] == '' ){
                        echo '<div class="ib_alert ib_alert ib_alert-'.$instance['color'].' "><p><b><i class="fa fa-'.$instance['icon_name'].'" aria-hidden="true"></i> '.$instance['bold__1'].' </b> '.$instance['text'].'</p></div>';
                    }else{
                        echo '<div class="ib_alert ib_alert ib_alert-'.$instance['hexcode_color'].' "><p><b><i class="fa fa-'.$instance['icon_name'].'" aria-hidden="true"></i> '.$instance['bold__1'].' </b> '.$instance['text'].'</p></div>';
                    }
                }else{

                    if($instance['hexcode_color'] == '' ){
                        echo '<div class="ib_alert ib_alert-'.$instance['color'].' "><p><b><i class="fa fa-'.$instance['icon_name'].'" aria-hidden="true"></i> '.$instance['bold__1'].' </b> <a href="'.$instance['link'].'" target="_blank" > '.$instance['text'].' </a></p></div>';            
                    }else{
                        echo '<div class="ib_alert ib_alert-'.$instance['hexcode_color'].' "><p><b><i class="fa fa-'.$instance['icon_name'].'" aria-hidden="true"></i> '.$instance['bold__1'].' </b> <a href="'.$instance['link'].'" target="_blank" > '.$instance['text'].' </a></p></div>';            
                    }

                }

                echo $args['after_widget'];
            }
            

        }else{}
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Information Banner', 'ib_domain' );

        $bold__1 = ! empty( $instance['bold__1'] ) ? $instance['bold__1'] : esc_html__( 'Information: ', 'ib_domain' );
        $color = ! empty( $instance['color'] ) ? $instance['color'] : esc_html__( '', 'ib_domain' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'ib_domain' );
        $icon_name = ! empty( $instance['icon_name'] ) ? $instance['icon_name'] : esc_html__( '', 'ib_domain' );
        $link = ! empty( $instance['link'] ) ? $instance['link'] : esc_html__( '', 'ib_domain' ); 
        $active_status = $instance[ 'active_status' ] ? 'true' : 'false'; 
        $active_status = $instance[ 'show_title' ] ? 'true' : 'false';
        $date_on = $instance[ 'date_on' ] ? 'true' : 'false';
        $date_from_input = ! empty( $instance['date_from_input'] ) ? $instance['date_from_input'] : esc_html__( '', 'ib_domain' ); 
        $date_to_input = ! empty( $instance['date_to_input'] ) ? $instance['date_to_input'] : esc_html__( '', 'ib_domain' );

        $hexcode_color = ! empty( $instance['hexcode_color'] ) ? $instance['hexcode_color'] : esc_html__( '', 'ib_domain' );

		?>

        <p> 
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'show_title' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'show_title' ); ?>" name="<?php echo $this->get_field_name( 'show_title' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'show_title' ); ?>">Show title?</label>
        </p>

        <!-- TITLE -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_attr_e( 'Title:', 'ib_domain' ); ?>
            </label> 

            <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>">

        </p>
        
        <!-- BOLD -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'bold__1' ) ); ?>">
                <?php esc_attr_e( 'Bold String:', 'ib_domain' ); ?>
            </label> 

            <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'bold__1' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'bold__1' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $bold__1 ); ?>">

        </p>

         <!-- TEXT -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>">
                <?php esc_attr_e( 'Message:', 'ib_domain' ); ?>
            </label> 

            <input 
            class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $text ); ?>">
        
        </p> 
        
        <!-- CUSTOM COLOR -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'hexcode_color' ) ); ?>">
                <?php esc_attr_e( 'Custom BG-Color (in HEX without "#" : e.g. "5E37F0"):', 'ib_domain' ); ?>
            </label> 

            <input 
            class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'hexcode_color' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'hexcode_color' ) ); ?>" 
            type="text" 
            maxlength="6"
            value="<?php echo esc_attr( $hexcode_color); ?>">
        
        </p>
        
        <!-- COLOR -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>">
                <?php esc_attr_e( 'Background Color:', 'ib_domain' ); ?>
            </label> 

            <select 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'color' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'color' ) ); ?>" >

            <option value="blue" <?php echo ($color == 'blue') ? 'selected' : ''; ?>> Blue</option>
            <option value="red" <?php echo ($color == 'red') ? 'selected' : ''; ?>> Red</option>
            <option value="green" <?php echo ($color == 'green') ? 'selected' : ''; ?>> Green</option>
            <option value="yellow" <?php echo ($color == 'yellow') ? 'selected' : ''; ?>> Yellow</option>

            </select>

		</p>

        <!-- ICON -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'icon_name' ) ); ?>">
                <?php esc_attr_e( 'Icon: (Icons from http://fontawesome.io/)', 'ib_domain' ); ?>
            </label> 

            <select 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'icon_name' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'icon_name' ) ); ?>" >

            <option value="" <?php echo ($icon_name == '') ? 'selected' : ''; ?>> No Icon</option>
            <option value="exclamation-triangle" <?php echo ($icon_name == 'exclamation-triangle') ? 'selected' : ''; ?>> Exclamation Triangle</option>
            <option value="info-circle" <?php echo ($icon_name == 'info-circle') ? 'selected' : ''; ?>> Info Circle</option>
            <option value="question-circle" <?php echo ($icon_name == 'question-circle') ? 'selected' : ''; ?>> Question Circle</option>
            <option value="flag" <?php echo ($icon_name == 'flag') ? 'selected' : ''; ?>> Flag</option>
            <option value="bell-o" <?php echo ($icon_name == 'bell-o') ? 'selected' : ''; ?>> Bell</option>
            <option value="envelope-o" <?php echo ($icon_name == 'envelope-o') ? 'selected' : ''; ?>> Envelope</option>
            <option value="tree" <?php echo ($icon_name == 'tree') ? 'selected' : ''; ?>> Christmas tree</option>

            </select>

        </p>
        
        <!-- LINK -->
		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>">
                <?php esc_attr_e( 'Link:', 'ib_domain' ); ?>
            </label> 

            <input 
            class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'link' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'link' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $link ); ?>">

		</p>


        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'date_on' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'date_on' ); ?>" name="<?php echo $this->get_field_name( 'date_on' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'date_on' ); ?>">Show on specific date?</label>
        </p>



        <!-- DATE FROM -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'date_from_input' ) ); ?>">
                <?php esc_attr_e( 'From:', 'ib_domain' ); ?>
            </label> 

            <input 
            class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'date_from_input' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'date_from_input' ) ); ?>" 
            type="date" 
            value="<?php echo esc_attr( $date_from_input ); ?>">

		</p>


        <!-- DATE TO -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'date_to_input' ) ); ?>">
                <?php esc_attr_e( 'To:', 'ib_domain' ); ?>
            </label> 

            <input 
            class="widefat"
            id="<?php echo esc_attr( $this->get_field_id( 'date_to_input' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'date_to_input' ) ); ?>" 
            type="date" 
            value="<?php echo esc_attr( $date_to_input ); ?>">

		</p>


        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance[ 'active_status' ], 'on' ); ?> id="<?php echo $this->get_field_id( 'active_status' ); ?>" name="<?php echo $this->get_field_name( 'active_status' ); ?>" /> 
            <label for="<?php echo $this->get_field_id( 'active_status' ); ?>">Active?</label>
        </p>


		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
        $instance = array();
        
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['bold__1'] = ( ! empty( $new_instance['bold__1'] ) ) ? strip_tags( $new_instance['bold__1'] ) : '';
        $instance['color'] = ( ! empty( $new_instance['color'] ) ) ? strip_tags( $new_instance['color'] ) : '';
        $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
        $instance['icon_name'] = ( ! empty( $new_instance['icon_name'] ) ) ? strip_tags( $new_instance['icon_name'] ) : '';
        $instance['link'] = ( ! empty( $new_instance['link'] ) ) ? strip_tags( $new_instance['link'] ) : '';
        $instance[ 'active_status' ] = $new_instance[ 'active_status' ];
        $instance[ 'date_on' ] = $new_instance[ 'date_on' ];
        $instance[ 'show_title' ] = $new_instance[ 'show_title' ];
        $instance['date_from_input'] = ( ! empty( $new_instance['date_from_input'] ) ) ? strip_tags( $new_instance['date_from_input'] ) : '';
        $instance['date_to_input'] = ( ! empty( $new_instance['date_to_input'] ) ) ? strip_tags( $new_instance['date_to_input'] ) : '';
        
        $instance['hexcode_color'] = ( ! empty( $new_instance['hexcode_color'] ) ) ? strip_tags( $new_instance['hexcode_color'] ) : '';

		return $instance;
	}

} // class Foo_Widget