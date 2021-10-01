package com.example.poke_app.presentation.api

import retrofit2.Call
import retrofit2.http.GET
import retrofit2.http.Path

interface PokeApi {
        @GET("pokemon?limit=898")
        fun getPokemonList(): Call<PokemonListResponse>

        @GET("pokemon/{id}/")
        fun getPokemonDetail(@Path("id") id: Int): Call<PokemonDetailResponse>

        @GET("pokemon/{id}/encounters")
        fun getPokemonEncounters(@Path("id") id: Int): Call<PokemonDetailResponse>


}