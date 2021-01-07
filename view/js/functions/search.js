function search(pattern, wrapper, titleSelector, elements) {
    const matched = getMatchedContent([...elements], titleSelector, pattern);

    wrapper.innerHTML = '';
    wrapper.append(...matched);
}