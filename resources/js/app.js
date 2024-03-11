import './bootstrap';
import '../css/app.css';

/**
 * Select an option from the custom select component and update the original
 * select element to reflect the selection.
 */
function updateSelectBox(clickEvent) {
    // Get the respective original html select element
    const origSelElement = this.parentNode.parentNode.querySelector("select");
    // Get the custom select component
    const newSelElement = this.parentNode.previousSibling;
    for (let i = 0; i < origSelElement.length; i++) {
        // Update the html select element with the newly selected option
        if (origSelElement.options[i].innerHTML == this.innerHTML) {
            origSelElement.selectedIndex = i;
            newSelElement.innerHTML = this.innerHTML;
            this.parentNode.querySelectorAll(".ct-select__item--selected").forEach((element) => {
                element.classList.remove("ct-select__item--selected");
            });
            this.classList.add("ct-select__item--selected");
            break;
        }
    }
    newSelElement.click();
}

/**
 * Toggle clicked custom select component and close any others.
 */
function openCurrentSelect(clickEvent) {
    clickEvent.stopPropagation();
    // Close other select boxes
    closeAllSelect(this);
    // Toggle open status
    this.nextSibling.classList.toggle("ct-select--hide");
    this.classList.toggle("ct-select__arrow--active");
}

/**
 * Close all custom select components. If function is triggered by an event listener on
 * a custom select component, the target select component will remain open.
 */
function closeAllSelect(selElement) {
    // Prepare array to store current select component
    const arrNo = [];
    // Close all select components that do not match provided component
    const openSelElements = document.querySelectorAll(".ct-select--selected");
    openSelElements.forEach((openSelElement, index) => {
        if (openSelElement != selElement) {
            openSelElement.classList.remove("ct-select__arrow--active");
            openSelElement.nextSibling.classList.add("ct-select--hide");
        }
    });
}

// On ready
document.addEventListener("DOMContentLoaded", (event) => {
    /**
     * Create a custom select component for each select element found.
     *
     * Targets any div with the 'ct-select' class. The div must contain a select element,
     * only the first select element found in the div will be used.
     */
    document.querySelectorAll(".ct-select").forEach((element) => {
        // Get original html select element
        const selElement = element.querySelector("select");
        // Create a new respective custom select element
        const newSelElement = document.createElement("div");
        newSelElement.classList.add('ct-select--selected');
        newSelElement.innerHTML = selElement.options[selElement.selectedIndex].innerHTML;
        element.appendChild(newSelElement);
        // Create container for custom select options
        const newSelOptions = document.createElement("div");
        newSelOptions.classList.add('ct-select__items', 'ct-select--hide');
        for (const option of selElement.options) {
            // Create a custom option component for each html option element
            const newSelOption = document.createElement("div");
            newSelOption.innerHTML = option.innerHTML;
            newSelOption.addEventListener("click", updateSelectBox);
            newSelOptions.appendChild(newSelOption);
        }
        element.appendChild(newSelOptions);
        newSelElement.addEventListener("click", openCurrentSelect);
    });

    /**
     * Close all custom select components if anywhere else is clicked.
     */
    document.addEventListener("click", closeAllSelect);
});
