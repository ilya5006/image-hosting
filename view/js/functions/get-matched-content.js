function getMatchedContent(elements, titleSelector, pattern) {
    return elements.filter((element) => {
        return element.querySelector(titleSelector).textContent.search(new RegExp(pattern, 'gi')) !== -1;
    });
}