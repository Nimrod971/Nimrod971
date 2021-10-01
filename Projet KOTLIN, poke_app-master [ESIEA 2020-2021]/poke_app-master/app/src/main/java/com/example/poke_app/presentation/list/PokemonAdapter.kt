package com.example.poke_app.presentation.list

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.ImageView
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView
import com.bumptech.glide.Glide
import com.example.poke_app.R


class PokemonAdapter(private var dataSet: List<Pokemon>, var listener: ((Int) -> Unit)? = null) : RecyclerView.Adapter<PokemonAdapter.ViewHolder>() {


    /**
     * Provide a reference to the type of views that you are using
     * (custom ViewHolder).
     */
    class ViewHolder(view: View) : RecyclerView.ViewHolder(view) {
        val textView: TextView
        val imageView: ImageView
        val imageView2: ImageView
        val imageView3: ImageView
        val imageView4: ImageView



        init {
            // Define click listener for the ViewHolder's View.
            textView = view.findViewById(R.id.pokemon_name)
            imageView = view.findViewById(R.id.pokemon_img)
            imageView2 = view.findViewById(R.id.pokemon_img2)

            imageView3 = view.findViewById(R.id.pokemon_img3)
            imageView4 = view.findViewById(R.id.pokemon_img4)



        }
    }

    fun updateList(list: List<Pokemon>){
        dataSet = list
        notifyDataSetChanged()
    }

    // Create new views (invoked by the layout manager)
    override fun onCreateViewHolder(viewGroup: ViewGroup, viewType: Int): ViewHolder {
        // Create a new view, which defines the UI of the list item
        val view = LayoutInflater.from(viewGroup.context).inflate(R.layout.pokemon_item, viewGroup, false)

        return ViewHolder(view)
    }

    // Replace the contents of a view (invoked by the layout manager)
    override fun onBindViewHolder(viewHolder: ViewHolder, position: Int) {

        // Get element from your dataset at this position and replace the
        // contents of the view with that element
        val pokemon = dataSet[position]
        viewHolder.textView.text = pokemon.name
        viewHolder.itemView.setOnClickListener{
            listener?.invoke(position)
        }

        Glide
            .with(viewHolder.itemView.context)
            .load("https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${position + 1}.png")
            .centerCrop()
            .into(viewHolder.imageView)


        Glide
            .with(viewHolder.itemView.context)
            .load("https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/shiny/${position + 1}.png")
            .centerCrop()
            .into(viewHolder.imageView2)


        Glide
            .with(viewHolder.itemView.context)
            .load("https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon//back/shiny/${position + 1}.png")
            .centerCrop()
            .into(viewHolder.imageView3)


        Glide
            .with(viewHolder.itemView.context)
            .load("https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon//back/${position + 1}.png")
            .centerCrop()
            .into(viewHolder.imageView4)


    }

    // Return the size of your dataset (invoked by the layout manager)
    override fun getItemCount() = dataSet.size
    fun updateList(list: Unit) {
        TODO("Not yet implemented")
    }

}