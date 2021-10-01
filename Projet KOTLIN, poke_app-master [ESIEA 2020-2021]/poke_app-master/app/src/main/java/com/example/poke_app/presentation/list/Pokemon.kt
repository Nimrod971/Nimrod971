package com.example.poke_app.presentation.list

data class Pokemon(
    val name: String,
    val url: String
)

data class Encounters(
    val id: Int,
    val next: String,
    val results: List<Pokemon>
)
