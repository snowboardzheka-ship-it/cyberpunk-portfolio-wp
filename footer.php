<?php
/**
 * Footer Template - My Portfolio
 * 
 * Этот файл содержит подвал сайта и закрывающие теги.
 */
?>

    </main> <!-- Конец основного контента сайта -->
    
    <!-- ===================================================================
         ПОДВАЛ САЙТА (FOOTER)
         =================================================================== -->
    <div class="footer-decoration"></div>
    <footer class="site-footer" id="footer">
        
        <div class="footer-content">
            <div class="container">
                
                <!-- Основная секция подвала -->
                <div class="row">
                    
                    <!-- О разработчике -->
                    <div class="col-12 col-md-4">
                        <div class="footer-section">
                            <h3>О разработчике</h3>
                            <p>
                                Создаю современные веб-сайты с использованием 
                                передовых технологий. Специализируюсь на 
                                техно-дизайне и интерактивных решениях.
                            </p>
                            
                            <!-- Социальные сети (можно добавить через Customizer) -->
                            <div class="social-links">
                                <a href="#" class="social-link" aria-label="GitHub">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="#" class="social-link" aria-label="LinkedIn">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                                <a href="#" class="social-link" aria-label="Telegram">
                                    <i class="fab fa-telegram"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Быстрые ссылки -->
                    <div class="col-12 col-md-4">
                        <div class="footer-section">
                            <h3>Навигация</h3>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'footer',
                                'menu_id'        => 'footer-menu',
                                'menu_class'     => 'footer-menu',
                                'container'      => false,
                                'fallback_cb'    => 'my_portfolio_footer_fallback'
                            ));
                            ?>
                        </div>
                    </div>
                    
                    <!-- Дополнительные услуги -->
                    <div class="col-12 col-md-4">
                        <div class="footer-section">
                            <h3>Дополнительно</h3>
                            <div class="footer-services">
                                <ul class="services-list">
                                    <li><a href="/seo/">SEO оптимизация</a></li>
                                    <li><a href="/support/">Техподдержка</a></li>
                                    <li><a href="/consultation/">Консультации</a></li>
                                    <li><a href="/training/">Обучение</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- Секция с информацией о сайте -->
                <div class="footer-bottom">
                    <div class="row align-items-center">
                        
                        <div class="col-12 col-md-6">
                            <div class="footer-info">
                                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Все права защищены.</p>
                                <p class="tech-stack">
                                    Создано с <span class="heart">❤</span> на WordPress
                                </p>
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-6">
                            <div class="footer-tech">
                                <div class="tech-badges">
                                    <span class="tech-badge">WordPress</span>
                                    <span class="tech-badge">HTML5</span>
                                    <span class="tech-badge">CSS3</span>
                                    <span class="tech-badge">JavaScript</span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- Декоративная линия сверху -->
        <div class="footer-decoration"></div>
        
        <!-- Кнопка "Наверх" -->
        <button class="back-to-top" id="back-to-top" aria-label="Вернуться наверх">
            <i class="fas fa-arrow-up"></i>
        </button>
        
    </footer>

</div> <!-- Конец #page wrapper -->

<!-- Подключаем Font Awesome для иконок -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js"></script>

<!-- Подключаем JavaScript файлы темы -->
<script src="<?php echo get_template_directory_uri(); ?>/script.js"></script>
<?php wp_footer(); ?>

<!-- ===================================================================
     ДОПОЛНИТЕЛЬНЫЕ ФУНКЦИИ И КОД
     =================================================================== -->

<?php
/**
 * Резервное меню для подвала, если пользователь не создал меню
 */
function my_portfolio_footer_fallback() {
    echo '<ul class="footer-menu">';
    echo '<li><a href="' . home_url('/') . '">Главная</a></li>';
    echo '<li><a href="' . home_url('/services/') . '">Услуги</a></li>';
    echo '<li><a href="' . home_url('/portfolio/') . '">Портфолио</a></li>';
    echo '<li><a href="' . home_url('/contacts/') . '">Контакты</a></li>';
    echo '</ul>';
}
?>

</body>
</html>