const moreBtn = () => {
    const first = 10;
    const hidden = 'hidden';
    const target = '.item';
    const targets = document.querySelectorAll('.item');
    
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

/*let select = document.querySelector(`select[name='order-select']`);
select.addEventListener(`change`, () => {
    if ( select.options[1] == '新しい順'){
        thread_date.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
    }
    else{
        thread_date.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
    }
});*/