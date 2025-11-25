<?php
/**
 * Шаблон страницы услуг - My Portfolio
 * 
 * Этот шаблон специально создан для страницы с услугами.
 * WordPress автоматически использует этот шаблон для страниц,
 * которые используют шаблон "page-services.php".
 * 
 */

get_header(); // Подключаем общую шапку сайта
?>
<!-- ===================================================================
     СТРАНИЦА УСЛУГ
     =================================================================== -->

<section class="holographic-services-section" id="services">
    <div class="container">
        <div class="col-12"> 
                <h2 class="typewriter-title">
                    <span id="services-typing-text">МОИ УСЛУГИ</span>
                    <span class="typewriter-cursor">|</span>
                </h2>
                <h4 class="services-subtitle">
                    Воплощаю ваши идеи в цифровой реальности
                </h4>
        </div>
    </section>
    <section class="service-section" id="services">
        <div class="row service-cards-container">
            
            <!-- Услуга 1: Веб-разработка -->
            <div class="col-12 col-md-3">
                <div class="holographic-service-card">
                    
                    <div class="service-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    
                    <h3 class="glitch-text" data-text="Веб-разработка">Веб-разработка</h3>
                    
                    <h4>
                        Создание современных, адаптивных веб-сайтов 
                        с использованием передовых технологий и лучших практик.
                    </h4>
                    
                    <ul class="service-features">
                        <li>HTML5 / CSS3</li>
                        <li>JavaScript / jQuery</li>
                        <li>WordPress</li>
                        <li>PHP / MySQL</li>
                    </ul>
                    
                    <div class="service-price">от 15 000 ₽</div>
                    
                    <!-- Калькулятор веб-разработки -->
                    <div class="service-calculator">
                        <div class="calculator-controls">
                            <div class="calc-form">
                                <div class="calc-group">
                                    <label for="pages-count">Количество страниц:</label>
                                    <select id="pages-count" name="pages-count">
                                        <option value="1">1 страница</option>
                                        <option value="5" selected>5 страниц</option>
                                        <option value="10">10 страниц</option>
                                        <option value="15">15 страниц</option>
                                        <option value="20">20 страниц</option>
                                    </select>
                                </div>
                                
                                <div class="calc-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="cms" value="wordpress">
                                        <span class="checkmark"></span>
                                        <span class="checkbox-text">CMS (WordPress)</span>
                                    </label>
                                </div>
                                
                                <div class="calc-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="seo" value="optimization">
                                        <span class="checkmark"></span>
                                        <span class="checkbox-text">SEO оптимизация</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="calc-result">
                            <div class="price-label">РАССЧИТАТЬ СТОИМОСТЬ:</div>
                            <div class="final-price">
                                <span id="webdev-calculated-price">15,000</span>
                                <span class="currency">₽</span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#contact" class="btn-order">Заказать</a>
                </div>
            </div>
            
            <!-- Услуга 2: UI/UX Дизайн -->
            <div class="col-12 col-md-3">
                <div class="holographic-service-card featured">
                    <div class="service-badge">Популярно</div>
                    
                    <div class="service-icon">
                        <i class="fas fa-palette"></i>
                    </div>
                    
                    <h3 class="glitch-text" data-text="UI/UX Дизайн">UI/UX Дизайн</h3>
                    
                    <h4>
                        Создание интуитивного и привлекательного дизайна, 
                        который обеспечивает отличный пользовательский опыт.
                    </h4>
                    
                    <ul class="service-features">
                        <li>Прототипирование</li>
                        <li>UI/UX дизайн</li>
                        <li>Адаптивность</li>
                        <li>Брендинг</li>
                    </ul>
                    
                    <div class="service-price">от 12 000 ₽</div>
                    
                    <!-- Калькулятор UI/UX дизайна -->
                    <div class="service-calculator">
                        <div class="calculator-controls">
                            <div class="calc-form">
                                <div class="calc-group">
                                    <label for="project-complexity">Сложность проекта:</label>
                                    <select id="project-complexity" name="project-complexity">
                                        <option value="simple">Простой</option>
                                        <option value="medium" selected>Средний</option>
                                        <option value="complex">Сложный</option>
                                    </select>
                                </div>
                                
                                <div class="calc-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="user-research" value="research">
                                        <span class="checkmark"></span>
                                        <span class="checkbox-text">Пользовательское исследование</span>
                                    </label>
                                </div>
                                
                                <div class="calc-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="interactive-prototype" value="prototype">
                                        <span class="checkmark"></span>
                                        <span class="checkbox-text">Интерактивный прототип</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="calc-result">
                            <div class="price-label">РАССЧИТАТЬ СТОИМОСТЬ:</div>
                            <div class="final-price">
                                <span id="design-calculated-price">12,000</span>
                                <span class="currency">₽</span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#contact" class="btn-order">Заказать</a>
                </div>
            </div>
            
            <!-- Услуга 3: Техническая поддержка -->
            <div class="col-12 col-md-3">
                <div class="holographic-service-card">
                    
                    <div class="service-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    
                    <h3 class="glitch-text" data-text="Техническая поддержка">Техническая поддержка</h3>
                    
                    <h4>
                        Полное сопровождение вашего сайта: обновления, 
                        резервное копирование, оптимизация производительности.
                    </h4>
                    
                    <ul class="service-features">
                        <li>Обновления</li>
                        <li>Резервное копирование</li>
                        <li>Оптимизация</li>
                        <li>24/7 поддержка</li>
                    </ul>
                    
                    <div class="service-price">от 2 000 ₽/мес</div>
                    
                    <!-- Калькулятор технической поддержки -->
                    <div class="service-calculator">
                        <div class="calculator-controls">
                            <div class="calc-form">
                                <div class="calc-group">
                                    <label for="support-level">Уровень поддержки:</label>
                                    <select id="support-level" name="support-level">
                                        <option value="basic">Базовый (2,000₽/мес)</option>
                                        <option value="standard" selected>Стандарт (4,000₽/мес)</option>
                                        <option value="premium">Премиум (6,000₽/мес)</option>
                                    </select>
                                </div>
                                
                                <div class="calc-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="backup-service" value="backup">
                                        <span class="checkmark"></span>
                                        <span class="checkbox-text">Дополнительное резервное копирование</span>
                                    </label>
                                </div>
                                
                                <div class="calc-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="security-monitoring" value="security">
                                        <span class="checkmark"></span>
                                        <span class="checkbox-text">Мониторинг безопасности</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="calc-result">
                            <div class="price-label">РАССЧИТАТЬ СТОИМОСТЬ:</div>
                            <div class="final-price">
                                <span id="support-calculated-price">2,000</span>
                                <span class="currency">₽/мес</span>
                            </div>
                        </div>
                    </div>
                    
                    <a href="#contact" class="btn-order">Заказать</a>
                </div>
            </div>
            
        </div>
        
    </div>
</section>

<?php get_footer(); // Подключаем подвал сайта ?>