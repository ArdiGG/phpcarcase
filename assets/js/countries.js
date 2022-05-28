let countryList = document.querySelector('.countries');
fetch('https://restcountries.com/v3.1/all').then(res => {
    return res.json();
}).then(data => {
    data.sort(function(a, b){
        if(a.name.common < b.name.common) { return -1; }
        if(a.name.common > b.name.common) { return 1; }
        return 0;
    })

    let currentCountry = $('.currentCountry').attr('value')

    data.forEach(country => {
        console.log(country.name.common)
        outp = document.createElement('option');
        outp.value = country.name.common;
        outp.innerText = country.name.common;

        if(country.name.common == currentCountry) {
            outp.selected = true;
        }

        countryList.appendChild(outp);
    });
}).catch(err => {
    console.log(err);
})