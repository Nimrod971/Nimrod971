import java.util.*;
import java.time.Duration;
import java.util.UUID;


public class Chanson extends Media{
	private Genres genre;
	private String artiste;

	public Chanson(String titre, String artiste, Duration duree, UUID ID, Genres genre, String contenu){
        this.titre = titre;
        this.artiste = artiste;
        this.duree = duree;
        this.ID = ID;
        this.genre = genre;
        this.contenu = contenu;
	}

	public String toString(){
		String str = "";
		str += "Titre:" + titre;
		str += " Artiste:" + artiste;
		str += " Duree:" + duree.toString();
		str += " ID:" + ID.toString();
		str += " contenu:" + contenu;
		str += " Genre:" + genre.toString();
		return str;
	}

	public String getTitre(){
	    return this.titre;
	}
	public void setTitre(String titre){
	    this.titre = titre;
	}

	//on mettra les accesseur et mutateurs plus tard
}
