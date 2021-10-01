import java.util.*;
import java.time.Duration;
import java.util.UUID;


public class LivreAudio extends Media{
    private String auteur;
    private Langues langue;
	private Categories categorie;


	public LivreAudio(String titre, String auteur, Duration duree, UUID ID,String contenu, Langues langue, Categories categorie){
        this.titre = titre;
        this.auteur = auteur;
        this.duree = duree;
        this.ID = ID;
        this.contenu = contenu;
        this.langue = langue;
        this.categorie = categorie;
	}

	public String toString(){
		String str = "";
		str += "Titre:" + titre;
		str += " Auteur:" + auteur;
		str += " Duree:" + duree.toString();
		str += " ID:" + ID.toString();
		str += " contenu:" + contenu;
		str += " Langue:" + langue.toString();
		str += " Categorie:" + categorie.toString();
		return str;
	}
}
