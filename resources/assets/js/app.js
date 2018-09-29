
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Bootstrap and Axios. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('axios');

let axiosConfig = {
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    }
};

window.apiRequest = function apiGetRequest(customUri) {
    axios.get(process.env.MIX_APP_URL + '/api/v1/' + customUri, axiosConfig)
        .then(function (response) {
            let apiDisplay = document.getElementById('apiSpan');
            let data = response.data;
            apiDisplay.innerHTML=JSON.stringify(data, null, 4);
        })
}