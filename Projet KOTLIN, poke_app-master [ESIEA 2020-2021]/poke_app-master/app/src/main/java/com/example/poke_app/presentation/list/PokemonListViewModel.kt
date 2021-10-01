package com.example.poke_app.presentation.list

import androidx.lifecycle.MutableLiveData
import androidx.lifecycle.ViewModel
import com.example.poke_app.presentation.Singletons
import com.example.poke_app.presentation.api.PokemonListResponse
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class PokemonListViewModel: ViewModel(){

    val pokeList: MutableLiveData<List<Pokemon>> = MutableLiveData()

    init {
        callApi()
    }

    private fun callApi() {
        Singletons.pokeApi.getPokemonList().enqueue(object: Callback<PokemonListResponse>{
            override fun onFailure(call: Call<PokemonListResponse>, t: Throwable) {
                TODO("Not yet implemented")
            }

            override fun onResponse(call: Call<PokemonListResponse>, response: Response<PokemonListResponse>) {
                if(response.isSuccessful && response.body() != null){
                    val pokemonResponse = response.body()!!
                    pokeList.value = pokemonResponse.results

                }
            }
        })
    }

}