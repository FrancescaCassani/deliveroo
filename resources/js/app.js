import "./bootstrap";

import Vue from 'vue';

const app = new Vue({
    el: '#app',
    data: {
        restaurants: [],
        foods: [],
        genres: [],
    },
    created() {
        this.getRestaurants();
        // this.getFoods();
        // this.getGenres();
    },
    methods: {
        //Chiamata API restaurants
        getRestaurants() {
            axios.get('http://127.0.0.1:8000/api/deliveroo').then((result) => {
            this.restaurants = result.data;
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
                this.genre = result.data;
            }).catch((error) => {
            // handle error
            console.log(error);
            });
        },
    }
});
