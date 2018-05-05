const endpoint = "http://localhost/shortener.php"

function sendUrl() {
    const url = urlInput.value;
    postData(endpoint, {
            url
        })
        .then(link => console.log(link.url));
};

const submitButton = document.querySelector('.submit');
const urlInput = document.querySelector('.url');

submitButton.addEventListener('click', sendUrl);

function postData(url, data) {
    // Default options are marked with *
    return fetch(url, {
            body: JSON.stringify(data), // must match 'Content-Type' header
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
        })
        .then(response => response.json()) // parses response to JSON
}