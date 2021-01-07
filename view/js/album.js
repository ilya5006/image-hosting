const photos = document.querySelectorAll('.photo');

document.querySelector('.search').addEventListener('input', (event) => {
    const pattern = event.target.value;
    const photosWrapper = document.querySelector('.photos');

    search(pattern, photosWrapper, 'a p', photos);
});