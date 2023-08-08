import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const moreBtn = () => {
    const first = 4;
    const hidden = 'hidden';
    const target = '.item';
    const targets = document.querySelectorAll('.item');
    let add = 4;
    var addBtn = document.querySelector('#moreRead');     
  
    window.addEventListener('DOMContentLoaded', () => {
        let targetsLength = targets.length;

        if (targetsLength > first) {
            for (let i = first; i < targetsLength; i++) {
              targets[i].classList.add(hidden);
            }
        }
        else {
            addBtn.style.display = 'none';
        }
    });
    
    addBtn.addEventListener('click', () => {
        let hiddens = document.querySelectorAll(target + "." + hidden);
        if (hiddens.length < add) {
            add = hiddens.length;
        }
        for (let i = 0; i < add; i++) {
            hiddens[i].classList.remove(hidden);
        }
        if (document.querySelectorAll(target + "." + hidden).length == 0) {
            addBtn.style.display = 'none';
        }
    });
}
moreBtn();