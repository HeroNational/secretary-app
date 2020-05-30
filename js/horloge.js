window.onload = function () {
    horloge('horloge');
}

function horloge(el) {
    if (typeof el == "string") {
        el = document.getElementById(el);
    }

    function actualiser() {
        var date = new Date();
        var jour = date.getDate();
        var Month = date.getMonth();
        var day = date.getDay();
        var year = date.getFullYear() + "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        var str;
        //Jour 
        var jours = ["Dimanche, ", "Lundi, ", "Mardi, ", "Mercredi, ", "Jeudi, ", "Vendredi, ", "Samedi, "];
        day = jours[day];
        var Months = ["janvier ", "fevrier ", "mars ", "avril ", "mai ", "juin ", "juillet ", "aout ", "septembre ", "octobre ", "novembre ", "decembre ", ];
        Month = Months[Month];
        str = day + (date.getDate() < 10 ? "0" : "") + jour + " " + Month + year;
        str += (date.getHours() < 10 ? "0" : '') + date.getHours();
        str += ":" + (date.getMinutes() < 10 ? "0" : '') + date.getMinutes();
        str += ":" + (date.getSeconds() < 10 ? "0" : '') + date.getSeconds();
        el.innerHTML = str;
    }
    actualiser();
    setInterval(actualiser, 100);
}