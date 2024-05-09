//Carrossel 1
let indiceAtual = 0;
const imagensPorVez = 2; // Número de imagens para exibir por vez
const imagens = document.querySelectorAll('.carrossel-imagem');
const botaoAnterior = document.getElementById('anterior');
const botaoProximo = document.getElementById('proximo');

function atualizarImagens() {
    imagens.forEach((imagem, indice) => {
        if (indice >= indiceAtual && indice < indiceAtual + imagensPorVez) {
            imagem.classList.add('ativo');
        } else {
            imagem.classList.remove('ativo');
        }
    });
}

botaoAnterior.addEventListener('click', () => {
    indiceAtual = (indiceAtual - imagensPorVez + imagens.length) % imagens.length;
    atualizarImagens();
});

botaoProximo.addEventListener('click', () => {
    indiceAtual = (indiceAtual + imagensPorVez) % imagens.length;
    atualizarImagens();
});

atualizarImagens();

// Carrossel 2
let indiceAtual1 = 0;
const imagensPorVez1 = 2; // Número de imagens para exibir por vez
const imagens1 = document.querySelectorAll('.carrossel-1-imagem');
const botaoAnterior1 = document.getElementById('anterior1');
const botaoProximo1 = document.getElementById('proximo1');

function atualizarImagens2() {
    imagens1.forEach((imagem, indice) => {
        if (indice >= indiceAtual1 && indice < indiceAtual1 + imagensPorVez) {
            imagem.classList.add('ativo1');
        } else {
            imagem.classList.remove('ativo1');
        }
    });
}

botaoAnterior1.addEventListener('click', () => {
    indiceAtual1 = (indiceAtual1 - imagensPorVez + imagens1.length) % imagens1.length;
    atualizarImagens2();
});

botaoProximo1.addEventListener('click', () => {
    indiceAtual1 = (indiceAtual1 + imagensPorVez) % imagens1.length;
    atualizarImagens2();
});

atualizarImagens2();

//Carrossel 3
let indiceAtual2 = 0;
const imagensPorVez2 = 2; // Número de imagens para exibir por vez
const imagens2 = document.querySelectorAll('.carrossel-2-imagem');
const botaoAnterior2 = document.getElementById('anterior2');
const botaoProximo2 = document.getElementById('proximo2');

function atualizarImagens3() {
    imagens2.forEach((imagem, indice) => {
        if (indice >= indiceAtual2 && indice < indiceAtual2 + imagensPorVez2) {
            imagem.classList.add('ativo2');
        } else {
            imagem.classList.remove('ativo2');
        }
    });
}

botaoAnterior2.addEventListener('click', () => {
    indiceAtual2 = (indiceAtual2 - imagensPorVez2 + imagens2.length) % imagens2.length;
    atualizarImagens3();
});

botaoProximo2.addEventListener('click', () => {
    indiceAtual2 = (indiceAtual2 + imagensPorVez2) % imagens2.length;
    atualizarImagens3();
});

atualizarImagens3();

// Carrossel 4
let indiceAtual3 = 0;
const imagensPorVez3 = 2; // Número de imagens para exibir por vez
const imagens3 = document.querySelectorAll('.carrossel-3-imagem');
const botaoAnterior3 = document.getElementById('anterior3');
const botaoProximo3 = document.getElementById('proximo3');

function atualizarImagens4() {
    imagens3.forEach((imagem, indice) => {
        if (indice >= indiceAtual3 && indice < indiceAtual3 + imagensPorVez3) {
            imagem.classList.add('ativo3');
        } else {
            imagem.classList.remove('ativo3');
        }
    });
}

botaoAnterior3.addEventListener('click', () => {
    indiceAtual3 = (indiceAtual3 - imagensPorVez3 + imagens3.length) % imagens3.length;
    atualizarImagens4();
});

botaoProximo3.addEventListener('click', () => {
    indiceAtual3 = (indiceAtual3 + imagensPorVez3) % imagens3.length;
    atualizarImagens4();
});

atualizarImagens4();

// Carrossel 5
let indiceAtual4 = 0;
const imagensPorVez4 = 2; // Número de imagens para exibir por vez
const imagens4 = document.querySelectorAll('.carrossel-4-imagem');
const botaoAnterior4 = document.getElementById('anterior4');
const botaoProximo4 = document.getElementById('proximo4');

function atualizarImagens5() {
    imagens4.forEach((imagem, indice) => {
        if (indice >= indiceAtual4 && indice < indiceAtual4 + imagensPorVez4) {
            imagem.classList.add('ativo4');
        } else {
            imagem.classList.remove('ativo4');
        }
    });
}

botaoAnterior4.addEventListener('click', () => {
    indiceAtual4 = (indiceAtual4 - imagensPorVez4 + imagens4.length) % imagens4.length;
    atualizarImagens5();
});

botaoProximo4.addEventListener('click', () => {
    indiceAtual4 = (indiceAtual4 + imagensPorVez4) % imagens4.length;
    atualizarImagens5();
});

atualizarImagens5();

// Carrossel 6
let indiceAtual5 = 0;
const imagensPorVez5 = 2; // Número de imagens para exibir por vez
const imagens5 = document.querySelectorAll('.carrossel-5-imagem');
const botaoAnterior5 = document.getElementById('anterior5');
const botaoProximo5 = document.getElementById('proximo5');

function atualizarImagens6() {
    imagens5.forEach((imagem, indice) => {
        if (indice >= indiceAtual5 && indice < indiceAtual5 + imagensPorVez5) {
            imagem.classList.add('ativo5');
        } else {
            imagem.classList.remove('ativo5');
        }
    });
}

botaoAnterior5.addEventListener('click', () => {
    indiceAtual5 = (indiceAtual5 - imagensPorVez5 + imagens5.length) % imagens5.length;
    atualizarImagens6();
});

botaoProximo5.addEventListener('click', () => {
    indiceAtual5 = (indiceAtual5 + imagensPorVez5) % imagens5.length;
    atualizarImagens6();
});

atualizarImagens6();

// Carrossel 7
let indiceAtual6 = 0;
const imagensPorVez6 = 2; // Número de imagens para exibir por vez
const imagens6 = document.querySelectorAll('.carrossel-6-imagem');
const botaoAnterior6 = document.getElementById('anterior6');
const botaoProximo6 = document.getElementById('proximo6');

function atualizarImagens7() {
    imagens6.forEach((imagem, indice) => {
        if (indice >= indiceAtual6 && indice < indiceAtual6 + imagensPorVez6) {
            imagem.classList.add('ativo6');
        } else {
            imagem.classList.remove('ativo6');
        }
    });
}

botaoAnterior6.addEventListener('click', () => {
    indiceAtual6 = (indiceAtual6 - imagensPorVez6 + imagens6.length) % imagens5.length;
    atualizarImagens7();
});

botaoProximo6.addEventListener('click', () => {
    indiceAtual6 = (indiceAtual6 + imagensPorVez6) % imagens5.length;
    atualizarImagens7();
});

atualizarImagens7();