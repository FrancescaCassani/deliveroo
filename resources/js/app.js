import "./bootstrap";

import Vue from 'vue';

const app = new Vue({
    el: '#app',
    data: {
        research: '',
        restaurantIndex: '',
        visible: false,
        restaurants: [],
        foods: [],
        genres: [],
        showGenres: [],
        allRestaurants: [],
    },
    created() {
        this.getRestaurants();
        this.getFoods();
        this.getGenres();
        
    },
    methods: {
        //Barra di ricerca
        searchRestaurant() {
            this.allRestaurants.forEach( el => {
                if (el.name.toLowerCase().includes(this.research.toLowerCase())) {
                    el.visible = 1;
                } else {
                    el.visible = 0;
                }
            
            });
        
        },
        //Filtro dei generi
        filterGenres(genre) {
            this.genres.forEach(element => {
                if(genre == element.type) {
                    let restaurants_id = element.restaurant_id;
                    this.restaurants.forEach(el => {
                        if(restaurants_id == el.id) {
                            // this.restaurants.filter(e => {
                            //     this.restaurants = e;
                            // });
                            el.visible = 1;
                            this.allRestaurants = el;
                            console.log(this.allRestaurants);
                            
                        }
                    });
                    console.log(element.type);
                }
                
            });
            
                   
            // this.albums = albumsList;
            console.log('CIAOOOO!!!');
            console.log(genre);
            
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
