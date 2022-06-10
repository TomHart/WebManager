import 'axios';




export default class Autocomplete {
    constructor(rootElement) {
        this.rootElement = rootElement;
        this.config = JSON.parse(rootElement.dataset.config);
        console.log(this.config);

        this.validateSetup();

        this.addInputEvent();
    }

    validateSetup() {
        const input = this.rootElement.querySelector('.autocomplete--input');
        if (!input) {
            throw 'No .autocomplete--input found';
        }
        this.input = input;

        const value = this.rootElement.querySelector('.autocomplete--value');
        if (!value) {
            throw 'No .autocomplete--value found';
        }
        this.value = value;

        const list = this.rootElement.querySelector('.autocomplete--list')
        if (!list) {
            throw 'No .autocomplete--list found';
        }
        this.list = list;
    }

    addInputEvent() {
        this.input.addEventListener('input', (e) => {
            clearTimeout(this.input.timer);
            if (this.input.controller) {
                this.input.controller.abort();
            }
            this.input.timer = setTimeout(() => {
                if (!e.target.value) {
                    return;
                }

                this.clearList();
                this.input.controller = new AbortController();
                const div = document.createElement('div');
                div.innerHTML = "Searching for '" + e.target.value + "'";
                this.list.append(div);

                axios.get(this.config.route + '?query[' + this.config.name + ']=' + encodeURIComponent(e.target.value), {
                    signal: this.input.controller.signal
                })
                    .then(res => {
                        this.input.controller = null;
                        console.log(res);
                        this.clearList();
                        this.renderList(res.data);
                    })
                    .catch(err => {
                        console.log(err);
                    })
            }, 250)
        });
    }

    clearList() {
        while (this.list.firstElementChild) {
            this.list.firstElementChild.remove();
        }
    }

    renderList(data) {
        if (data.length === 0) {
            const div = document.createElement('div');
            div.innerHTML = 'No results found';
            this.list.append(div);
            return;
        }

        for (let datum of data) {
            const div = document.createElement('div');
            div.innerHTML = datum[this.config.name ?? 'name'];
            div.addEventListener('click', () => {
                this.value.value = datum[this.config.keyForValue ?? 'id'];
                this.input.value = datum[this.config.name];
                this.clearList();
            });
            this.list.append(div);
        }
    }
}