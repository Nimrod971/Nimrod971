import java.io.File;
import java.io.IOException;

import javax.xml.parsers.DocumentBuilder;
import javax.xml.parsers.DocumentBuilderFactory;
import javax.xml.parsers.ParserConfigurationException;

import org.w3c.dom.Document;
import org.w3c.dom.Element;
import org.w3c.dom.NamedNodeMap;
import org.w3c.dom.Node;
import org.w3c.dom.NodeList;
import org.xml.sax.ErrorHandler;
import org.xml.sax.SAXException;
import org.xml.sax.SAXParseException;

import org.xml.sax.helpers.DefaultHandler;

import java.time.*;
import java.util.*;

public class PlaylistParse {
   String FILEPATH = "files/playlist.xml";
   Element root;

   public PlaylistParse() {
      DocumentBuilderFactory factory = DocumentBuilderFactory.newInstance();

      try {
         factory.setValidating(true);
         DocumentBuilder builder = factory.newDocumentBuilder();

         //GN: je n'ai pas pris en compte la validation et regle de formatage en XML
         //Il faudra mettre des classes qui font ça

         File fileXML = new File(FILEPATH);
         Document xml;
         try {
            xml = builder.parse(fileXML);
            root = xml.getDocumentElement();
            System.out.println(description(root, "")); //GN: C'est par ici pour enlever la représentation de l'arbre XML
         } catch (SAXParseException e) { }
      } catch (ParserConfigurationException e) {
         e.printStackTrace();
      } catch (SAXException e) {
         e.printStackTrace();
      } catch (IOException e) {
         e.printStackTrace();
      }
   }

   /**
    * Méthode qui va parser le contenu d'un nœud
    * @param n
    * @param tab
    * @return
    */
   public String description(Node n, String tab){
      String str = new String();
      //Nous nous assurons que le nœud passé en paramètre est une instance d'Element
      //juste au cas où il s'agisse d'un texte ou d'un espace, etc.
      if(n instanceof Element){

         //Nous sommes donc bien sur un élément de notre document
         //Nous castons l'objet de type Node en type Element
         Element element = (Element)n;

         //Nous pouvons récupérer le nom du nœud actuellement parcouru
         //grâce à cette méthode, nous ouvrons donc notre balise
         str += "<" + n.getNodeName();

         //nous contrôlons la liste des attributs présents
         if(n.getAttributes() != null && n.getAttributes().getLength() > 0){

            //nous pouvons récupérer la liste des attributs d'un élément
            NamedNodeMap att = n.getAttributes();
            int nbAtt = att.getLength();

            //nous parcourons tous les nœuds pour les afficher
            for(int j = 0; j < nbAtt; j++){
               Node noeud = att.item(j);
               //On récupère le nom de l'attribut et sa valeur grâce à ces deux méthodes
               str += " " + noeud.getNodeName() + "=\"" + noeud.getNodeValue() + "\" ";
            }
         }

         //nous refermons notre balise car nous avons traité les différents attributs
         str += ">";

         //La méthode getChildNodes retournant le contenu du nœud + les nœuds enfants
         //Nous récupérons le contenu texte uniquement lorsqu'il n'y a que du texte, donc un seul enfant
         if(n.getChildNodes().getLength() == 1)
              str += n.getTextContent();

         //Nous allons maintenant traiter les nœuds enfants du nœud en cours de traitement
         int nbChild = n.getChildNodes().getLength();
         //Nous récupérons la liste des nœuds enfants
         NodeList list = n.getChildNodes();
         String tab2 = tab + "\t";

         //nous parcourons la liste des nœuds
         for(int i = 0; i < nbChild; i++){
            Node n2 = list.item(i);

            //si le nœud enfant est un Element, nous le traitons
            if (n2 instanceof Element){
                //appel récursif à la méthode pour le traitement du nœud et de ses enfants
               str += "\n " + tab2 + description(n2, tab2);
            }
         }

         //Nous fermons maintenant la balise
         if(n.getChildNodes().getLength() < 2)
            str += "</" + n.getNodeName() + ">";// <titlesong>Save Me</titlesong>
         else
            str += "\n" + tab +"</" + n.getNodeName() + ">";
      }

      return str;
   }

