/**
 * TECHNO ORB - Революционная 3D карусель портфолио
 * Автор: MiniMax Agent
 * Версия: 1.0.0
 */

class TechnoOrbCarousel {
    constructor(container, options = {}) {
        this.container = typeof container === 'string' ? document.querySelector(container) : container;
        this.options = {
            radius: options.radius || 400,
            height: options.height || 300,
            maxVisible: options.maxVisible || 5,
            autoRotate: options.autoRotate || false,
            autoRotateDelay: options.autoRotateDelay || 5000,
            showControls: options.showControls !== false,
            showDots: options.showDots !== false,
            enableSwipe: options.enableSwipe !== false,
            enableKeyboard: options.enableKeyboard !== false,
            ...options
        };
        
        this.currentIndex = 0;
        this.items = [];
        this.isAnimating = false;
        this.startX = 0;
        this.endX = 0;
        this.touchStartTime = 0;
        
        this.init();
    }
    
    init() {
        this.createStructure();
        this.createEffects();
        this.bindEvents();
        this.updateCarousel();
        
        if (this.options.autoRotate) {
            this.startAutoRotate();
        }
    }
    
    createStructure() {
        // Создаем основные элементы
        this.orbContainer = document.createElement('div');
        this.orbContainer.className = 'techno-orb-container';
        
        this.sphereContainer = document.createElement('div');
        this.sphereContainer.className = 'techno-sphere-container';
        
        this.itemsContainer = document.createElement('div');
        this.itemsContainer.className = 'techno-items-container';
        
        // Создаем навигацию
        if (this.options.showControls) {
            this.createNavigation();
        }
        
        if (this.options.showDots) {
            this.createDots();
        }
        
        // Собираем структуру
        this.orbContainer.appendChild(this.sphereContainer);
        this.sphereContainer.appendChild(this.itemsContainer);
        this.container.appendChild(this.orbContainer);
        
        // Добавляем контролы если нужно
        if (this.options.showControls) {
            this.container.appendChild(this.prevBtn);
            this.container.appendChild(this.nextBtn);
        }
        
        if (this.options.showDots) {
            this.container.appendChild(this.dotsContainer);
        }
    }
    
    createNavigation() {
        this.prevBtn = document.createElement('button');
        this.prevBtn.className = 'techno-nav-btn techno-nav-prev';
        this.prevBtn.innerHTML = '‹';
        this.prevBtn.onclick = () => this.prev();
        
        this.nextBtn = document.createElement('button');
        this.nextBtn.className = 'techno-nav-btn techno-nav-next';
        this.nextBtn.innerHTML = '›';
        this.nextBtn.onclick = () => this.next();
    }
    
    createDots() {
        this.dotsContainer = document.createElement('div');
        this.dotsContainer.className = 'techno-dots-container';
    }
    
    createEffects() {
        // Создаем частицы
        this.createParticles();
        
        // Создаем сетку
        this.createGridOverlay();
        
        // Создаем скан-линии
        this.createScanLines();
    }
    
    createParticles() {
        const particlesContainer = document.createElement('div');
        particlesContainer.className = 'techno-particles';
        
        for (let i = 0; i < 50; i++) {
            const particle = document.createElement('div');
            particle.className = 'techno-particle';
            
            particle.style.left = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 20 + 's';
            particle.style.animationDuration = (15 + Math.random() * 10) + 's';
            
            particlesContainer.appendChild(particle);
        }
        
        this.orbContainer.appendChild(particlesContainer);
    }
    
    createGridOverlay() {
        const gridOverlay = document.createElement('div');
        gridOverlay.className = 'techno-grid-overlay';
        this.orbContainer.appendChild(gridOverlay);
    }
    
    createScanLines() {
        const scanLines = document.createElement('div');
        scanLines.className = 'techno-scan-lines';
        this.orbContainer.appendChild(scanLines);
    }
    
    bindEvents() {
        // Включаем свайпы для мобильных устройств
        if (this.options.enableSwipe) {
            this.bindSwipeEvents();
        }
        
        // Включаем управление клавиатурой
        if (this.options.enableKeyboard) {
            this.bindKeyboardEvents();
        }
        
        // События перетаскивания мышью
        this.bindMouseEvents();
    }
    
