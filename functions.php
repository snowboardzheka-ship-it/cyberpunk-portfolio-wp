<?php
/**
 * My Portfolio - Functions and Theme Setup
 * 
 * Этот файл содержит все основные функции темы и настройки WordPress.
 */

// Предотвращаем прямой доступ к файлу
if (!defined('ABSPATH')) {
    exit;
}

/**
 * ОСНОВНАЯ ФУНКЦИЯ НАСТРОЙКИ ТЕМЫ
 */
function my_portfolio_setup() {
    
    // Добавляем поддержку различных функций WordPress
    add_theme_support('post-thumbnails');      // Поддержка миниатюр (featured images)
    add_theme_support('title-tag');            // Автоматический title в <head>
    add_theme_support('custom-logo');          // Поддержка логотипа
    add_theme_support('html5', array(          // Поддержка HTML5 тегов
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ));
    
    // Регистрируем области для меню
    register_nav_menus(array(
        'primary' => 'Основное меню (в шапке)',
        'footer'  => 'Меню в подвале'
    ));
    
    // Устанавливаем размеры изображений
    add_image_size('portfolio-thumb', 400, 300, true);     // Миниатюра портфолио
    add_image_size('portfolio-large', 800, 600, true);     // Большое изображение портфолио
    
    // Эта функция завершена, WordPress будет обрабатывать остальное
}
add_action('after_setup_theme', 'my_portfolio_setup');

/**
 * ПОДКЛЮЧЕНИЕ СТИЛЕЙ И СКРИПТОВ
 * Всегда подключаем стили через функции WordPress, а не напрямую в HTML
 * Это обеспечивает правильную работу с кешированием и зависимостями
 */
function my_portfolio_scripts() {
    
    // Подключаем основной CSS файл
    wp_enqueue_style(
        'my-portfolio-style',     // Уникальное имя стиля
        get_stylesheet_uri(),            // Путь к style.css
        array(),                         // Зависимости (пока нет)
        wp_get_theme()->get('Version')   // Версия темы
    );
    
    // Подключаем JavaScript файл
    wp_enqueue_script(
        'my-portfolio-script',    // Уникальное имя скрипта
        get_template_directory_uri() . '/script.js',  // Путь к JS файлу
        array('jquery'),                 // Зависимости (используем jQuery)
        wp_get_theme()->get('Version'),  // Версия темы
        true                             // Подключать в подвал страницы
    );
    
    // Передаем данные из PHP в JavaScript (например, AJAX URL)
    wp_localize_script('my-portfolio-script', 'my_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('my_nonce')
    ));

}
add_action('wp_enqueue_scripts', 'my_portfolio_scripts');

/**
 * WORDPRESS CUSTOMIZER - НАСТРОЙКИ ТЕМЫ
 * Добавляем кастомные настройки в админ-панель WordPress
 * Тогда я смогу менять цвета, тексты и другие параметры без редактирования кода
 */
function my_portfolio_customize_register($wp_customize) {
    
    // СЕКЦИЯ: Основные настройки
    $wp_customize->add_section('my_main_settings', array(
        'title'    => 'Основные настройки темы',
        'priority' => 30
    ));
    
    // Настройка: Текст в hero секции
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Ваше имя',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hero_title', array(
        'label'   => 'Заголовок главной секции',
        'section' => 'my_main_settings',
        'type'    => 'text'
    ));
    
    // Настройка: Подзаголовок
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Специалист по веб-разработке',
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control('hero_subtitle', array(
        'label'   => 'Подзаголовок главной секции',
        'section' => 'my_main_settings',
        'type'    => 'text'
    ));
    
    // СЕКЦИЯ: Цвета темы
    $wp_customize->add_section('my_colors', array(
        'title'    => 'Цветовая схема',
        'priority' => 31
    ));
    
    // Настройка: Основной цвет
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#00ffff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'   => 'Основной цвет (cyan)',
        'section' => 'my_colors'
    )));
    
    // Настройка: Вторичный цвет
    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#ff00ff',
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'   => 'Вторичный цвет (magenta)',
        'section' => 'my_colors'
    )));
    
    // СЕКЦИЯ: Социальные сети
    $wp_customize->add_section('my_social_networks', array(
        'title'    => 'Социальные сети',
        'priority' => 32
    ));
    
    // Telegram
    $wp_customize->add_setting('social_telegram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('social_telegram', array(
        'label'   => 'Telegram',
        'section' => 'my_social_networks',
        'type'    => 'url',
        'description' => 'Ссылка на профиль Telegram (например, https://t.me/username)'
    ));
    
    // Instagram
    $wp_customize->add_setting('social_instagram', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('social_instagram', array(
        'label'   => 'Instagram',
        'section' => 'my_social_networks',
        'type'    => 'url',
        'description' => 'Ссылка на профиль Instagram'
    ));
    
    // WhatsApp
    $wp_customize->add_setting('social_whatsapp', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('social_whatsapp', array(
        'label'   => 'WhatsApp',
        'section' => 'my_social_networks',
        'type'    => 'url',
        'description' => 'Ссылка на профиль WhatsApp (например, https://wa.me/1234567890)'
    ));
    
    // LinkedIn
    $wp_customize->add_setting('social_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('social_linkedin', array(
        'label'   => 'LinkedIn',
        'section' => 'my_social_networks',
        'type'    => 'url',
        'description' => 'Ссылка на профиль LinkedIn'
    ));
    
    // GitHub
    $wp_customize->add_setting('social_github', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('social_github', array(
        'label'   => 'GitHub',
        'section' => 'my_social_networks',
        'type'    => 'url',
        'description' => 'Ссылка на профиль GitHub'
    ));
    
    // YouTube
    $wp_customize->add_setting('social_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control('social_youtube', array(
        'label'   => 'YouTube',
        'section' => 'my_social_networks',
        'type'    => 'url',
        'description' => 'Ссылка на канал YouTube'
    ));
}
add_action('customize_register', 'my_portfolio_customize_register');

