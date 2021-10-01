import java.util.*;
import java.time.*;
import java.util.UUID;


public class Album {
    private String titre;
    private String artiste;
    private Duration duree;
    private UUID ID;
	private Period date;
	private LinkedList<Chanson> chansons;

	public Album(LinkedList<Chanson> chansons, String titre, String artiste, Duration duree, Period date, UUID ID){
        this.titre = titre;
        this.artiste = artiste;
        this.duree = duree;
        this.ID = ID;
        this.date = date;
        this.chansons = chansons;
	}

	public String toString(){
		String str = "";
		for (Chanson chanson: chansons){
            str += chanson.toString() + "|";
		}

		return str;
	}
}