    bindSwipeEvents() {
        // Обработчик начала касания на мобильном телефоне/планшете
        this.itemsContainer.addEventListener('touchstart', (e) => {
            // Сохраняем координату X в момент начала касания
            this.startX = e.touches[0].clientX;
            // Запоминаем время начала касания для определения скорости
            this.touchStartTime = Date.now();
        });
        
        // Обработчик окончания касания (когда палец отпускают)
        this.itemsContainer.addEventListener('touchend', (e) => {
            // Получаем координату X в момент окончания касания
            this.endX = e.changedTouches[0].clientX;
            // Вычисляем разницу по X - направление свайпа
            const diff = this.startX - this.endX;
            // Вычисляем время проведения - для определения скорости
            const diffTime = Date.now() - this.touchStartTime;
            
            // Если движение дальше 50px И быстрее 300ms = это свайп
            if (Math.abs(diff) > 50 && diffTime < 300) {
                if (diff > 0) {
                    // Свайп влево = следующий элемент
                    this.next();
                } else {
                    // Свайп вправо = предыдущий элемент  
                    this.prev();
                }
            }
        });
    }
    
    bindMouseEvents() {
        // Переменные для отслеживания состояния перетаскивания мышью
        let isDragging = false;        // Флаг: тяну ли я мышкой?
        let dragStartX = 0;            // Начальная координата X при начале перетаскивания
        
        // Обработчик нажатия кнопки мыши на контейнере карусели
        this.itemsContainer.addEventListener('mousedown', (e) => {
            isDragging = true;         // Начинаем перетаскивание
            dragStartX = e.clientX;    // Сохраняем координату начала
            this.container.style.cursor = 'grabbing'; // Меняем курсор на "тянущий"
        });
        
        // Обработчик движения мыши по всему документу
        document.addEventListener('mousemove', (e) => {
            if (!isDragging) return;   // Если не перетаскиваем - ничего не делаем
            e.preventDefault();        // Блокируем выделение текста при перетаскивании
        });
        
        // Обработчик отпускания кнопки мыши в любом месте документа
        document.addEventListener('mouseup', (e) => {
            if (!isDragging) return;   // Если не перетаскивали - ничего не делаем
            
            isDragging = false;        // Заканчиваем перетаскивание
            this.container.style.cursor = 'grab'; // Возвращаем обычный курсор
            
            // Вычисляем разницу между началом и концом перетаскивания
            const diff = dragStartX - e.clientX;
            // Если перетащили больше 50px - это свайп мышью
            if (Math.abs(diff) > 50) {
                if (diff > 0) {
                    // Перетаскивание влево = следующий элемент
                    this.next();
                } else {
                    // Перетаскивание вправо = предыдущий элемент
                    this.prev();
                }
            }
        });
    }
    
    bindKeyboardEvents() {
        // Обработчик нажатия клавиш на клавиатуре
        document.addEventListener('keydown', (e) => {
            // Проверяем какая клавиша была нажата
            switch (e.key) {
                case 'ArrowLeft':
                    // Стрелка влево = предыдущий элемент
                    e.preventDefault();      // Блокируем прокрутку страницы стрелками
                    this.prev();
                    break;
                case 'ArrowRight':
                    // Стрелка вправо = следующий элемент
                    e.preventDefault();      // Блокируем прокрутку страницы стрелками
                    this.next();
                    break;
                case ' ':
                    // Пробел = включить/выключить автопрокрутку
                    e.preventDefault();      // Блокируем прокрутку страницы пробелом
                    this.toggleAutoRotate();
                    break;
            }
        });
    }
    
    addItem(content, options = {}) {
        const item = {
            content: content,
            ...options
        };
        
        this.items.push(item);
        this.renderItem(item);
        this.updateDots();
        this.updateCarousel();
    }
    
    renderItem(item) {
        const itemElement = document.createElement('div');
        itemElement.className = 'techno-item';
        itemElement.innerHTML = item.content;
        
        // Добавляем неоновый эффект при наведении
        itemElement.addEventListener('mouseenter', () => {
            itemElement.classList.add('techno-item-hover');
        });
        
        itemElement.addEventListener('mouseleave', () => {
            itemElement.classList.remove('techno-item-hover');
        });
        
        this.itemsContainer.appendChild(itemElement);
    }
    
    updateDots() {
        if (!this.options.showDots) return;
        
        this.dotsContainer.innerHTML = '';
        
        this.items.forEach((_, index) => {
            const dot = document.createElement('button');
            dot.className = 'techno-dot';
            if (index === this.currentIndex) {
                dot.classList.add('active');
            }
            
            dot.onclick = () => this.goTo(index);
            this.dotsContainer.appendChild(dot);
        });
    }
    
