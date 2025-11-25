<?php
/**
 * Простая тестовая страница для проверки карусели
 */

get_header(); ?>



<!-- Подключаем стили карусели -->
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/carousel-sphere.css">
<!-- Подключаем JavaScript карусели -->
<script src="<?php echo get_template_directory_uri(); ?>/carousel-sphere.js"></script>


    <div class="text-center mb-12">
        <h1 class="portfolio-title">
            <span id="portfolio-typing-text">TECHNO ORB</span>
            <span class="portfolio-cursor">|</span>
        </h1>
        <p class="text-xl text-gray-300 max-w-2xl mx-auto">Революционная 3D карусель портфолио с передовыми технологиями</p>
        <div class="mt-6 w-24 h-1 bg-gradient-to-r from-cyan-400 to-pink-400 mx-auto"></div>
        <h4 class="text">Используйте стрелки клавиатуры, свайп или навигационные кнопки для взаимодействия</h4>
    </div>
    
<!-- Простая структура карусели -->
<div class="techno-orb-carousel" 
     data-radius="400" 
     data-height="300" 
     data-max-visible="5" 
     data-auto-rotate="true" 
     data-auto-rotate-delay="4000"
     data-show-controls="true"
     data-show-dots="true"
     data-enable-swipe="true"
     data-enable-keyboard="true">

                <div class="techno-orb-item">
                    <h3><?php the_title(); ?></h3>
                    <p><?php echo get_the_excerpt() ?: 'Современный веб-проект с использованием передовых технологий'; ?></p>
                    
                    <?php 
                    $technologies = get_post_meta(get_the_ID(), 'technologies', true);
                    if ($technologies) : ?>
                        <div class="tech-badges">
                            <?php 
                            $tech_array = explode(',', $technologies);
                            foreach ($tech_array as $tech) : 
                                $tech = trim($tech);
                                if (!empty($tech)) : ?>
                                    <span class="tech-badge"><?php echo esc_html($tech); ?></span>
                                <?php endif; 
                            endforeach; ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php 
                    $project_url = get_post_meta(get_the_ID(), 'project_url', true);
                    if ($project_url) : ?>
                        <a href="<?php echo esc_url($project_url); ?>" 
                           class="inline-block mt-3 bg-cyan-400 text-gray-900 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-cyan-300 transition-colors"
                           target="_blank" rel="noopener">
                            Посмотреть проект →
                        </a>
                    <?php endif; ?>
                </div>
    <!-- Демо-проекты если нет записей -->
            <div class="techno-orb-item">
                <h3>E-Commerce Platform</h3>
                <p>Современная платформа электронной коммерции с React и Node.js</p>
                <div class="tech-badges">
                    <span class="tech-badge">React</span>
                    <span class="tech-badge">Node.js</span>
                    <span class="tech-badge">MongoDB</span>
                </div>
            </div>
            
            <div class="techno-orb-item">
                <h3>Portfolio Website</h3>
                <p>Адаптивный сайт-портфолио с анимациями и современным дизайном</p>
                <div class="tech-badges">
                    <span class="tech-badge">WordPress</span>
                    <span class="tech-badge">PHP</span>
                    <span class="tech-badge">MySQL</span>
                </div>
            </div>
            
            <div class="techno-orb-item">
                <h3>Mobile App Dashboard</h3>
                <p>Панель управления мобильным приложением с real-time данными</p>
                <div class="tech-badges">
                    <span class="tech-badge">Vue.js</span>
                    <span class="tech-badge">Socket.io</span>
                    <span class="tech-badge">Chart.js</span>
                </div>
            </div>
            
            <div class="techno-orb-item">
                <h3>API Integration System</h3>
                <p>Система интеграции множественных API с автоматической синхронизацией</p>
                <div class="tech-badges">
                    <span class="tech-badge">Python</span>
                    <span class="tech-badge">FastAPI</span>
                    <span class="tech-badge">Redis</span>
                </div>
            </div>
            
            <div class="techno-orb-item">
                <h3>Data Visualization Tool</h3>
                <p>Инструмент для визуализации данных с интерактивными графиками</p>
                <div class="tech-badges">
                    <span class="tech-badge">D3.js</span>
                    <span class="tech-badge">TypeScript</span>
                    <span class="tech-badge">Docker</span>
                </div>
            </div>

</div>

<?php get_footer(); ?>