import PhotoSwipeLightbox from 'photoswipe/lightbox';

export const photoSwipe = async (err) => {
    if (err) {
      console.error(err);
    }

    const options = {
        dataSource: [], // Initialize with an empty data source
        children: 'a',
        pswpModule: () => import('photoswipe')
    };

    const lightbox = new PhotoSwipeLightbox(options);
    lightbox.init();

    // Use event delegation to handle the button click
    document.addEventListener('click', (event) => {
        const target = event.target;
        
        // Check if the clicked element has the class "btn-open-pswp-lightbox"
        if (target.classList.contains('ddp-open-pswp-lightbox')) {
            const imageNumber = target.getAttribute('data-img');

            const imageIdsString = target.closest('section').getAttribute('data-images');

            const imageIds = imageIdsString.split(',').map(id => parseInt(id, 10));

            const url = AppData.url;
            const urlwindow = `${window.location.origin}/wp-admin/admin-ajax.php`;
            const data = new FormData();

            data.append( 'action', 'get_image_data' );
            data.append( 'nonce', AppData.nonce );
            data.append( 'imageIds', imageIds);

            // Use AJAX to fetch image data from WordPress
            fetch(urlwindow, {
                method: 'POST',
                body: data
            })
            .then((response) => response.json())
            .then((imageData) => {

                // Update the Lightbox data source with the fetched image data
                lightbox.options.dataSource = imageData;
                console.log(lightbox);
                console.log(imageNumber);

                // Open the Lightbox with the new data
                lightbox.loadAndOpen(parseInt(imageNumber)); // defines the start slide index
            })
            .catch((error) => {
                console.error('Error fetching image data:', error);
            });
        }
    });
}

import.meta.webpackHot?.accept(photoSwipe);