    updateCarousel() {
        if (this.isAnimating) return;
        
        this.isAnimating = true;
        
        const itemElements = this.itemsContainer.querySelectorAll('.techno-item');
        const totalItems = this.items.length;
        const stepAngle = 360 / Math.min(this.options.maxVisible, totalItems);
        
        itemElements.forEach((itemElement, index) => {
            const angle = (index - this.currentIndex) * stepAngle;
            const distance = this.options.radius;
            const height = this.options.height;
            
            // 3D трансформации для создания сферы
            const x = Math.sin(angle * Math.PI / 180) * distance;
            const z = Math.cos(angle * Math.PI / 180) * distance;
            const y = Math.sin(angle * Math.PI / 180) * (height * 0.3);
            const scale = Math.max(0.3, Math.min(1, (z + distance) / (distance * 2)));
            const opacity = Math.max(0.3, Math.min(1, (z + distance) / (distance * 2)));
            
            itemElement.style.transform = `
                translate3d(${x}px, ${y}px, ${z}px) 
                scale(${scale}) 
                rotateY(${-angle}deg)
            `;
            itemElement.style.opacity = opacity;
            itemElement.style.zIndex = Math.round(scale * 100);
        });
        
        setTimeout(() => {
            this.isAnimating = false;
        }, 600);
    }
    
    next() {
        if (this.isAnimating) return;
        this.currentIndex = (this.currentIndex + 1) % this.items.length;
        this.updateDots();
        this.updateCarousel();
        
        // Эффект клика
        this.container.classList.add('techno-click-effect');
        setTimeout(() => {
            this.container.classList.remove('techno-click-effect');
        }, 200);
    }
    
    prev() {
        if (this.isAnimating) return;
        this.currentIndex = (this.currentIndex - 1 + this.items.length) % this.items.length;
        this.updateDots();
        this.updateCarousel();
        
        // Эффект клика
        this.container.classList.add('techno-click-effect');
        setTimeout(() => {
            this.container.classList.remove('techno-click-effect');
        }, 200);
    }
    
    goTo(index) {
        if (this.isAnimating) return;
        this.currentIndex = index;
        this.updateDots();
        this.updateCarousel();
    }
    
    startAutoRotate() {
        if (this.autoRotateInterval) {
            clearInterval(this.autoRotateInterval);
        }
        
        this.autoRotateInterval = setInterval(() => {
            this.next();
        }, this.options.autoRotateDelay);
    }
    
    stopAutoRotate() {
        if (this.autoRotateInterval) {
            clearInterval(this.autoRotateInterval);
            this.autoRotateInterval = null;
        }
    }
    
    toggleAutoRotate() {
        if (this.autoRotateInterval) {
            this.stopAutoRotate();
        } else {
            this.startAutoRotate();
        }
    }
    
    destroy() {
        this.stopAutoRotate();
        this.container.innerHTML = '';
    }
}

// Автоматическая инициализация для элементов с классом .techno-orb-carousel
document.addEventListener('DOMContentLoaded', function() {
    const carousels = document.querySelectorAll('.techno-orb-carousel');
    
    carousels.forEach((carouselElement) => {
        const config = {
            radius: parseInt(carouselElement.dataset.radius) || 400,
            height: parseInt(carouselElement.dataset.height) || 300,
            maxVisible: parseInt(carouselElement.dataset.maxVisible) || 5,
            autoRotate: carouselElement.dataset.autoRotate === 'true',
            autoRotateDelay: parseInt(carouselElement.dataset.autoRotateDelay) || 5000,
            showControls: carouselElement.dataset.showControls !== 'false',
            showDots: carouselElement.dataset.showDots !== 'false',
            enableSwipe: carouselElement.dataset.enableSwipe !== 'false',
            enableKeyboard: carouselElement.dataset.enableKeyboard !== 'false'
        };
        
        const carousel = new TechnoOrbCarousel(carouselElement, config);
        
        // Добавляем демо-данные
        const demoItems = carouselElement.querySelectorAll('.techno-orb-item');
        demoItems.forEach(item => {
            carousel.addItem(item.innerHTML);
        });
        
        // Скрываем оригинальные элементы
        demoItems.forEach(item => {
            item.style.display = 'none';
        });
    });
});