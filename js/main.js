const menubtn = document.querySelector('.menubtn-box');
const menu = document.querySelector('.links');

menubtn.addEventListener('click', () =>{
    menu.classList.toggle('active');
    menubtn.classList.toggle('active');
    console.log('clickes');
});