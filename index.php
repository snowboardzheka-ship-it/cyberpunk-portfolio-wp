<?php
/**
 * Основной шаблон (Index Template) - My Portfolio
 * 
 * Этот файл является основным шаблоном для отображения контента в WordPress.
 * Он используется для:
 * - Главной страницы сайта
 * - Страниц архивов (категории, теги)
 * - Резервного шаблона, если нет других подходящих шаблонов
 * 
 */

get_header(); // Подключаем header.php
?>

<!-- ===================================================================
     ОСНОВНОЙ КОНТЕНТ СТРАНИЦЫ
     =================================================================== -->

<div class="main-content-wrapper">

<?php if (have_posts()): ?>
    
    <?php while (have_posts()): the_post(); ?>
        
        <?php
        /**
         * ОПРЕДЕЛЯЕМ ТИП СТРАНИЦЫ
         * WordPress предоставляет условные теги для определения типа страницы
         */
        ?>
        
        <?php if (is_home() || is_front_page()): ?>
            <!-- ===========================================================
                 ГЛАВНАЯ СТРАНИЦА
                 =========================================================== -->
            
            <section class="hero-section" id="hero">
                <div class="container">
                    
                    <div class="row justify-content-center text-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            
                <!-- Основной заголовок с эффектом печатной машинки -->
                <h1 class="hero-title">
                    <span id="typing-text"><?php echo get_theme_mod('hero_title', 'Привет! Я веб-разработчик'); ?></span>
                    <span class="cursor">|</span>
                </h1>
                            
                            <!-- Подзаголовок -->
                            <p class="hero-subtitle">
                                <?php echo get_theme_mod('hero_subtitle', 'Специалист по веб-разработке'); ?>
                            </p>
                            
                            <!-- Кнопки действий -->
                            <div class="hero-buttons">
                                <a href="#about" class="btn btn-primary">Обо мне</a>
                                <a href="<?php echo get_services_url(); ?>" class="btn btn-secondary">Услуги</a>
                            </div>
                            
                        </div>
                                        <!-- Дополнительная информация -->
                        <div class="hero-stats">
                            <div class="stat-item">
                                <span class="stat-number">50+</span>
                                <span class="stat-label">Проектов</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">3+</span>
                                <span class="stat-label">Года опыта</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number">24/7</span>
                                <span class="stat-label">Поддержка</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Декоративные элементы -->
                <div class="hero-decoration"></div>
                <div class="hero-particles"></div>
            </section>
            
            <!-- Секция "Обо мне" -->
            <section class="about-section" id="about">
                <div class="container">
                    <div class="row">
                            <h3 class="glitch-text" data-text="Немного о себе">Немного о себе</h3>
                    </div>
                    
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6">
                            <div class="about-content">
                                <div class="about-text">
                                    <p>
                                        Привет! Я <strong><?php echo get_theme_mod('hero_title', 'веб-разработчик'); ?></strong>, 
                                        и я специализируюсь на создании современных, 
                                        адаптивных и функциональных веб-сайтов.
                                    </p>
                                    
                                    <p>
                                        Мой подход к разработке основан на использовании 
                                        передовых технологий и лучших практик индустрии. 
                                        Каждый проект — это возможность создать что-то 
                                        уникальное и полезное.
                                    </p>
                                    
                                    <p>
                                        Я увлечен техно-дизайном и всегда стремлюсь 
                                        объединить креативность с техническим совершенством.
                                    </p>
                                </div>   
                                <!-- Навыки -->
                                <div class="skills-section">
                                    <h3>Мои ключевые навыки:</h3>
                                    
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">HTML5 / CSS3</span>
                                            <span class="skill-percentage">95%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" data-progress="95"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">JavaScript</span>
                                            <span class="skill-percentage">85%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" data-progress="85"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">WordPress</span>
                                            <span class="skill-percentage">90%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" data-progress="90"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">PHP</span>
                                            <span class="skill-percentage">80%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" data-progress="80"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <span class="skill-name">React</span>
                                            <span class="skill-percentage">75%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" data-progress="75"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                <!-- Правая колонка - изображение и дополнительная информация -->
                <div class="col-12 col-md-6">
                    <div class="about-visual">
                        
                        <!-- Заглушка для фото разработчика -->
                        <div class="developer-image">
                            <div class="image-placeholder">
                                <i class="fas fa-user-astronaut"></i>
                            </div>
                            <!-- Здесь можно добавить фото: <img src="фото.jpg" alt="Фото разработчика"> -->
                        </div>
                        
                        <!-- Дополнительная информация -->
                        <div class="developer-info">
                            <h4>Технологии, с которыми я работаю:</h4>
                            <div class="tech-stack">
                                <span class="tech-item">WordPress</span>
                                <span class="tech-item">HTML5</span>
                                <span class="tech-item">CSS3</span>
                                <span class="tech-item">JavaScript</span>
                                <span class="tech-item">PHP</span>
                                <span class="tech-item">MySQL</span>
                                <span class="tech-item">React</span>
                                <span class="tech-item">Node.js</span>
                            </div>
                        </div>
                        
                        <!-- Статистика проектов -->
                        <div class="projects-stats">
                            <h4>Статистика проектов:</h4>
                            <div class="stats-grid">
                                <div class="stat-card">
                                    <i class="fas fa-laptop-code"></i>
                                    <div class="stat-content">
                                        <span class="stat-number">50+</span>
                                        <span class="stat-label">Завершенных проектов</span>
                                    </div>
                                </div>
                                <div class="stat-card">
                                    <i class="fas fa-users"></i>
                                    <div class="stat-content">
                                        <span class="stat-number">30+</span>
                                        <span class="stat-label">Довольных клиентов</span>
                                    </div>
                                </div>
                                <div class="stat-card">
                                    <i class="fas fa-clock"></i>
                                    <div class="stat-content">
                                        <span class="stat-number">3</span>
                                        <span class="stat-label">Года опыта</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        <?php elseif (is_single()): ?>
            <!-- ===========================================================
                 СТАТЬЯ (SINGLE POST)
                 =========================================================== -->
            
            <article class="single-post" id="post-<?php the_ID(); ?>">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-8">
                            
                            <!-- Заголовок статьи -->
                            <header class="post-header">
                                <h1 class="post-title"><?php the_title(); ?></h1>
                                
                                <div class="post-meta">
                                    <span class="post-date">
                                        <i class="fas fa-calendar"></i>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    
                                    <span class="post-category">
                                        <i class="fas fa-folder"></i>
                                        <?php the_category(', '); ?>
                                    </span>
                                </div>
                            </header>
                            
                            <!-- Изображение статьи -->
                            <?php if (has_post_thumbnail()): ?>
                                <div class="post-thumbnail">
                                    <?php the_post_thumbnail('large'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Контент статьи -->
                            <div class="post-content">
                                <?php the_content(); ?>
                            </div>
                            
                            <!-- Теги -->
                            <?php if (has_tag()): ?>
                                <footer class="post-footer">
                                    <div class="post-tags">
                                        <strong>Теги:</strong> <?php the_tags('', ', '); ?>
                                    </div>
                                </footer>
                            <?php endif; ?>
                            
                        </div>
                        
                        <!-- Боковая панель -->
                        <div class="col-12 col-lg-4">
                            <aside class="sidebar">
                                <!-- Здесь можно добавить виджеты -->
                            </aside>
                        </div>
                        
                    </div>
                </div>
            </article>
            
        <?php else: ?>

    <!-- ===========================================================
         ЕСЛИ НЕТ КОНТЕНТА
         =========================================================== -->
    
    <div class="no-content">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>Контент не найден</h2>
                    <p>К сожалению, запрашиваемый контент не найден.</p>
                    <a href="<?php echo home_url('/'); ?>" class="btn btn-primary">
                        Вернуться на главную
                    </a>
                </div>
            </div>
        </div>
    </div>
    
<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
</div>

<?php get_footer(); // Подключаем footer.php ?>