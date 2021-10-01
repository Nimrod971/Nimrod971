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

public class AlbumParse {
   String FILEPATH = "files/albums.xml";
   Element root;

   public AlbumParse() {
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
            System.out.println(description(root, ""));
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

   private Chanson getChanson(Node n){
         String titre = "";
         String artiste ="";
         Duration duree = Duration.ofHours(1);
         String contenu = "";
         UUID id = UUID. randomUUID();
         Genres genre = Genres.POP;//GN: si on n'initialise pas les variables cela ne marche pas

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

   private Album getAlbum(Node n){
         String titre = "";
         String artiste = "";
         Duration duree = Duration.ofHours(1);
         UUID id = UUID. randomUUID();
         Period date = Period.ofYears(1);
         LinkedList<Chanson> chansons = new LinkedList<Chanson>();

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
                    case "title":
                        titre = n2.getTextContent();
                        break;
                    case "artist":
                        artiste = n2.getTextContent();
                        break;
                    case "duration":
                        duree = Duration.ofSeconds(Integer.parseInt(n2.getTextContent()));
                        break;
                    case "id":
                        id = UUID.fromString(n2.getTextContent());
                        break;
                    case "date":
                        date = Period.ofYears(Integer.parseInt(n2.getTextContent()));
                        break;
                    case "song":
                        chansons.add(getChanson(n2));
                    default:
                        break;

                }

            }
         }

         return new Album(chansons, titre, artiste, duree, date, id);
   }

   public LinkedList<Album> listAlbum(){
       int nbChild = root.getChildNodes().getLength();
       //Nous récupérons la liste des nœuds enfants
        NodeList list = root.getChildNodes();

       LinkedList<Album> albums = new LinkedList<Album>();

       //nous parcourons la liste des nœuds
       for(int i = 0; i < nbChild; i++){
            Node n2 = list.item(i);

            //si le nœud enfant est un Element, nous le traitons
            if (n2 instanceof Element){
                albums.add(getAlbum(n2));
            }
       }
       return albums;
   }

}
