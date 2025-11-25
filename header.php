<?php
/**
 * Header Template - My Portfolio
 * 
 * Этот файл содержит HTML шапку сайта и подключает все необходимые ресурсы.
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Обязательные meta теги -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Meta теги для SEO и социальных сетей -->
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <meta name="keywords" content="веб-разработка, портфолио, техно, дизайн">
    <meta name="author" content="<?php echo get_bloginfo('name'); ?>">
    
    <!-- Open Graph теги для социальных сетей -->
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?>">
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo home_url(); ?>">
    
    <!-- Twitter Card теги -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?>">
    <meta name="twitter:description" content="<?php echo get_bloginfo('description'); ?>">

    <!-- Подключаем иконку сайта (favicon) -->
    <?php if (has_custom_logo()): ?>
        <?php $custom_logo_id = get_theme_mod('custom_logo'); ?>
        <?php $logo = wp_get_attachment_image_src($custom_logo_id, 'full'); ?>
        <link rel="icon" type="image/x-icon" href="<?php echo esc_url($logo[0]); ?>">
    <?php endif; ?>
    
    <!-- Подключаем шрифты Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Подключаем CSS стили темы -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

<!-- ===================================================================
     НАЧАЛО САЙТА - ШАПКА (HEADER)
     =================================================================== -->
    
<header class="site-header" id="header">
    <div class="container">
        <div class="row align-items-center">
                
            <!-- Логотип и название сайта -->
            <div class="col-6">
                <div class="site-branding">
                    <?php if (has_custom_logo()): ?>
                        <!-- Если пользователь установил логотип через Customizer -->
                        <?php the_custom_logo(); ?>
                    <?php else: ?>
                        <!-- Если логотипа нет, показываем название сайта -->
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </h1>
                        <div class="site-tagline">DIGITAL_CODER</div>
                        <?php if (get_bloginfo('description')): ?>
                            <p class="site-description"><?php bloginfo('description'); ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Навигационное меню -->
            <div class="col-6">
                <nav class="main-navigation" id="main-navigation" aria-label="Основная навигация">
                    
                    <!-- Кнопка мобильного меню -->
                    <button class="mobile-menu-toggle" aria-label="Открыть меню" aria-expanded="false">
                        <!-- Бургер-иконка создается через CSS ::before и ::after -->
                    </button>
                    
                    <!-- WordPress меню -->
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'nav-menu',
                        'container'      => false,
                        'fallback_cb'    => 'techno_portfolio_fallback_menu'
                    ));
                    ?>
                </nav>
            </div>
            
        </div>
    </div>

    <!-- Декоративная линия под шапкой -->
    <div class="header-decoration"></div>
</header>

<?php
