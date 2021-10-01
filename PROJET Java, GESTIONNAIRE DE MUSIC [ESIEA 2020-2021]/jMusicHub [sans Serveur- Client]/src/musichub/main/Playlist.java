import java.util.*;
import java.time.Duration;
import java.util.*;


public class Playlist {
	private String nom;
	private UUID ID;
	private LinkedList<Media> medias;
	//Media est la classe abstraite parente de LivreAudio et Chansons

	public Playlist(String nom, UUID ID, LinkedList<Media> medias){
        this.nom = nom;
        this.ID = ID;
        this.medias = medias;
	}

	public String toString(){
		String str = "";
		for (Media media: this.medias){
            if (media instanceof LivreAudio) str += ((LivreAudio)media).toString() + "|";
            else str += ((Chanson)media).toString() + "|";
		}
		return str;
	}

	public String getNom(){
	    return this.nom;
	}
	public void setNom(String nom){
	    this.nom = nom;
	}

	//on mettra tous les accesseurs et mutateurs plus tard
}
