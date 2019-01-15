// carou
$('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true,
    next: 7
});
setInterval(function () {
    $('.carousel').carousel('next');
}, 7000);
// end carou

$('.collapsible').collapsible();
$('.modal').modal();
$('.sidenav').sidenav();
$(".dropdown-trigger").dropdown();



// Liste des catégories
var categories = [
    {name: 'Pierres', id: 'pierres'},
    {name: 'Bracelets', id: 'bracelets'},
    {name: 'Colliers', id: 'colliers'},
    {name: 'Encens', id: 'encens'},
];

// Liste des produits ( Si on en ajoute, l'HTML sera bien sûr aussi bien généré automatiquement <3)
var products = [
    {
        ref: 1,
        product: 'Pierre 1',
        image: 'assets/img/pierre1.jpg',
        link: 'https://geniusbazaar-shop.com/',
        description: 'Pierre machin, à pour effet bidule',
        price: 500,
        montant: 1,
        category: 'pierres',
        categoryName: 'Pierres'
    },
    {
        ref: 2,
        product: 'bracelets 1',
        image: 'assets/img/bracelet1.jpeg',
        link: 'https://www.maboutikbio.com/',
        description: 'bracelet ambre protection démon.',
        price: 140,
        montant: 1,
        category: 'bracelets',
        categoryName: 'Bracelets'
    },
    {
        ref: 3, product: 'Collier pas cher',
        image: 'assets/img/collier1.jpg',
        link: 'http://madecotendance.com/',
        description: 'Du pas cher et kacher.',
        price: 99.99,
        montant: 1,
        category: 'colliers',
        categoryName: 'Colliers'
    },
    {
        ref: 4,
        product: 'L\'Encens du pauvre',
        image: 'assets/img/encens.png',
        link: 'https://www.latelierducoteau.com/',
        description: 'L\'Encens protecteur par excellence.',
        price: 500,
        montant: 1,
        category: 'encens',
        categoryName: 'Encens'
    },
    {
        ref: 5, product: 'Collier pas cher',
        image: 'assets/img/collier2.jpg',
        link: 'http://madecotendance.com/',
        description: 'Du pas cher et kacher.',
        price: 99.99,
        montant: 1,
        category: 'colliers',
        categoryName: 'Colliers'
    },
    {
        ref: 6,
        product: 'L\'Encens du pauvre',
        image: 'assets/img/encens2.jpg',
        link: 'https://www.latelierducoteau.com/',
        description: 'L\'Encens protecteur par excellence.',
        price: 500,
        montant: 1,
        category: 'encens',
        categoryName: 'Encens'
    },
    {
        ref: 7,
        product: 'Pierre 1',
        image: 'assets/img/pierre2.jpg',
        link: 'https://geniusbazaar-shop.com/',
        description: 'Pierre machin, à pour effet bidule',
        price: 500,
        montant: 1,
        category: 'pierres',
        categoryName: 'Pierres'
    },
];
// Génération des catégories
for (var cats = 0; cats < categories.length; cats++) {
    $('#categoryList').append(`
    <a id="${categories[cats].id}" class="waves-effect waves-dark btn backgroundcolor white-text">${categories[cats].name}</a>
    `);

    $('#' + categories[cats].id).on('click', function () {
        var classProduct = document.getElementsByClassName('trObject');
        for (var i = 0; i < classProduct.length; i++) {
            var objectClass = classProduct[i].attributes.class.nodeValue.split(' ');
            if (objectClass[0] !== $(this)[0].id) {
                $('.' + objectClass[0]).slideUp();
            } else {
                $('.' + objectClass[0]).slideDown();
            }
        }
    });
}

function generateProducts() {
    for (var prods = 0; prods < products.length; prods++) {
        $('#productList').append(`
        <div class="${products[prods].category} trObject col s12 m6 l4 mb-10">
        <div class="card">
        <div class="card-image">
        <a class="himg" target="_blank" href="${products[prods].link}"><img class="responsive-img-products" src="${products[prods].image}" /></a>
        </div>
        <p class="center-align card-title truncate dark-blue-text rem13">${products[prods].product}</p>
        <div class="divider"></div>
        <div class="card-content">
        <p><span class="badge backgroundcolor white-text">${products[prods].categoryName}</span></p><br /><br />
        <p class="truncate">${products[prods].description}</p>
        </div>
        <div class="divider"></div>
        <div class="card-content">
        <div class="row">
        <div class="col s6"
        <p>${parseFloat(products[prods].price).toFixed(2)}€</p>
        </div>
        <div class="col s6">
        <a class="btn addNewProductInCart right waves-effect waves-light dark-blue tooltipped btn-floating" data-position="top" data-tooltip="Ajouter au panier" data-item-name="${products[prods].product}"><i class="material-icons">add_shopping_cart</i></a>
        </div>
        </div>
        </div>
        </div>
        </div>`);
    }
    ;
}
generateProducts();

//hover btn
$('.btn').hover(
        function () {
            $(this).addClass('pulse');
        },
        function () {
            $(this).removeClass('pulse');
        }
);
//définition du datepicker
$('.datepicker').datepicker({
    i18n: {
        selectMonths: true,
        selectYears: 2,
        firstDay: 1,
        months: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        monthsShort: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
        weekdays: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
        weekdaysShort: ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'],
        weekdaysAbbrev: ['L', 'M', 'M', 'J', 'V', 'S', 'D'],
        today: 'Aujourd\'hui',
        clear: 'Réinitialiser',
        cancel: 'Fermer'
    },
    format: 'dd/mm/yyyy'
});
// Mis en place du timepicker
$('.timepicker').timepicker({
    defaultTime: 'now', // Set default time: 'now', '1:30AM', '16:30'
    fromNow: 0, // set default time to * milliseconds from now (using with default = 'now')
    twelveHour: false, // don't AM/PM or 24-hour format
    done: 'OK', // text for done-button
    clear: 'Effacer', // text for clear-button
    cancel: 'Annuler', // Text for cancel-button,
    container: undefined, // ex. 'body' will append picker to body
    autoclose: false, // automatic close timepicker
    ampmclickable: true, // make AM PM clickable
    aftershow: function () {} //Function for after opening timepicker
});