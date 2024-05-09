//botão para subir pro topo da página
var mybutton = document.getElementById("myBtn");

window.addEventListener('scroll', function () {
    scrollFunction();
});

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

mybutton.addEventListener('click', topFunction);

//Funções Hora e Proteção da Logo
window.addEventListener('load', function () {
    exibirDataHora();
    protegerLogo();
});

function exibirDataHora() {
    var dataHora = new Date();
    var dia = ("0" + dataHora.getDate()).slice(-2);
    var mes = ("0" + (dataHora.getMonth() + 1)).slice(-2);
    var ano = dataHora.getFullYear();
    var horas = ("0" + dataHora.getHours()).slice(-2);
    var minutos = ("0" + dataHora.getMinutes()).slice(-2);
    document.getElementById('dataHora').innerHTML = dia + "/" + mes + "/" + ano + " " + horas + ":" + minutos;
}

//Protegendo a minha logo de usuários comuns
function protegerLogo() {
    var logo = document.getElementById('logo');

    if (logo) {
        logo.oncontextmenu = function (event) {
            event.preventDefault();
        };

        logo.ondragstart = function (event) {
            event.preventDefault();
        };
    } else {
        console.log('Elemento de logo não encontrado');
    }
}

//Função Google Maps
function initMap() {
    //Localização com base no IP do usuário
    if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var location = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
        };

        // Novo mapa centrado na localização
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 4, center: location});

        // Adicionar marcador na localização
        var marker = new google.maps.Marker({position: location, map: map});
    }, function() {
        handleLocationError(true, map.getCenter());
    });
    } else {
      // O navegador não suporta geolocalização
    handleLocationError(false, map.getCenter());
    }
}

function handleLocationError(browserHasGeolocation, pos) {
    console.log(browserHasGeolocation ?
                'Erro: O serviço de Geolocalização falhou.' :
                'Erro: Seu navegador não suporta geolocalização.');
}