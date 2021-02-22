import "./bootstrap";

import Vue from 'vue';

const app = new Vue({
    el: '#app',
    data: {

        foods: [],
        genres: [],
        restaurants: [],
        restaurantIndex: '',
        
        // imput search
        research: '',
        visible: false,
        genresId: [],
        filter: true,

        showGenres: [],
        allRestaurants: [],

        // shop cart
        shopCart: [],

    },
    created() {
        this.getRestaurants();
        this.getFoods();
        this.getGenres();
    },
    methods: {
        // Aggiungi al carrello
        addCart(food) {

            this.shopCart.push(food)

            console.log(this.shopCart);

        },

        //Barra di ricerca
        searchRestaurant() {
            this.allRestaurants.forEach( el => {
                if (el.name.toLowerCase().includes(this.research.toLowerCase()) && el.visible == 1) {
                    el.visible = 1;
                } else {
                    el.visible = 0;
                }
            });
            if( this.research == '' ) {
                this.allRestaurants.forEach( el => {
                    el.visible = 1;
                });
            }
        },


        //Filtro dei generi
        filterGenres(genre) {
            this.genresId = [];
            this.genres.forEach(element => {
                if(genre == element.type) {
                    this.genresId.push(element.restaurant_id.toString());
                    this.allRestaurants.forEach( el => {
                        if (this.genresId.includes(el.id.toString())) {
                            el.visible = 1;
                        } else {
                            el.visible = 0;
                        }
                    });
                }
            });
        },
        // resettare la ricerca
        filterNone() {
            this.allRestaurants.forEach( el => {
                this.genresId = [];
                el.visible = 1;
            });
        },
        //Chiamata API restaurants
        getRestaurants() {
            axios.get('http://127.0.0.1:8000/api/deliveroo').then((result) => {
                this.restaurants = result.data;
                this.allRestaurants = result.data;
                // console.log(this.restaurants);
            }).catch((error) => {
                // handle error
                console.log(error);
            });
        },
        //Chiamata API foods
        getFoods() {
            axios.get('http://127.0.0.1:8000/api/deliveroo/food').then((result) => {
                this.foods = result.data;
            }).catch((error) => {
                // handle error
                console.log(error);
            });
        },
        //Chiamata API genres
        getGenres() {
            axios.get('http://127.0.0.1:8000/api/deliveroo/genre').then((result) => {
                this.genres = result.data;
                
                result.data.forEach(element => {
                    if (!this.showGenres.includes(element.type)) {
                        this.showGenres.push(element.type);
                    }
                });
                //console.log(this.genres);
            }).catch((error) => {
                // handle error
                console.log(error);
            });
        },


        showRestaurant(index) {
            this.restaurantIndex = index + 1;
        }
    }
});
