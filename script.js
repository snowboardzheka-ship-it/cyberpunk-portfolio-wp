/**
 * My Portfolio - JavaScript файл
 * 
 * Этот файл содержит все JavaScript функции для интерактивности темы.
 * 
 * Основные функции: (добавлю в будущем)
 * - Анимация печатной машинки в hero секции
 * - Плавная прокрутка по якорным ссылкам
 * - Калькулятор стоимости проектов
 * - Фильтрация портфолио
 */

// Принудительное удаление всех буллетов списка (исправляет белый пиксель)
function removeAllBullets() {
    // Находим все возможные селекторы навигации
    const menuSelectors = [
        '.nav-menu',
        '#primary-menu', 
        '.menu',
        'nav ul',
        '.site-header ul',
        'header ul',
        'header nav ul'
    ];
    
    // Убираем буллеты для всех найденных меню
    menuSelectors.forEach(selector => {
        const menus = document.querySelectorAll(selector);
        menus.forEach(menu => {
            // Убираем буллеты с основного UL
            menu.style.listStyle = 'none';
            menu.style.listStyleType = 'none';
            
            // Убираем буллеты со всех LI элементов
            const listItems = menu.querySelectorAll('li');
            listItems.forEach(li => {
                li.style.listStyle = 'none';
                li.style.listStyleType = 'none';
                li.style.margin = '0';
                li.style.padding = '0';
            });
        });
    });
}

// Запускаем функцию после загрузки DOM
document.addEventListener('DOMContentLoaded', removeAllBullets);

// Запускаем снова после полной загрузки страницы
window.addEventListener('load', removeAllBullets);

// Периодически проверяем (для динамически добавляемого контента)
setInterval(removeAllBullets, 500);
/* - Мобильное меню
 * - Параллакс эффекты
 * - FAQ аккордеон
 * - Анимации при прокрутке
 */

// Ждем полной загрузки DOM
document.addEventListener('DOMContentLoaded', function() {
    
    // ===================================================================
    // ИНИЦИАЛИЗАЦИЯ ВСЕХ ФУНКЦИЙ
    // ===================================================================
    
    initTypingAnimation();    // Анимация печатной машинки для главной
    initPortfolioTyping();    // Анимация печатной машинки для портфолио
    initServicesTyping();     // Анимация печатной машинки для услуг
    initContactsTyping();     // Анимация печатной машинки для контактов
    initMobileMenu();         // Мобильное меню
    initCalculators();        // Калькуляторы стоимости
    /*initPortfolioFilter();    // Фильтр портфолио */
    /*initFAQAccordion();       // FAQ аккордеон */
    initParallaxEffects();    // Параллакс эффекты */
    initBackToTop();          // Кнопка "Наверх"
    /*initContactForm();        // Обработка формы контактов */
    initSkillBars();          // Анимация прогресс-баров */
    initGlitchEffects();          // Глитч-эффекты для заголовков */

    console.log('My Portfolio: Все функции инициализированы');

});

/**
 * JavaScript код для интерактивности подвала
 * Этот код выполняется после загрузки всех скриптов WordPress
 */

document.addEventListener('DOMContentLoaded', function() {
    
    // Кнопка "Наверх"
    const backToTopButton = document.getElementById('back-to-top');
    
    if (backToTopButton) {
        // Показываем/скрываем кнопку при прокрутке
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('visible');
            } else {
                backToTopButton.classList.remove('visible');
            }
        });
        
        // Плавная прокрутка наверх при клике
        backToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Анимация появления элементов при скролле
    const footerSections = document.querySelectorAll('.footer-section');
    
    function animateOnScroll() {
        footerSections.forEach(section => {
            const sectionTop = section.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (sectionTop < windowHeight * 0.8) {
                section.classList.add('animate-in');
            }
        });
    }
    
    window.addEventListener('scroll', animateOnScroll);
    
});

/**
 * ===================================================================
 * АНИМАЦИЯ ПРОГРЕСС-БАРОВ
 * ===================================================================
 * 
 * Анимирует прогресс-бары навыков при их появлении.
 */
function initSkillBars() {
    const skillBars = document.querySelectorAll('.skill-progress, .progress-bar');
    
    if (skillBars.length === 0) return;
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const progressBar = entry.target;
                const progress = progressBar.getAttribute('data-progress');
                
                if (progress) {
                    setTimeout(() => {
                        progressBar.style.width = progress + '%';
                    }, 500);
                }
                
                observer.unobserve(progressBar);
            }
        });
    }, { threshold: 0.5 });
    
    skillBars.forEach(bar => {
        observer.observe(bar);
    });
}