   private LivreAudio getLivreAudio(Node n){
         String titre = "";
         String auteur ="";
         Duration duree = Duration.ofHours(1);
         String contenu = "";
         UUID id = UUID. randomUUID();
         Langues langue = Langues.Francais;
         Categories categorie = Categories.Jeunesse;//GN: Si on n'initialise pas chacune des variables, cela ne marche pas

         //Nous allons maintenant traiter les nœuds enfants du nœud en cours de traitement
         int nbChild = n.getChildNodes().getLength();
         //Nous récupérons la liste des nœuds enfants
         NodeList list = n.getChildNodes();

         //nous parcourons la liste des nœuds
         for(int i = 0; i < nbChild; i++){
            Node n2 = list.item(i);

            //si le nœud enfant est un Element, nous le traitons
            if (n2 instanceof Element){
                switch(n2.getNodeName()){
                    case "titlebook":
                        titre = n2.getTextContent();
                        break;
                    case "authorbook":
                        auteur = n2.getTextContent();
                        break;
                    case "durationbook":
                        duree = Duration.ofSeconds(Integer.parseInt(n2.getTextContent()));
                        break;
                    case "idbook":
                        id = UUID.fromString(n2.getTextContent());
                        break;
                    case "contentsbook":
                        contenu = n2.getTextContent();
                        break;
                    case "languagebook":
                        switch(n2.getTextContent()){
                            case "Langues.Francais":
                                langue = Langues.Francais;
                                break;
                            case "Langues.Anglais":
                                langue = Langues.Anglais;
                                break;
                            case "Langues.Italien":
                                langue = Langues.Italien;
                                break;
                            case "Langues.Espagnol":
                                langue = Langues.Espagnol;
                                break;
                            case "Langues.Allemand":
                                langue = Langues.Allemand;
                                break;
                            default:
                                langue = Langues.Francais;
                        }
                    case "categorybook":
                        switch(n2.getTextContent()){
                            case "Categories.Jeunesse":
                                categorie = Categories.Jeunesse;
                                break;
                            case "Categories.Roman":
                                categorie = Categories.Roman;
                                break;
                            case "Categories.Theatre":
                                categorie = Categories.Theatre;
                                break;
                            case "Categories.Discours":
                                categorie = Categories.Discours;
                                break;
                            case "Categories.Documentaire":
                                categorie = Categories.Documentaire;
                                break;
                            default:
                                categorie = Categories.Jeunesse;
                        }
                    default:
                        break;

                }

            }
         }
         return new LivreAudio(titre, auteur, duree, id, contenu, langue, categorie);
   }

   private Chanson getChanson(Node n){
         String titre = "";
         String artiste ="";
         Duration duree = Duration.ofHours(1);
         String contenu = "";
         UUID id = UUID. randomUUID();
         Genres genre = Genres.POP;//GN: Si on n'initialise pas chacune des variables, cela ne marc

         //Nous allons maintenant traiter les nœuds enfants du nœud en cours de traitement
         int nbChild = n.getChildNodes().getLength();
         //Nous récupérons la liste des nœuds enfants
         NodeList list = n.getChildNodes();

         //nous parcourons la liste des nœuds
         for(int i = 0; i < nbChild; i++){
            Node n2 = list.item(i);

            //si le nœud enfant est un Element, nous le traitons
            if (n2 instanceof Element){
                switch(n2.getNodeName()){
                    case "titlesong":
                        titre = n2.getTextContent();
                        break;
                    case "artistsong":
                        artiste = n2.getTextContent();
                        break;
                    case "durationsong":
                        duree = Duration.ofSeconds(Integer.parseInt(n2.getTextContent()));
                        break;
                    case "idsong":
                        id = UUID.fromString(n2.getTextContent());
                        break;
                    case "contentssong":
                        contenu = n2.getTextContent();
                        break;
                    case "genresong":
                        switch(n2.getTextContent()){
                            case "Genre.KPOP":
                                genre = Genres.KPOP;
                                break;
                            case "Genre.POP":
                                genre = Genres.POP;
                                break;
                            case "Genre.JAZZ":
                                genre = Genres.KPOP;
                                break;
                            case "Genre.CLASSIQUE":
                                genre = Genres.KPOP;
                                break;
                            case "Genre.HIPPOP":
                                genre = Genres.HIPHOP;
                                break;
                            case "Genre.RAP":
                                genre = Genres.HIPHOP;
                                break;
                            case "Genre.ROCK":
                                genre = Genres.HIPHOP;
                                break;
                            default:
                                genre = Genres.POP;
                        }
                    default:
                        break;

                }

            }
         }
         return new Chanson(titre, artiste, duree, id, genre, contenu);
   }

   private Playlist getPlaylist(Node n){
         String nom = "";
         UUID id = UUID. randomUUID();
         LinkedList<Media> medias = new LinkedList<Media>();

         //Nous allons maintenant traiter les nœuds enfants du nœud en cours de traitement
         int nbChild = n.getChildNodes().getLength();
         //Nous récupérons la liste des nœuds enfants
         NodeList list = n.getChildNodes();

         //nous parcourons la liste des nœuds
         for(int i = 0; i < nbChild; i++){
            Node n2 = list.item(i);

            //si le nœud enfant est un Element, nous le traitons
            if (n2 instanceof Element){
                switch(n2.getNodeName()){
                    case "name":
                        nom = n2.getTextContent();
                        break;
                    case "id":
                        id = UUID.fromString(n2.getTextContent());
                        break;
                    case "book":
                        medias.add(getLivreAudio(n2));
                        break;
                    case "song":
                        medias.add(getChanson(n2));
                    default:
                        break;

                }

            }
         }

         return new Playlist(nom, id, medias);
   }

   public LinkedList<Playlist> listPlaylist(){
       int nbChild = root.getChildNodes().getLength();
       //Nous récupérons la liste des nœuds enfants
        NodeList list = root.getChildNodes();

       LinkedList<Playlist> playlists = new LinkedList<Playlist>();

       //nous parcourons la liste des nœuds
       for(int i = 0; i < nbChild; i++){
            Node n2 = list.item(i);

            //si le nœud enfant est un Element, nous le traitons
            if (n2 instanceof Element){
                playlists.add(getPlaylist(n2));
            }
       }
       return playlists ;
   }

}
