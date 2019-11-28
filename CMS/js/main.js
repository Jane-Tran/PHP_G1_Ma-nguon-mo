const navSlider = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySeclector('.nav-links');

    burger.addEventListener('click', () =>{
        nav.classList.toggle('nav-active');
    });
}
const main = () => {
    navSlider();

    navSlider();

    navSlider();
    navSlider();

}