/**
 * ===================================================================
 * МОБИЛЬНОЕ МЕНЮ
 * ===================================================================
 * 
 * Управляет открытием/закрытием мобильного меню.
 * Добавляет анимацию бургер-иконки.
 */
function initMobileMenu() {
    const menuToggle = document.querySelector('.mobile-menu-toggle');
    const navMenu = document.querySelector('.nav-menu');
    
    console.log('🔍 Ищем мобильное меню:', { menuToggle, navMenu });
    
    if (!menuToggle || !navMenu) {
        console.warn('⚠️ Элементы мобильного меню не найдены:', {
            toggle: !!menuToggle,
            menu: !!navMenu
        });
        return;
    }
    
    console.log('✅ Мобильное меню найдено, инициализируем...');
    
    // Обработчик клика по кнопке бургер-меню
    menuToggle.addEventListener('click', function(e) {
        e.preventDefault();
        console.log('🍔 Бургер-меню кликнуто');
        
        // Переключаем классы
        this.classList.toggle('active');
        navMenu.classList.toggle('active');
        
        // Обновляем ARIA атрибуты для доступности
        const isExpanded = this.classList.contains('active');
        this.setAttribute('aria-expanded', isExpanded);
        
        // Блокируем/разблокируем скролл страницы
        document.body.classList.toggle('menu-open', isExpanded);
        
        console.log('📱 Мобильное меню состояние:', isExpanded ? 'ОТКРЫТО' : 'ЗАКРЫТО');
    });
    
    // Закрываем меню при клике вне его
    document.addEventListener('click', function(e) {
        if (!menuToggle.contains(e.target) && !navMenu.contains(e.target)) {
            if (navMenu.classList.contains('active')) {
                console.log('🔒 Закрываем меню (клик вне области)');
                menuToggle.classList.remove('active');
                navMenu.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.classList.remove('menu-open');
            }
        }
    });
    
    // Закрываем меню при изменении размера окна (переход на десктоп)
    window.addEventListener('resize', function() {
        if (window.innerWidth > 767) {
            if (navMenu.classList.contains('active')) {
                console.log('📱➡️💻 Закрываем меню (переход на десктоп)');
                menuToggle.classList.remove('active');
                navMenu.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.classList.remove('menu-open');
            }
        }
    });
    
    // Закрываем меню при клике на ссылку меню
    const menuLinks = navMenu.querySelectorAll('a');
    menuLinks.forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth <= 767 && navMenu.classList.contains('active')) {
                console.log('🔗 Ссылка меню кликнута, закрываем меню');
                menuToggle.classList.remove('active');
                navMenu.classList.remove('active');
                menuToggle.setAttribute('aria-expanded', 'false');
                document.body.classList.remove('menu-open');
            }
        });
    });
    
    console.log('✅ Мобильное меню полностью инициализировано!');
}
/**
 * ===================================================================
 * ГОЛОГРАФИЧЕСКИЕ ЭФФЕКТЫ
 * ===================================================================
 */

/**
 * Инициализация глитч-эффектов для заголовков
 */
function initGlitchEffects() {
    const glitchElements = document.querySelectorAll('.glitch-text');
    
    glitchElements.forEach(element => {
        // Добавляем динамические глитч-эффекты при наведении
        element.addEventListener('mouseenter', function() {
            this.style.animation = 'glitch 0.1s infinite, glitch-1 0.1s infinite, glitch-2 0.1s infinite';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.animation = 'glitch 3s infinite';
        });
    });
    

}

