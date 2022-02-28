<?php
/**
 * xeon functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package xeon
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'xeon_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function xeon_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on xeon, use a find and replace
		 * to change 'xeon' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'xeon', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'xeon' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'xeon_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'xeon_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function xeon_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'xeon_content_width', 640 );
}
add_action( 'after_setup_theme', 'xeon_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function xeon_widgets_init() {
    register_sidebar(
        array(
            'name'          => esc_html__( 'Header Menu', 'xeon' ),
            'id'            => 'header-menu',
            'description'   => esc_html__( 'Add widgets here.', 'xeon' ),
            'class'         => '',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            'before_sidebar' => '', // WP 5.6
            'after_sidebar'  => '', // WP 5.6
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Menu', 'xeon' ),
            'id'            => 'footer-menu',
            'description'   => esc_html__( 'Add widgets here.', 'xeon' ),
            'class'         => '',
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
            'before_sidebar' => '', // WP 5.6
            'after_sidebar'  => '', // WP 5.6
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Slider Menu', 'xeon' ),
            'id'            => 'slider-menu',
            'description'   => esc_html__( 'Add widgets here.', 'xeon' ),
            'class'         => '',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
            'before_sidebar' => '', // WP 5.6
            'after_sidebar'  => '', // WP 5.6
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Services', 'xeon' ),
            'id'            => 'services',
            'description'   => esc_html__( 'Add widgets here.', 'xeon' ),
            'class'         => '',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
            'before_sidebar' => '', // WP 5.6
            'after_sidebar'  => '', // WP 5.6
        )
    );

    register_sidebar(
        array(
            'name'          => esc_html__( 'Portfolio', 'xeon' ),
            'id'            => 'portfolio',
            'description'   => esc_html__( 'Add widgets here.', 'xeon' ),
            'class'         => '',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
            'before_sidebar' => '', // WP 5.6
            'after_sidebar'  => '', // WP 5.6
        )
    );
}
add_action( 'widgets_init', 'xeon_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function xeon_scripts() {
	wp_enqueue_style( 'xeon-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'xeon-bootstrap.min', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'xeon-font-awesome.min', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'xeon-main', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION );
	wp_enqueue_style( 'xeon-prettyPhoto', get_template_directory_uri() . '/assets/css/prettyPhoto.css', array(), _S_VERSION );
	wp_style_add_data( 'xeon-style', 'rtl', 'replace' );

    wp_enqueue_script( 'xeon-jquery', get_template_directory_uri() . '/assets/js/jquery.js', array(), _S_VERSION);
	wp_enqueue_script( 'xeon-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'xeon-bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'xeon-html5shiv', get_template_directory_uri() . '/assets/js/html5shiv.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'xeon-jquery.isotope.min', get_template_directory_uri() . '/assets/js/jquery.isotope.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'xeon-jquery.prettyPhoto', get_template_directory_uri() . '/assets/js/jquery.prettyPhoto.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'xeon-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'xeon-respond.min', get_template_directory_uri() . '/assets/js/respond.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'xeon_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Widget API: Wp_Widget_Text_Up_Menu class
 */
require get_template_directory() . '/widgets/class-wp-widget-text-up-menu.php';

function script_CSS_create(){ ?>

    <script>
		// $('#wpcf7-f145-o1 > form > p:nth-child(2) > span').unwrap("<p></p>");
		// $('#wpcf7-f145-o1 > form > span > input').unwrap("<span></span>");
		// $("#wpcf7-f145-o1 > form > input").attr( "placeholder", "Name" );
		// $('#wpcf7-f145-o1 > form > input').wrap("<div class='form-group'></div>");
		// $('#wpcf7-f145-o1 > form > div.form-group').wrap("<div></div>");
		// $('#wpcf7-f145-o1 > form > p:nth-child(3) > span').unwrap("<p></p>");
		// $('#wpcf7-f145-o1 > form > span > input').unwrap("<span></span>");
		// $("#wpcf7-f145-o1 > form > input").attr( "placeholder", "Email address " );
		// $('#wpcf7-f145-o1 > form > input').wrap("<div class='form-group'></div>");
		// $('#wpcf7-f145-o1 > form > div.form-group').wrap("<div></div>");
		// $('#wpcf7-f145-o1 > form').prepend("<div class='row'></div");
		// var Name = $('#wpcf7-f145-o1 > form > div:nth-child(3)');
		// $('#wpcf7-f145-o1 > form > div.row').append($(Name));
		// var Email = $("#wpcf7-f145-o1 > form > div:nth-child(3)");
		// $('#wpcf7-f145-o1 > form > div.row').append($(Email));
		// $("#wpcf7-f145-o1 > form > div.row > div").addClass('col-sm-6');

		// $('#wpcf7-f145-o1 > form > p:nth-child(3) > span').unwrap("<p></p>");
		// $('#message').unwrap("<span></span>");
		// $("#message").attr( "placeholder", "Message" );
		// $('#message').wrap("<div class='form-group'></div>");
		// $('#wpcf7-f145-o1 > form > div.form-group').wrap("<div></div>");
		// $("#wpcf7-f145-o1 > form > div:nth-child(3)").addClass('col-sm-12');
		// $("#wpcf7-f145-o1 > form > div.col-sm-12").wrap("<div class='row'></div");








		$('#wpcf7-f145-o1 > form > p:nth-child(2) > span').unwrap("<p></p>");
		$("#wpcf7-f145-o1 > form > span > input").attr( "placeholder", "Name" );
		$("#wpcf7-f145-o1 > form > span").wrap("<div class='form-group'></div>");
		$("#wpcf7-f145-o1 > form > div.form-group").wrap("<div></div>");

		$('#wpcf7-f145-o1 > form > p:nth-child(3) > span').unwrap("<p></p>");
		$("#wpcf7-f145-o1 > form > span > input").attr( "placeholder", "Email address " );
		$('#wpcf7-f145-o1 > form > span').wrap("<div class='form-group'></div>");
		$('#wpcf7-f145-o1 > form > div.form-group').wrap("<div></div>");

		$('#wpcf7-f145-o1 > form').prepend("<div class='row'></div");
		var Name = $("#wpcf7-f145-o1 > form > div:nth-child(3)");
		$('#wpcf7-f145-o1 > form > div.row').append($(Name));

		var Email = $("#wpcf7-f145-o1 > form > div:nth-child(3)");
		$('#wpcf7-f145-o1 > form > div.row').append($(Email));
		$("#wpcf7-f145-o1 > form > div.row > div").addClass('col-sm-6');

		// $('#wpcf7-f145-o1 > form > p:nth-child(3) > span').unwrap("<p></p>");
		// $('#message').unwrap("<span></span>");
		// $("#message").attr( "placeholder", "Message" );
		// $('#message').wrap("<div class='form-group'></div>");
		// $('#wpcf7-f145-o1 > form > div.form-group').wrap("<div></div>");
		// $("#wpcf7-f145-o1 > form > div:nth-child(3)").addClass('col-sm-12');
		// $("#wpcf7-f145-o1 > form > div.col-sm-12").wrap("<div class='row'></div");

		<?php $background = $_SESSION['background_image']; ?>
		let background = '<?= $background ?>';
        $('#main-slider').css("background-image", `url(${background})`);
		<?php $slider_count = $_SESSION['slider_count']; ?>
		let slider_count = '<?= $slider_count ?>';
		$('#team-scroller > div > div.item.active > div').slick({
      infinite: true,
      dots: true,
	  arrows: true,
	  prevArrow: $('#team-scroller > a.left-arrow > i'),
	  nextArrow: $('#team-scroller > a.right-arrow > i'),
	  slidesToShow: slider_count,
    });

	$('#main-slider > div > div > div').slick({
      infinite: true,
      dots: false,
	  arrows: true,
	  prevArrow: $('#main-slider > a.prev'),
	  nextArrow: $('#main-slider > a.next'),
	  slidesToShow: 1,
    });
  
    </script>

<?php }

