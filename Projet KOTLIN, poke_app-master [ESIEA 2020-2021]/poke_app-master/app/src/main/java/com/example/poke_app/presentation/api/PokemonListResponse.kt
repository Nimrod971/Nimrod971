package com.example.poke_app.presentation.api

import com.example.poke_app.presentation.list.Pokemon

data class PokemonListResponse(
    val id: Int,
    val next: String,
    val results: List<Pokemon>
)