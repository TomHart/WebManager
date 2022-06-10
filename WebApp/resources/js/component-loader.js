import Autocomplete from "./components/autocomplete"


const components = {
    'autocomplete': Autocomplete
}

const elements = document.querySelectorAll('[data-component-name]');

for (const element of elements) {
    new components[element.dataset.componentName](element);
}