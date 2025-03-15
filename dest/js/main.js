document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('.menu-toggle');
    const navigation = document.querySelector('.site-navigation');

    menuToggle.addEventListener('click', () => {
        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        menuToggle.setAttribute('aria-expanded', !isExpanded);
        navigation.classList.toggle('active');


        // Ajustar los estilos dinámicamente
        if (menuToggle.classList.contains('active')) {
            navigation.style.transform = 'translateX(100vw)';
        } else {
            navigation.style.transform = 'translateX(0)';

        }

        
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const menuToggle = document.querySelector('.menu-toggle');
    const navBurger = document.querySelector('.nav__burger');
    const navClose = document.querySelector('.nav__close');

    menuToggle.addEventListener('click', () => {
        // Alternar la clase `active` para activar los estilos CSS
        menuToggle.classList.toggle('active');
        
        // Ajustar el atributo ARIA
        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        menuToggle.setAttribute('aria-expanded', !isExpanded);

        // Ajustar los estilos dinámicamente
        if (menuToggle.classList.contains('active')) {
            navBurger.style.opacity = '0';
            navBurger.style.transform = 'rotate(90deg)';
            navClose.style.opacity = '1';
            navClose.style.transform = 'rotate(0deg)';
        } else {
            navBurger.style.opacity = '1';
            navBurger.style.transform = 'rotate(0deg)';
            navClose.style.opacity = '0';
            navClose.style.transform = 'rotate(90deg)';
        }
    });
});
