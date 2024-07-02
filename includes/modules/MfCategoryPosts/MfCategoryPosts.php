<?php

class MFDIVI_CategoryPosts extends ET_Builder_Module {
	public $slug       = 'mf_category_posts';
	public $vb_support = 'on';
	public function init() {
		$this->name = esc_html__( 'MF Category Posts', 'category-posts-extension' );

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Content', 'et_builder' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'text' => array(
						'title'    => esc_html__( 'Text', 'et_builder' ),
						'priority' => 45,
						'tabbed_subtoggles' => true,
						'bb_icons_support' => true,
						'sub_toggles' => array(
							'p'     => array(
								'name' => 'P',
								'icon' => 'text-left',
							),
							'a'     => array(
								'name' => 'A',
								'icon' => 'text-link',
							),
							'ul'    => array(
								'name' => 'UL',
								'icon' => 'list',
							),
							'ol'    => array(
								'name' => 'OL',
								'icon' => 'numbered-list',
							),
							'quote' => array(
								'name' => 'QUOTE',
								'icon' => 'text-quote',
							),
						),
					),
				),
			),
		);

		$this->main_css_element = '%%order_class%%';

		$this->advanced_fields = array(
			'fonts'                 => array(
				'text'   => array(
					'label'           => esc_html__( 'Text', 'et_builder' ),
					'css'             => array(
						'line_height' => "{$this->main_css_element} p",
						'color'       => "{$this->main_css_element}.mf_category_posts",
					),
					'line_height'     => array(
						'default' => floatval( et_get_option( 'body_font_height', '1.7' ) ) . 'em',
					),
					'font_size'       => array(
						'default' => absint( et_get_option( 'body_font_size', '14' ) ) . 'px',
					),
					'toggle_slug'     => 'text',
					'sub_toggle'      => 'p',
					'hide_text_align' => true,
				),
				'link'   => array(
					'label'    => esc_html__( 'Link', 'et_builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} a",
						'color' => "{$this->main_css_element}.mf_category_posts a",
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'toggle_slug' => 'text',
					'sub_toggle'  => 'a',
				),
				'ul'   => array(
					'label'    => esc_html__( 'Unordered List', 'et_builder' ),
					'css'      => array(
						'main'        => "{$this->main_css_element} ul",
						'color'       => "{$this->main_css_element}.mf_category_posts ul",
						'line_height' => "{$this->main_css_element} ul li",
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'toggle_slug' => 'text',
					'sub_toggle'  => 'ul',
				),
				'ol'   => array(
					'label'    => esc_html__( 'Ordered List', 'et_builder' ),
					'css'      => array(
						'main'        => "{$this->main_css_element} ol",
						'color'       => "{$this->main_css_element}.mf_category_posts ol",
						'line_height' => "{$this->main_css_element} ol li",
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'toggle_slug' => 'text',
					'sub_toggle'  => 'ol',
				),
				'quote'   => array(
					'label'    => esc_html__( 'Blockquote', 'et_builder' ),
					'css'      => array(
						'main' => "{$this->main_css_element} blockquote",
						'color' => "{$this->main_css_element}.mf_category_posts blockquote",
					),
					'line_height' => array(
						'default' => '1em',
					),
					'font_size' => array(
						'default' => '14px',
					),
					'toggle_slug' => 'text',
					'sub_toggle'  => 'quote',
				), 
			),	
		);
	}
	public function get_fields() {
		$fields =  array(
			'title' => array(
				'label'           => esc_html__( 'Title', 'et_builder' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Title will appear above the posts links.', 'et_builder' ),
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
				'mobile_options'  => true,
				'hover'           => 'tabs',
			),
			/*'include_categories' => array(
				'label'            => esc_html__( 'List posts from these categories:', 'et_builder' ),
				'type'             => 'categories',
				'option_category'  => 'basic_option',
				'renderer_options' => array(
					'use_terms' => false,
				),
				'description'      => esc_html__( 'This will generate a list of posts links', 'et_builder' ),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'__posts',
				),
			),*/
			'post_type' => array(
				'label'             => esc_html__( 'Post Type', 'et_builder' ),
				'type'              => 'select',
				'option_category'   => 'configuration',
				'options'           => et_get_registered_post_type_options( false, false ),
				'description'       => esc_html__( 'Choose posts of which post type you would like to display.', 'et_builder' ),
				'computed_affects'   => array(
					'__posts',
				),
				'toggle_slug'       => 'main_content',
				'default'           => 'post',
				'show_if'           => array(
					#'use_current_loop' => 'off',
				),
			),
			'posts_number' => array(
				'label'             => esc_html__( 'Post Count', 'et_builder' ),
				'type'              => 'text',
				'option_category'   => 'configuration',
				'description'       => esc_html__( 'Choose how much posts you would like to display per page.', 'et_builder' ),
				'computed_affects'   => array(
					'__posts',
				),
				'toggle_slug'       => 'main_content',
				'default'           => 10,
			),
			'include_categories' => array(
				'label'            => esc_html__( 'Included Categories', 'et_builder' ),
				'type'             => 'categories',
				'meta_categories'  => array(
					'all'     => esc_html__( 'All Categories', 'et_builder' ),
					'current' => esc_html__( 'Current Category', 'et_builder' ),
				),
				'option_category'  => 'basic_option',
				'renderer_options' => array(
					#'use_terms' => false,
				),
				'description'      => esc_html__( 'Choose which categories you would like to include in the feed.', 'et_builder' ),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'__posts',
					'__page'
				),
				'show_if'           => array(
					#'use_current_loop' => 'off',
					'post_type'        => 'post',
				),
			),
			'__posts' => array(
				'type' => 'computed',
				//'computed_callback' => array( 'ET_Builder_Module_Blog', 'get_blog_posts' ),
				'computed_depends_on' => array(
					//'use_current_loop',
					'post_type',
					#'posts_number',
					'include_categories',
					'__page',
				),
			),
			'__page'          => array(
				'type'              => 'computed',
				//'computed_callback' => array( 'ET_Builder_Module_Blog', 'get_blog_posts' ),
				'computed_affects'  => array(
					'__posts',
					'post_type',
					#'posts_number',
					'include_categories',
				),
			),
		);
		
		if ( isset( $this->props['post_type'] ) && $this->props['post_type'] != 'post' ) {
			// Code to be executed if 'post_type' is set and not equal to 'post'
		}
		
		return $fields;
	}
	
	public function render( $unprocessed_props, $content = null, $render_slug ) {
    global $post;
		$cateeg = $this->props['include_categories'];
		$post_type = $this->props['post_type'];
		$titletext = $this->props['title'];
		$posts_number = $this->props['posts_number'];
    #$args = array( 'cat' => $cateeg, 'order' => 'ASC' );

    if ( $post_type == 'post' ) {
	    $args = array(
		    'post_type' => $post_type,
		    'orderby' => 'date',
		    'order' => 'ASC',
		    'cat' => $cateeg,
			'posts_per_page' => $posts_number ///Added parameter to display amount of posts
	    );
    } else {
	    $args = array(
		    'post_type' => $post_type,
		    'orderby' => 'date',
		    'order' => 'ASC',
	    );
    }
    
    
		$arr_posts = new WP_Query( $args );
		
		ob_start();
		$posts_links = '';
		if ( $arr_posts->have_posts() ) :
		    while ( $arr_posts->have_posts() ) :
			    $arr_posts->the_post();
					$posts_links .= '<li id="'.$cateeg.'"><a href="'.get_the_permalink().'">'.get_the_title().'</a></li>';
		    endwhile;
		endif;
		wp_reset_query();
		wp_reset_postdata();

		return $titletext.'<ul>'.$posts_links.'</ul>';
	}
}


new MFDIVI_CategoryPosts;