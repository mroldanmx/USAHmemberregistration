/**
 * Returns a JSON object like
 * {country: "US", state: "PA", city: "BUTLER"}
 * @param zip
 */

const address_autocomplete = zip => {
    console.log('trying...', zip);
    return fetch('https://ziptasticapi.com/'+zip)
        .then(r => r.json())
        .then(res => res);
};

export default address_autocomplete;