/**
 * ДОПОЛНИТЕЛЬНЫЕ ВСПОМОГАТЕЛЬНЫЕ ФУНКЦИИ
 */

// Функция для получения правильного размера изображения портфолио
function get_portfolio_thumbnail($post_id, $size = 'portfolio-thumb') {
    if (has_post_thumbnail($post_id)) {
        return get_the_post_thumbnail($post_id, $size);
    }
    return false;
}

// Функция для получения метаданных проекта
function get_portfolio_meta($post_id, $key) {
    return get_post_meta($post_id, $key, true);
}

// Функция для вывода краткого описания проекта
function get_portfolio_excerpt($post_id, $length = 20) {
    $post = get_post($post_id);
    if ($post) {
        $excerpt = wp_trim_words($post->post_content, $length, '...');
        return $excerpt;
    }
    return '';
}

// Включаем поддержку виджетов (если понадобится в будущем)
function my_portfolio_widgets_init() {
    register_sidebar(array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar-1',
        'description'   => 'Добавляйте виджеты в эту область.',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'my_portfolio_widgets_init');

// Поддержка кастомных шаблонов страниц
add_action('after_setup_theme', 'theme_support_page_templates');
function theme_support_page_templates() {
    add_theme_support('page-templates');
}

// Обработчик формы контактов
add_action('wp_ajax_contact_form', 'handle_contact_form');
add_action('wp_ajax_nopriv_contact_form', 'handle_contact_form');

function handle_contact_form() {
    // Проверяем nonce для безопасности
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form')) {
        wp_die('Недействительный токен безопасности');
    }
    
    // Санитизируем данные
    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $subject = sanitize_text_field($_POST['contact_subject']);
    $message = sanitize_textarea_field($_POST['contact_message']);
    $privacy = isset($_POST['privacy_agree']);
    
    // Проверяем обязательные поля
    if (empty($name) || empty($email) || empty($subject) || empty($message) || !$privacy) {
        wp_send_json_error('Пожалуйста, заполните все обязательные поля');
    }
    
    // Проверяем email
    if (!is_email($email)) {
        wp_send_json_error('Некорректный email адрес');
    }
    
    // Формируем письмо
    $to = get_option('admin_email'); // Отправляем на email администратора
    $email_subject = 'Новое сообщение с сайта: ' . $subject;
    $email_message = "Имя: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Тема: $subject\n\n";
    $email_message .= "Сообщение:\n$message\n";
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . $name . ' <' . $email . '>',
        'Reply-To: ' . $email
    );
    
    // Отправляем письмо
    if (wp_mail($to, $email_subject, $email_message, $headers)) {
        wp_send_json_success('Сообщение успешно отправлено! Я свяжусь с вами в ближайшее время.');
    } else {
        wp_send_json_error('Произошла ошибка при отправке сообщения. Попробуйте позже или свяжитесь со мной напрямую.');
    }
}



/**
 * МОДУЛЬНАЯ CSS АРХИТЕКТУРА - ПОДКЛЮЧЕНИЕ СТИЛЕЙ ПО СТРАНИЦАМ
 * Каждая страница имеет свой независимый CSS файл для избежания конфликтов
 * и легкого добавления canvas элементов и эффектов в будущем
 */



// Подключаем hero.css для главной страницы
function enqueue_hero_styles() {
    if (is_front_page() || is_home()) {
        wp_enqueue_style(
            'hero-page-styles',
            get_template_directory_uri() . '/css/hero.css',
            array('my-portfolio-style'),
            wp_get_theme()->get('Version')
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_hero_styles');

// И для about.css
function enqueue_about_styles() {
    if (is_front_page() || is_home()) {
        wp_enqueue_style(
            'about-page-styles',
            get_template_directory_uri() . '/css/about.css',
            array('my-portfolio-style'),
            wp_get_theme()->get('Version')
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_about_styles');

// CSS для страницы услуг
function enqueue_services_page_styles() {
    if (is_page_template('page-services.php') || is_page('услуги') || is_page('services')) {
        wp_enqueue_style(
            'services-page-styles',
            get_template_directory_uri() . '/css/services-page.css',
            array('my-portfolio-style'),
            wp_get_theme()->get('Version')
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_services_page_styles');

// CSS для страницы контактов
function enqueue_contacts_page_styles() {
    if (is_page_template('page-contacts.php') || is_page('контакты') || is_page('contacts')) {
        wp_enqueue_style(
            'contacts-page-styles',
            get_template_directory_uri() . '/css/contacts-page.css',
            array('my-portfolio-style'),
            wp_get_theme()->get('Version')
        );
    }
}
add_action('wp_enqueue_scripts', 'enqueue_contacts_page_styles');

// Функция для получения URL страницы услуг
function get_services_url() {
    $services_page = get_page_by_path('services'); // Ищем страницу с URL /services
    if ($services_page) {
        return get_permalink($services_page->ID); // Возвращаем полную ссылку
    }
    return home_url('/services'); // Если страница не найдена - отправляем на /services
}

/**
 * FALLBACK МЕНЮ - создает резервное меню если основное не настроено
 * Это решает проблему пустой навигации
 */
function techno_portfolio_fallback_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . home_url('/') . '">Главная</a></li>';
    echo '<li><a href="' . home_url('/portfolio') . '">Портфолио</a></li>';
    echo '<li><a href="' . home_url('/services') . '">Услуги</a></li>';
    echo '<li><a href="' . home_url('/contact') . '">Контакты</a></li>';
    echo '</ul>';
}

?>