/**
 * ===================================================================
 * ПАРАЛЛАКС ЭФФЕКТЫ
 * ===================================================================
*/
function initParallaxEffects() {
    const heroSection = document.querySelector('.hero-section');
    const aboutSection = document.querySelector('.about-section');
    
    if (!heroSection || !aboutSection) {
        console.warn('⚠️ Секции для параллакса не найдены');
        return;
    }
    
    // Обработчик скролла для параллакс эффекта
    window.addEventListener('scroll', function() {
        const scrolled = window.pageYOffset;
        const heroHeight = heroSection.offsetHeight;
        const windowHeight = window.innerHeight;
        
        // Параллакс эффект только когда hero секция видна
        if (scrolled < heroHeight) {
            const parallaxSpeed = scrolled * 0.5;
            
            // Двигаем hero секцию медленнее чем скролл
            heroSection.style.transform = `translateY(${parallaxSpeed}px)`;
            
            // Расчет прозрачности hero контента при скролле
            const opacity = 1 - (scrolled / (heroHeight * 0.8));
            const heroContent = document.getElementById('hero');

            if (heroContent) {
                heroContent.style.opacity = Math.max(0, opacity);
            }
        }
        
        // Анимация появления about секции
        const aboutOffset = aboutSection.offsetTop;
        const aboutVisible = scrolled + windowHeight > aboutOffset;
        
        if (aboutVisible) {
            aboutSection.style.transform = 'translateY(0)';
            aboutSection.style.opacity = '1';
        }
    });
    
    // Инициальная позиция about секции для анимации
    aboutSection.style.transform = 'translateY(50px)';
    aboutSection.style.opacity = '0';
    aboutSection.style.transition = 'all 0.6s ease';
    

}


