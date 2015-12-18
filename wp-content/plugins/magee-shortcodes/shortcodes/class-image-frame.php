<?php
class Magee_Image_Frame {

	public static $args;
    private  $id;

	/**
	 * Initiate the shortcode
	 */
	public function __construct() {

        add_shortcode( 'ms_image_frame', array( $this, 'render' ) );
	}

	/**
	 * Render the shortcode
	 * @param  array $args     Shortcode paramters
	 * @param  string $content Content between shortcode
	 * @return string          HTML output
	 */
	function render( $args, $content = '') {

		$defaults =	Magee_Core::set_shortcode_defaults(
			array(
				'id' =>'',
				'class' =>'',
				'src' =>'',
				'link' =>'',
				'link_target' =>'',
			), $args
		);
		
		extract( $defaults );
		self::$args = $defaults;
		
		$html = '<div class="img-frame rounded">';
		
        $html .= '<div class="img-box figcaption-middle text-center fade-in">';
		if( $link !='' ):
		$html .= '<a target="'.$link_target.'" href="'.$link.'">
                                                        <img src="'.$src.'" class="feature-img">
                                                        <div class="img-overlay dark">
                                                            <div class="img-overlay-container">
                                                                <div class="img-overlay-content">
                                                                    <i class="fa fa-link"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>';
		else:
		
		$html .= ' <img src="'.$src.'" class="feature-img">
                                                        <div class="img-overlay dark">
                                                            <div class="img-overlay-container">
                                                                <div class="img-overlay-content">
                                                                </div>
                                                            </div>
                                                        </div>';
		
		endif;
                                                    
													
        $html .= '</div></div>';

  	
		return $html;
	}
	
}

new Magee_Image_Frame();