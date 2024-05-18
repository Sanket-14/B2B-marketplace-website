function MultiSelectTag(el, customs = { shadow: false, rounded: true, selectionLimit: Infinity }) {
    var element = null;
    var options = null;
    var customSelectContainer = null;
    var wrapper = null;
    var btnContainer = null;
    var body = null;
    var inputContainer = null;
    var inputBody = null;
    var input = null;
    var button = null;
    var drawer = null;
    var ul = null;
    var tagColor = customs.tagColor || {};
    var domParser = new DOMParser();
    init();

    function init() {
        element = document.getElementById(el);
        createElements();
        initOptions();
        enableItemSelection();
        setValues(false);

        button.addEventListener('click', () => {
            if (drawer.classList.contains('hidden')) {
                initOptions();
                enableItemSelection();
                drawer.classList.remove('hidden');
                input.focus();
            }
        });

        // Prevent drawer from closing when clicking inside the container
        customSelectContainer.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent event propagation to window
            initOptions();
            enableItemSelection();
        });

        input.addEventListener('keyup', (e) => {
            initOptions(e.target.value);
            enableItemSelection();
        });

        input.addEventListener('keydown', (e) => {
            if (e.key === 'Backspace' && !e.target.value && inputContainer.childElementCount > 1) {
                const child = body.children[inputContainer.childElementCount - 2].firstChild;
                const option = options.find((op) => op.value == child.dataset.value);
                option.selected = false;
                removeTag(child.dataset.value);
                setValues();
            }
        });

        window.addEventListener('click', (e) => {
            if (!customSelectContainer.contains(e.target)) {
                drawer.classList.add('hidden');
            }
        });
    }

    function createElements() {
        // Create custom elements
        options = getOptions();
        element.classList.add('hidden');

        // .multi-select-tag
        customSelectContainer = document.createElement('div');
        customSelectContainer.classList.add('mult-select-tag');

        // .container
        wrapper = document.createElement('div');
        wrapper.classList.add('wrapper');

        // body
        body = document.createElement('div');
        body.classList.add('body');
        if (customs.shadow) {
            body.classList.add('shadow');
        }
        if (customs.rounded) {
            body.classList.add('rounded');
        }

        // .input-container
        inputContainer = document.createElement('div');
        inputContainer.classList.add('input-container');

        // input
        input = document.createElement('input');
        input.classList.add('input');
        input.placeholder = `${customs.placeholder || 'Search...'}`;

        inputBody = document.createElement('div');
        inputBody.classList.add('input-body');
        inputBody.append(input);

        body.append(inputContainer);

        // .btn-container
        btnContainer = document.createElement('div');
        btnContainer.classList.add('btn-container');

        // button
        button = document.createElement('button');
        button.type = 'button';
        btnContainer.append(button);

        const icon = domParser.parseFromString(
            `<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 21 6 15"></polyline></svg>`,
            'image/svg+xml'
        ).documentElement;
        button.append(icon);

        body.append(btnContainer);
        wrapper.append(body);

        drawer = document.createElement('div');
        drawer.classList.add(...['drawer', 'hidden']);
        if (customs.shadow) {
            drawer.classList.add('shadow');
        }
        if (customs.rounded) {
            drawer.classList.add('rounded');
        }
        drawer.append(inputBody);
        ul = document.createElement('ul');

        drawer.appendChild(ul);

        customSelectContainer.appendChild(wrapper);
        customSelectContainer.appendChild(drawer);

        // Place TailwindTagSelection after the element
        if (element.nextSibling) {
            element.parentNode.insertBefore(customSelectContainer, element.nextSibling);
        } else {
            element.parentNode.appendChild(customSelectContainer);
        }
    }

    function initOptions(val = null) {
        ul.innerHTML = '';
        const selectionLimit = customs.selectionLimit;

        for (var option of options) {
            if (option.selected) {
                !isTagSelected(option.value) && createTag(option);
            } else {
                const li = document.createElement('li');
                li.innerHTML = option.label;
                li.dataset.value = option.value;

                // For search
                if (val && option.label.toLowerCase().startsWith(val.toLowerCase())) {
                    ul.appendChild(li);
                } else if (!val) {
                    ul.appendChild(li);
                }
            }
        }

        // Check and disable item selection if the selection limit is reached
        if (selectionLimit !== Infinity && countSelectedTags() >= selectionLimit) {
            disableItemSelection();
        } else {
            enableItemSelection();
        }
    }

    function createTag(option) {
        // Create and show selected item as tag
        const itemDiv = document.createElement('div');
        itemDiv.classList.add('item-container');
        itemDiv.style.color = tagColor.textColor || '#2c7a7b';
        itemDiv.style.borderColor = tagColor.borderColor || '#81e6d9';
        itemDiv.style.background = tagColor.bgColor || '#e6fffa';
        const itemLabel = document.createElement('div');
        itemLabel.classList.add('item-label');
        itemLabel.style.color = tagColor.textColor || '#2c7a7b';
        itemLabel.innerHTML = option.label;
        itemLabel.dataset.value = option.value;
        const itemClose = new DOMParser().parseFromString(
            `<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="item-close-svg">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>`,
            'image/svg+xml'
        ).documentElement;

        itemClose.addEventListener('click', (e) => {
            const unselectOption = options.find((op) => op.value == option.value);
            unselectOption.selected = false;
            removeTag(option.value);
            initOptions();
            setValues();
        });

        itemDiv.appendChild(itemLabel);
        itemDiv.appendChild(itemClose);
        inputContainer.append(itemDiv);
    }

    function enableItemSelection() {
        for (var li of ul.children) {
            li.addEventListener('click', handleItemClick);
        }
    }

    function disableItemSelection() {
        // Disable item selection when the limit is reached
        for (var li of ul.children) {
            li.removeEventListener('click', handleItemClick);
        }
    }

    function handleItemClick(e) {
        const selectedOption = options.find((o) => o.value == e.target.dataset.value);

        // Check if the selected option is not already selected and the limit is not reached
        if (!selectedOption.selected && countSelectedTags() < customs.selectionLimit) {
            selectedOption.selected = true;
            input.value = null;
            initOptions();
            setValues();
            input.focus();
        }
    }

    function isTagSelected(val) {
        // If the item is already selected
        for (var child of inputContainer.children) {
            if (!child.classList.contains('input-body') && child.firstChild.dataset.value == val) {
                return true;
            }
        }
        return false;
    }

    function removeTag(val) {
        // Remove selected item
        for (var child of inputContainer.children) {
            if (!child.classList.contains('input-body') && child.firstChild.dataset.value == val) {
                inputContainer.removeChild(child);
            }
        }
    }

    function setValues(fireEvent = true) {
        // Update element final values
        selected_values = [];
        for (var i = 0; i < options.length; i++) {
            element.options[i].selected = options[i].selected;
            if (options[i].selected) {
                selected_values.push({ label: options[i].label, value: options[i].value });
            }
        }
        if (fireEvent && customs.hasOwnProperty('onChange')) {
            customs.onChange(selected_values);
        }
    }

    function getOptions() {
        // Map element options
        return [...element.options].map((op) => {
            return {
                value: op.value,
                label: op.label,
                selected: op.selected,
            };
        });
    }

    function countSelectedTags() {
        return inputContainer.childElementCount - 1; // Excluding the input element
    }
}


