const albums = document.querySelectorAll('.album-wrapper');

document.querySelector('.search').addEventListener('input', (event) => {
    const pattern = event.target.value;
    const albumsWrapper = document.querySelector('.albums-wrapper');

    search(pattern, albumsWrapper, 'p a', albums);
});