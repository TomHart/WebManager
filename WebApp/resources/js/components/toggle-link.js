import 'axios';

const links = document.getElementsByClassName('toggle-link');

for (let link of links) {
    link.addEventListener('click', (e) => {
        if (e.target.dataset.disabled === 'true') {
            return;
        }
        e.preventDefault();
        e.target.dataset.disabled = 'true';
        const text = e.target.innerHTML;

        e.target.innerHTML = e.target.dataset.waitText;
        axios
            .post(e.target.dataset.link, JSON.parse(e.target.dataset.data))
            .then(res => {
                const icon = e.target.previousElementSibling;
                icon.classList.remove('mdi-check');
                icon.classList.remove('mdi-close');
                icon.classList.add(res.data.value ? 'mdi-check' : 'mdi-close');
                e.target.innerHTML = text;
                e.target.dataset.disabled = 'false';
            })
            .catch(err => {
                console.error(err);
                e.target.innerHTML = text;
                e.target.dataset.disabled = 'false';
            });
    })
}
