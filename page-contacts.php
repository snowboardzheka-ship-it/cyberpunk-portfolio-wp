<?php
/**
 * Template Name: Страница контактов - Brain-Implant Concept
 * 
 * КОНЦЕПЦИЯ: Нейронная сеть мозга с имплантом
 * ЭФФЕКТЫ: Glitch, Neon Glow, Анимации, Hover
 * ЦВЕТА: Cyan, Purple, Green (неоновые)
 */

// Страница контактов не требует цикла WordPress
get_header();
?>

<!-- ===================================================================
     BRAIN-IMPLANT КОНТАКТЫ - ПОЛНАЯ КОНЦЕПЦИЯ
     =================================================================== -->

<div class="contacts-page">

<!-- Герой секция -->
<section class="contacts-hero">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-12 col-lg-8">
                <h1 class="contacts-title" data-text="Связаться со мной">
                    <span id="contacts-typing-text"></span><span class="typewriter-cursor">|</span>
                </h1>
                <h4 class="contacts-subtitle">
                    Готов обсудить ваш проект и воплотить ваши идеи в жизнь
                </h4>
                <div class="contact-availability">
                    <span class="status-indicator online"></span>
                    <span class="status-text glitch-text" data-text="Сейчас онлайн">Сейчас онлайн</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===================================================================
     ОСНОВНОЙ КОНТЕНТ - BRAIN-IMPLANT КОНЦЕПЦИЯ
     =================================================================== -->
        
<div class="brain-implant-section">
    <div class="container">
        <div class="brain-layout">
            <!-- ГОЛОГРАФИЧЕСКИЙ ФОН -->
            <div class="layout-hologram-bg">
                <!-- Нейронные узлы -->
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                <div class="layout-hologram-node"></div>
                
                <!-- Соединения -->
                <div class="layout-hologram-connection"></div>
                <div class="layout-hologram-connection"></div>
                <div class="layout-hologram-connection"></div>
                <div class="layout-hologram-connection"></div>
                <div class="layout-hologram-connection"></div>
                <div class="layout-hologram-connection"></div>
                
                <!-- Пульсации -->
                <div class="layout-hologram-pulse"></div>
                <div class="layout-hologram-pulse"></div>
                
                <!-- Общая активность -->
                <div class="layout-hologram-activity"></div>
            </div>
            
            <!-- ЛЕВАЯ КОЛОНКА: НЕЙРОНЫ (КОНТАКТЫ) -->
            <div class="brain-neurons">
                
                <!-- EMAIL НЕЙРОН -->
                <div class="neuron neuron-email">
                    <h3 class="glitch-text" data-text="EMAIL">EMAIL</h3>
                    <div class="neuron-details">
                        <p class="contact-info" data-text="your.email@domain.com">your.email@domain.com</p>
                    </div>
                </div>

                <!-- PHONE НЕЙРОН -->
                <div class="neuron neuron-phone">
                    <h3 class="glitch-text" data-text="PHONE">PHONE</h3>
                    <div class="neuron-details">
                        <p class="contact-info" data-text="+7 (999) 123-45-67">+7 (999) 123-45-67</p>
                    </div>
                </div>

                <!-- TELEGRAM НЕЙРОН -->
                <div class="neuron neuron-telegram">
                    <h3 class="glitch-text" data-text="TELEGRAM">TELEGRAM</h3>
                    <div class="neuron-details">
                        <p class="contact-info" data-text="@yourusername">@yourusername</p>
                    </div>
                </div>

            </div>

           <div class="element">
                    <div class="neural-cube">
                        <div class="cube-face"></div>
                        <div class="cube-face"></div>
                        <div class="cube-face"></div>
                        <div class="cube-face"></div>
                        <div class="cube-face"></div>
                        <div class="cube-face"></div>
                    </div>
                    <div class="digital-octahedron">
                        <div class="octa-face"></div>
                        <div class="octa-face"></div>
                        <div class="octa-face"></div>
                        <div class="octa-face"></div>
                        <div class="octa-core"></div>
                    </div>
                </div>

            <!-- ПРАВАЯ КОЛОНКА: ИНТЕРФЕЙС СВЯЗИ (ФОРМА) -->
            <div class="interface-connection">
                <div class="connection-panel">
                    <h3 class="neural-interface-title">
                    <h3 class="glitch-text" data-text="NEURAL INTERFACE">NEURAL INTERFACE</h3>
                    <form class="contact-form">
                        <div class="form-group">
                            <label class="form-text" data-text="ИМЯ">ИМЯ</label>
                            <input type="text" name="name" placeholder="Ваше имя">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-text" data-text="EMAIL">EMAIL</label>
                            <input type="email" name="email" placeholder="your@email.com">
                        </div>
                        
                        <div class="form-group">
                            <label class="form-text" data-text="СООБЩЕНИЕ">СООБЩЕНИЕ</label>
                            <textarea name="message" placeholder="Ваше сообщение"></textarea>
                        </div>
                        
                        <button type="submit" class="submit-btn" data-text="ОТПРАВИТЬ">ОТПРАВИТЬ</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

</div>

<?php get_footer(); ?>