add_action('wp_footer', 'script_CSS_create');

add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'services', [
		'label'  => null,
		'labels' => [
			'name'               => 'Сервисы', // основное название для типа записи
			'singular_name'      => 'service', // название для одной записи этого типа
			'add_new'            => 'Добавить сервис', // для добавления новой записи
			'add_new_item'       => 'Добавление сервиса', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование сервиса', // для редактирования типа записи
			'new_item'           => 'Новый сервис', // текст новой записи
			'view_item'          => 'Смотреть сервис', // для просмотра записи этого типа.
			'search_items'       => 'Искать сервисы', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Секция сервисов', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'portfolio', [
		'label'  => null,
		'labels' => [
			'name'               => 'Портфолио', // основное название для типа записи
			'singular_name'      => 'portfolio', // название для одной записи этого типа
			'add_new'            => 'Добавить портфолио', // для добавления новой записи
			'add_new_item'       => 'Добавление портфолио', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование портфолио', // для редактирования типа записи
			'new_item'           => 'Новый портфолио', // текст новой записи
			'view_item'          => 'Смотреть портфолио', // для просмотра записи этого типа.
			'search_items'       => 'Искать портфолио', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Секция портфолио', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'prices', [
		'label'  => null,
		'labels' => [
			'name'               => 'Цены', // основное название для типа записи
			'singular_name'      => 'Цена', // название для одной записи этого типа
			'add_new'            => 'Добавить цену', // для добавления новой записи
			'add_new_item'       => 'Добавление цены', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование цены', // для редактирования типа записи
			'new_item'           => 'Новая цена', // текст новой записи
			'view_item'          => 'Смотреть цены', // для просмотра записи этого типа.
			'search_items'       => 'Искать цену', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Секция цен', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'about_us', [
		'label'  => null,
		'labels' => [
			'name'               => 'О нас', // основное название для типа записи
			'singular_name'      => 'О нас', // название для одной записи этого типа
			'add_new'            => 'Добавить секцию', // для добавления новой записи
			'add_new_item'       => 'Добавление секции', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование секции', // для редактирования типа записи
			'new_item'           => 'Новая секция', // текст новой записи
			'view_item'          => 'Смотреть секции', // для просмотра записи этого типа.
			'search_items'       => 'Искать секцию', // для поиска по этим типам записи
			'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Секция о нас', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'custom-fields'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
};

//add_action('admin_init','acf_add_options_page');


if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Настройки сайта',
		'menu_title'	=> 'Настройки сайта',
		'menu_slug'	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'update_button' => __('Принять', 'acf'),
		'updated_message' => __("Изменения сохранены", 'acf'),
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Настройки шапки',
		'menu_title'	=> 'Шапка',
		'menu_slug'	=> 'header-settings',
		'parent_slug'	=> 'general-settings',
		'update_button' => __('Принять', 'acf'),
		'updated_message' => __("Изменения сохранены", 'acf'),
		//'capability'	=> 'edit_posts',
		//'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Настройки подвала',
		'menu_title'	=> 'Подвал',
		'menu_slug'	=> 'footer-settings',
		'parent_slug'	=> 'general-settings',
		'update_button' => __('Принять', 'acf'),
		'updated_message' => __("Изменения сохранены", 'acf'),
		//'capability'	=> 'edit_posts',
		//'redirect'		=> false
	));
	
};


