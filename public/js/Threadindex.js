const moreBtn = () => {
    const first = 10;
    const hidden = 'hidden';
    const target = '.item_child';
    const targets = document.querySelectorAll('.item_child');
    
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
        //スレッド順選択機能
        var inputSelect = document.querySelector('[name="input-select"]');

        inputSelect.addEventListener('change',function(){
        const tableBody = document.querySelector('.table tbody');
        const rows = Array.from(document.querySelectorAll('.item_child'));
        
        if (inputSelect.value === 'desc') {
            rows.sort((a, b) => {
                const dateA = new Date(a.querySelector('.item_child_content').textContent);
                const dateB = new Date(b.querySelector('.item_child_content').textContent);
                console.log('dateA',dateA);
                return dateB - dateA; // 降順
                
            });    
        } else {
            rows.sort((a, b) => {
                const dateA = new Date(a.querySelector('td').textContent);
                const dateB = new Date(b.querySelector('td').textContent);
                return dateA - dateB; // 昇順
            });
        }
        rows.forEach(row => {
            tableBody.appendChild(row);
        });
        });
        //スレッド順選択機能のコードはここまで
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