import java.util.*;
import java.time.Duration;
import java.util.UUID;


abstract class Media{
	protected String titre;
	protected Duration duree;
	protected UUID ID;
	protected String contenu;

	public String toString(){
		String str = "";
		str += "Titre:" + titre;
		str += " Duree:" + duree.toString();
		str += " ID:" + ID.toString();
		str += " contenu:" + contenu;
		return str;
	}
}