/**
 * ===================================================================
 * КНОПКА "НАВЕРХ"
 * ===================================================================
 * 
 * Показывает/скрывает кнопку "Наверх" и обрабатывает клик.
*/
function initBackToTop() {
    const backToTopButton = document.getElementById('back-to-top');
    
    if (!backToTopButton) return;
    
    // Показываем/скрываем кнопку при прокрутке
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.add('visible');
        } else {
            backToTopButton.classList.remove('visible');
        }
    });
    
    // Плавная прокрутка наверх
    backToTopButton.addEventListener('click', function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// ===================================================================
// КАЛЬКУЛЯТОРЫ СТОИМОСТИ УСЛУГ
// ===================================================================

/**
 * ИСПРАВЛЕНИЯ 2025-11-14 00:36:22:
 * ✅ Добавлены проверки на наличие элементов калькуляторов
 * ✅ Калькуляторы инициализируются только на страницах где есть их элементы
 * ✅ Убраны console.error из функций инициализации
 * ✅ Теперь нет ошибок "Missing required elements" на страницах без калькуляторов
 * ✅ Сфера (3D карусель) возвращена и работает корректно
 */

// ИСПРАВЛЕНО 2025-11-14: Калькуляторы теперь умные

/**
 * Форматирование цены для отображения
 */
function formatPrice(price) {
    return price.toLocaleString('ru-RU');
}

/**
 * Инициализация всех калькуляторов стоимости
 */
function initCalculators() {

    // Проверяем наличие элементов калькуляторов на странице
    // Калькуляторы инициализируются только если они действительно есть на странице
    
    const webdevElements = document.querySelectorAll('#pages-count, #webdev-calculated-price');
    if (webdevElements.length >= 2) {
        initWebDevCalculator();
    }
    
    const designElements = document.querySelectorAll('#project-complexity, #design-calculated-price');
    if (designElements.length >= 2) {
        initDesignCalculator();
    }
    
    const supportElements = document.querySelectorAll('#support-level, #support-calculated-price');
    if (supportElements.length >= 2) {
        initSupportCalculator();
    }

}

/**
 * Калькулятор веб-разработки
 */
function initWebDevCalculator() {
    const selectElement = document.getElementById('pages-count');
    const checkboxCMS = document.querySelector('input[name="cms"]');
    const checkboxSEO = document.querySelector('input[name="seo"]');
    const priceElement = document.getElementById('webdev-calculated-price');
    
    function calculatePrice() {
        const basePrice = 15000; // Базовая цена 15,000₽
        const pagesPrice = 2000; // 2,000₽ за каждую страницу
        const cmsPrice = 5000;   // 5,000₽ за CMS
        const seoPrice = 3000;   // 3,000₽ за SEO
        
        const pages = parseInt(selectElement.value) || 0;
        const isCMSChecked = checkboxCMS && checkboxCMS.checked;
        const isSEOChecked = checkboxSEO && checkboxSEO.checked;
        
        const totalPrice = basePrice + (pages * pagesPrice) + 
                          (isCMSChecked ? cmsPrice : 0) + 
                          (isSEOChecked ? seoPrice : 0);
        
        priceElement.textContent = formatPrice(totalPrice);
    }
    
    // Обработчики событий
    selectElement.addEventListener('change', calculatePrice);
    if (checkboxCMS) checkboxCMS.addEventListener('change', calculatePrice);
    if (checkboxSEO) checkboxSEO.addEventListener('change', calculatePrice);
    
    // Первоначальный расчет
    calculatePrice();
}

/**
 * Калькулятор UI/UX дизайна
 */
function initDesignCalculator() {
    const selectElement = document.getElementById('project-complexity');
    const checkboxResearch = document.querySelector('input[name="user-research"]');
    const checkboxPrototype = document.querySelector('input[name="interactive-prototype"]');
    const priceElement = document.getElementById('design-calculated-price');
    
    function calculatePrice() {
        const basePrices = {
            'simple': 8000,    // Простой: 8,000₽
            'medium': 12000,   // Средний: 12,000₽ (базовая цена)
            'complex': 18000   // Сложный: 18,000₽
        };
        
        const researchPrice = 4000;   // 4,000₽ за исследование
        const prototypePrice = 6000;  // 6,000₽ за прототип
        
        const complexity = selectElement.value || 'medium';
        const basePrice = basePrices[complexity] || 12000;
        const isResearchChecked = checkboxResearch && checkboxResearch.checked;
        const isPrototypeChecked = checkboxPrototype && checkboxPrototype.checked;
        
        const totalPrice = basePrice + 
                          (isResearchChecked ? researchPrice : 0) + 
                          (isPrototypeChecked ? prototypePrice : 0);
        
        priceElement.textContent = formatPrice(totalPrice);
    }
    
    // Обработчики событий
    selectElement.addEventListener('change', calculatePrice);
    if (checkboxResearch) checkboxResearch.addEventListener('change', calculatePrice);
    if (checkboxPrototype) checkboxPrototype.addEventListener('change', calculatePrice);
    
    // Первоначальный расчет
    calculatePrice();
}

/**
 * Калькулятор технической поддержки
 */
function initSupportCalculator() {
    const selectElement = document.getElementById('support-level');
    const checkboxBackup = document.querySelector('input[name="backup-service"]');
    const checkboxSecurity = document.querySelector('input[name="security-monitoring"]');
    const priceElement = document.getElementById('support-calculated-price');
    
    function calculatePrice() {
        const levelPrices = {
            'basic': 2000,     // Базовый: 2,000₽/мес
            'standard': 4000,  // Стандарт: 4,000₽/мес
            'premium': 6000    // Премиум: 6,000₽/мес
        };
        
        const backupPrice = 1500;    // 1,500₽/мес за резервное копирование
        const securityPrice = 2000;  // 2,000₽/мес за мониторинг
        
        const level = selectElement.value || 'standard';
        const basePrice = levelPrices[level] || 4000;
        const isBackupChecked = checkboxBackup && checkboxBackup.checked;
        const isSecurityChecked = checkboxSecurity && checkboxSecurity.checked;
        
        const totalPrice = basePrice + 
                          (isBackupChecked ? backupPrice : 0) + 
                          (isSecurityChecked ? securityPrice : 0);
        
        priceElement.textContent = formatPrice(totalPrice) + ' ₽/мес';
    }
    
    // Обработчики событий
    selectElement.addEventListener('change', calculatePrice);
    if (checkboxBackup) checkboxBackup.addEventListener('change', calculatePrice);
    if (checkboxSecurity) checkboxSecurity.addEventListener('change', calculatePrice);
    
    // Первоначальный расчет
    calculatePrice();
}

/**
 * Инициализация ховер эффекта курсора для названия сайта
 */
function initCursorEffect() {
    const siteTitle = document.querySelector('.site-title a');
    
    if (!siteTitle) return;
    
    // Создаем элемент для точки курсора
    const cursorDot = document.createElement('div');
    cursorDot.className = 'cursor-dot';
    cursorDot.style.cssText = `
        position: absolute;
        width: 8px;
        height: 8px;
        background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
        border-radius: 50%;
        pointer-events: none;
        z-index: 9999;
        transition: all 0.1s ease;
        opacity: 0;
        box-shadow: 0 0 10px var(--primary-color);
    `;
    
    document.body.appendChild(cursorDot);
    
    // Обработчики для наведения и убирания
    siteTitle.addEventListener('mouseenter', function(e) {
        cursorDot.style.opacity = '1';
        moveCursor(e);
    });
    
    siteTitle.addEventListener('mouseleave', function() {
        cursorDot.style.opacity = '0';
    });
    
    siteTitle.addEventListener('mousemove', moveCursor);
    
    // Функция движения курсора
    function moveCursor(e) {
        cursorDot.style.left = (e.clientX - 4) + 'px';
        cursorDot.style.top = (e.clientY - 4) + 'px';
    }
}

/**
 * ===================================================================
 * АНИМАЦИЯ ПЕЧАТНОЙ МАШИНКИ
 * ===================================================================
 * 
 * Создает эффект печатной машинки для текста в hero секции.
 * Текст печатается, удаляется и заменяется на новый.
 */
function initTypingAnimation() {
    const typingElement = document.getElementById('typing-text');
    const heroTitle = document.querySelector('.hero-title');
    
    if (!typingElement || !heroTitle) return;
    
    const texts = [
        'Привет! Я веб-разработчик',
        'Создаю современные сайты',
        'Специализируюсь на WordPress',
        'Увлечен техно-дизайном',
        'Готов к новым проектам!'
    ];
    
    let textIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    
    // Включаем стабильный режим для плавной печати
    heroTitle.classList.add('typewriter-stable');
    
    function typeText() {
        const currentText = texts[textIndex];
        
        if (isDeleting) {
            // Удаляем символы
            typingElement.textContent = currentText.substring(0, charIndex - 1);
            charIndex--;
        } else {
            // Добавляем символы
            typingElement.textContent = currentText.substring(0, charIndex + 1);
            charIndex++;
        }
        
        let typeSpeed = isDeleting ? 50 : 100;
        
        // НЕЗАВИСИМЫЕ ФОНОВЫЕ ЭФФЕКТЫ - всегда активны
        // Переключаем только интенсивность свечения текста
        if (!isDeleting && charIndex === currentText.length) {
            // ФАЗА: ПЕЧАТЬ ЗАВЕРШЕНА - интенсивное свечение
            typeSpeed = 2000;
            
            // Включаем интенсивное свечение (НО НЕ фон - фон всегда активен)
            heroTitle.classList.add('hero-title-intense');
            heroTitle.classList.remove('typewriter-stable');
            
            setTimeout(() => {
                isDeleting = true;
            }, 2000);
            
        } else if (isDeleting && charIndex === 0) {
            // ФАЗА: СТИРАНИЕ ЗАВЕРШЕНО - интенсивное свечение остается
            isDeleting = false;
            textIndex = (textIndex + 1) % texts.length;
            typeSpeed = 2000;
            
            // НЕ выключаем интенсивное свечение - оставляем на паузе
        }
        
        setTimeout(typeText, typeSpeed);
        
    }
    typeText() 
}

    // Эффект печатной машинки для заголовка ПОРТФОЛИО
    function initPortfolioTyping() {
        const typingElement = document.getElementById('portfolio-typing-text');
        const portfolioTitle = document.querySelector('.portfolio-title');
        
        if (!typingElement || !portfolioTitle) return;
        
        const portfolioTexts = [
            'ПОРТФОЛИО',
            'МОИ ПРОЕКТЫ',
            'ВЕБ-РАЗРАБОТКА',
            'СОВРЕМЕННЫЕ САЙТЫ',
            'МОЕ ПОРТФОЛИО'
        ];
        
        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        
        // Включаем стабильный режим для плавной печати
        portfolioTitle.classList.add('typewriter-stable');
        
        function typePortfolioText() {
            const currentText = portfolioTexts[textIndex];
            
            if (isDeleting) {
                typingElement.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
            } else {
                typingElement.textContent = currentText.substring(0, charIndex + 1);
                charIndex++;
            }
            
            let typeSpeed = isDeleting ? 30 : 80;
            
                // НЕЗАВИСИМЫЕ ФОНОВЫЕ ЭФФЕКТЫ - всегда активны
            // Переключаем только интенсивность свечения текста
            if (!isDeleting && charIndex === currentText.length) {
                // ФАЗА: ПЕЧАТЬ ЗАВЕРШЕНА - интенсивное свечение
                typeSpeed = 2000;
                
                // Включаем интенсивное свечение (НО НЕ фон - фон всегда активен)
                portfolioTitle.classList.add('portfolio-title-intense');
                portfolioTitle.classList.remove('typewriter-stable');
                
                setTimeout(() => {
                    isDeleting = true;
                }, 2000);
                
            } else if (isDeleting && charIndex === 0) {
                // ФАЗА: СТИРАНИЕ ЗАВЕРШЕНО - интенсивное свечение остается
                isDeleting = false;
                textIndex = (textIndex + 1) % portfolioTexts.length;
                typeSpeed = 2000;
                
                // НЕ выключаем интенсивное свечение - оставляем на паузе
            }
            
            setTimeout(typePortfolioText, typeSpeed);
        }
        
        typePortfolioText();
        
    }

    // Эффект печатной машинки для заголовка КОНТАКТОВ  
    function initContactsTyping() {
        const typingElement = document.getElementById('contacts-typing-text');
        const contactsTitle = document.querySelector('.contacts-title');
        
        if (!typingElement || !contactsTitle) return;
        
        const contactsTexts = [
            'Связаться со мной',
            'Contact Me',
            'Напишите мне',
            'Get in Touch'
        ];
        
        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        
        // Включаем стабильный режим для плавной печати
        contactsTitle.classList.add('typewriter-stable');
        
        function typeContactsText() {
            const currentText = contactsTexts[textIndex];
            
            if (isDeleting) {
                typingElement.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
            } else {
                typingElement.textContent = currentText.substring(0, charIndex + 1);
                charIndex++;
            }
            
            let typeSpeed = isDeleting ? 40 : 90;
            
            if (!isDeleting && charIndex === currentText.length) {
                // ФАЗА: ПЕЧАТЬ ЗАВЕРШЕНА - интенсивное свечение
                typeSpeed = 2000;
                
                // Включаем интенсивное свечение
                contactsTitle.classList.add('contacts-title-intense');
                contactsTitle.classList.remove('typewriter-stable');
                
                setTimeout(() => {
                    isDeleting = true;
                }, 2000);
                
            } else if (isDeleting && charIndex === 0) {
                // ФАЗА: СТИРАНИЕ ЗАВЕРШЕНО - интенсивное свечение остается
                isDeleting = false;
                textIndex = (textIndex + 1) % contactsTexts.length;
                typeSpeed = 2000;
            }
            
            setTimeout(typeContactsText, typeSpeed);
        }
        
        typeContactsText();
        
    }

    // Эффект печатной машинки для заголовка УСЛУГ
    function initServicesTyping() {
        const typingElement = document.getElementById('services-typing-text');
        if (!typingElement) return;
        
        const servicesTexts = [
            'МОИ УСЛУГИ',
            'ВЕБ-РАЗРАБОТКА',
            'WEB DESIGN',
            'СОВРЕМЕННЫЕ РЕШЕНИЯ',
            'ТЕХНИЧЕСКАЯ ПОДДЕРЖКА'
        ];
        
        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        
        function typeServicesText() {
            const currentText = servicesTexts[textIndex];
            
            if (isDeleting) {
                typingElement.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
            } else {
                typingElement.textContent = currentText.substring(0, charIndex + 1);
                charIndex++;
            }
            
            let typeSpeed = isDeleting ? 40 : 90;
            
            if (!isDeleting && charIndex === currentText.length) {
                typeSpeed = 2000;
                isDeleting = true;
            } else if (isDeleting && charIndex === 0) {
                isDeleting = false;
                textIndex = (textIndex + 1) % servicesTexts.length;
                typeSpeed = 500;
            }
            
            setTimeout(typeServicesText, typeSpeed);
        }
        
        typeServicesText();
        
    }
/**
 * Инициализация печатной машинки для гибридного заголовка
 */
function initTypewriterEffect() {
    const typewriterTitle = document.querySelector('.typewriter-holographic-title');
    const cursor = document.querySelector('.typewriter-cursor');
    
    if (!typewriterTitle || !cursor) return;
    
    const text = typewriterTitle.textContent;
    typewriterTitle.textContent = '';
    typewriterTitle.setAttribute('data-original-text', text);
    
    let i = 0;
    const speed = 100; // скорость печати в миллисекундах
    
    function typeWriter() {
        if (i < text.length) {
            typewriterTitle.textContent += text.charAt(i);
            i++;
            setTimeout(typeWriter, speed);
        } else {
            // После завершения печати, курсор продолжает мигать
            console.log('✅ Печатная машинка завершена');
        }
    }
    
    // Запускаем печатную машинку через небольшую задержку
    setTimeout(typeWriter, 500);
    
    console.log('✅ Печатная машинка инициализирована');
}