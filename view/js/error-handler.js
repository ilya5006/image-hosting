let errorMessage = new URL(document.location.href).searchParams.get('error');

if (errorMessage) {
    let errorWrapper = document.createElement('div');
    
    errorWrapper.classList.add('error');
    errorWrapper.textContent = errorMessage;
    document.body.appendChild(errorWrapper);

    setInterval(
        () => {
           errorWrapper.classList.add('slideout');
        },
        2000
    )
}
