package com.esiea.musichub.network.server;

import com.esiea.musichub.business.MusicHub;
import com.esiea.musichub.model.*;
import com.esiea.musichub.util.NoAlbumFoundException;
import com.esiea.musichub.util.NoElementFoundException;
import com.esiea.musichub.util.NoPlayListFoundException;
import org.apache.log4j.Logger;

import java.io.FileInputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.net.Socket;
import java.util.ArrayList;
import java.util.Iterator;
import java.util.List;
import java.util.stream.Collectors;
import java.util.stream.StreamSupport;

/**
 * This thread is responsible to handle client connection.
 */
public class ServerThread extends Thread {
    final static Logger logger = Logger.getLogger(ServerThread.class);
    private Socket socket;
    private ObjectInputStream input;
    private ObjectOutputStream output;

    public ServerThread(Socket socket) {
        this.socket = socket;
    }

    public void run() {
        try {
            //create the streams that will handle the objects coming through the sockets
            input = new ObjectInputStream(socket.getInputStream());
            output = new ObjectOutputStream(socket.getOutputStream());

            String text = (String) input.readObject();  //read the object received through the stream and deserialize it
            System.out.println("server received a text:" + text);

            //Server send command list
            MusicHub theHub = new MusicHub();
            output.writeObject(theHub.availableCommands());        //serialize and write the Student object to the stream

            // handle messages
            String choice = (String) input.readObject();  //read the choice sent by client
            logger.info("server received a choice:" + choice);

            String albumTitle = null;
            String songTitle = null;

            if (choice.length() == 0) {
                closeConnexion();
            }

            while (choice.charAt(0) != 'q') {
                switch (choice.charAt(0)) {
                    case 'h':
                        output.writeObject(theHub.availableCommands());
                        choice = (String) input.readObject();
                        break;
                    case 't':
                        //album titles, ordered by date
                        output.writeObject(theHub.getAlbumsTitlesSortedByDate());
                        logger.info("List of albums is sent successfully");

                        output.writeObject(theHub.availableCommands());
                        choice = (String) input.readObject();
                        break;
                    case 'g':
                        //songs of an album, sorted by genre
                        output.writeObject("Songs of an album sorted by genre will be displayed; enter the album name, available albums are:");
                        output.writeObject(theHub.getAlbumsTitlesSortedByDate());

                        albumTitle = (String) input.readObject();
                        try {
                            if (theHub.getAlbumSongsSortedByGenre(albumTitle) != null) {
                                output.writeObject("list");
                                output.writeObject(theHub.getAlbumSongsSortedByGenre(albumTitle));
                            }
                        } catch (NoAlbumFoundException ex) {
                            output.writeObject("ERROR");
                            logger.error("No album found with the requested title " + ex.getMessage());
                            // closeConnexion();
                        }
                        logger.info("List of songs is sent successfully");

                        output.writeObject(theHub.availableCommands());
                        choice = (String) input.readObject();
                        break;
                    case 'd':
                        //songs of an album
                        output.writeObject("Songs of an album will be displayed; enter the album name, available albums are:");
                        output.writeObject(theHub.getAlbumsTitlesSortedByDate());

                        albumTitle = (String) input.readObject();
                        try {
                            if (theHub.getAlbumSongs(albumTitle) != null) {
                                output.writeObject("list");
                                output.writeObject(theHub.getAlbumSongs(albumTitle));
                            }
                        } catch (NoAlbumFoundException ex) {
                            output.writeObject("ERROR");
                            logger.error("No album found with the requested title " + ex.getMessage());
                            // closeConnexion();
                        }
                        logger.info("List of songs is sent successfully");

                        output.writeObject(theHub.availableCommands());
                        choice = (String) input.readObject();
                        break;
                    case 'u':
                        //audiobooks ordered by author
                        output.writeObject(theHub.getAudiobooksTitlesSortedByAuthor());
                        logger.info("List of audiobooks ordered by author is sent successfully");
                        output.writeObject(theHub.availableCommands());
                        choice = (String) input.readObject();
                        break;
                    case 'p':
                        //audiobooks ordered by author
                        List<String> playList = new ArrayList<String>();
                        Iterator<PlayList> myIterator = theHub.playlists();
                        while (myIterator.hasNext()) {
                            playList.add(myIterator.next().getTitle());
                        }
                        output.writeObject(playList);
                        logger.info("List of playlists is sent successfully");
                        output.writeObject(theHub.availableCommands());
                        choice = (String) input.readObject();
                        break;
                    case 'f':
                        //play song
                        output.writeObject("Songs of an album will be displayed; enter the album name, available albums are:");
                        output.writeObject(theHub.getAlbumsTitlesSortedByDate());

                        albumTitle = (String) input.readObject();
                        try {
                            if (theHub.getAlbumSongs(albumTitle) != null) {
                                output.writeObject("list");
                                output.writeObject(theHub.getAlbumSongs(albumTitle));
                            }
                        } catch (NoAlbumFoundException ex) {
                            output.writeObject("ERROR");
                            logger.error("No album found with the requested title " + ex.getMessage());
                        }

                        songTitle = (String) input.readObject();

                        try {
                            if (theHub.isSongExist(albumTitle, songTitle)) {
                                String pathFile = "src/main/resources/sounds/" + songTitle;
                                output.writeObject("playing");
                                sendFile(pathFile);
                            } else {
                                output.writeObject("ERROR");
                                logger.error("No Song found with the requested title ");
                            }
                        } catch (Exception e) {
                            output.writeObject("ERROR");
                            logger.error("No Song found with the requested title " + e.getMessage());
                        }
                        output.writeObject(theHub.availableCommands());
                        choice = (String) input.readObject();
                        break;
                    case 'c':
                        // add a new song
                        try {
                            output.writeObject("Enter a new song: ");
                            output.writeObject("Song title: ");
                            String title = (String) input.readObject();
                            output.writeObject("Song genre (jazz, classic, hiphop, rock, pop, rap):");
                            String genre = (String) input.readObject();
                            output.writeObject("Song artist: ");
                            String artist = (String) input.readObject();
                            output.writeObject("Song length in seconds: ");
                            int length = Integer.parseInt((String) input.readObject());
                            output.writeObject("Song content: ");
                            String content = (String) input.readObject();
                            Song s = new Song(title, artist, length, content, genre);
                            theHub.addElement(s);
                            output.writeObject("New element list: ");
                            Iterator<AudioElement> it = theHub.elements();
                            List<String> listOfElements = new ArrayList<String>();
                            while (it.hasNext()) listOfElements.add(it.next().getTitle());
                            output.writeObject(listOfElements);
                            output.writeObject("Song created!");
                            logger.info("Song created successfully");
                            output.writeObject(theHub.availableCommands());
                            choice = (String) input.readObject();
                            break;
                        } catch (Exception e) {
                            output.writeObject("ERROR");
                            logger.error(e.getMessage());
                        }
                    case 'a':
                        // add a new album
                        try {
                            output.writeObject("Enter a new album: ");
                            output.writeObject("Album title: ");
                            String aTitle = (String) input.readObject();
                            output.writeObject("Album artist: ");
                            String aArtist = (String) input.readObject();
                            output.writeObject("Album length in seconds: ");
                            int aLength = Integer.parseInt((String) input.readObject());
                            output.writeObject("Album date as YYYY-DD-MM: ");
                            String aDate = (String) input.readObject();
                            Album a = new Album(aTitle, aArtist, aLength, aDate);
                            theHub.addAlbum(a);
                            output.writeObject("New list of albums: ");
                            Iterator<Album> ita = theHub.albums();
                            List<String> listOfAlbums = new ArrayList<String>();
                            while (ita.hasNext()) listOfAlbums.add(ita.next().getTitle());
                            output.writeObject(listOfAlbums);
                            output.writeObject("Album created!");
                            logger.info("Album created successfully");
                            output.writeObject(theHub.availableCommands());
                            choice = (String) input.readObject();
                            break;
                        } catch (Exception e) {
                            output.writeObject("ERROR");
                            logger.error(e.getMessage());
                        }
                    case '+':
                        //add a song to an album:
                        output.writeObject("Add an existing song to an existing album");
                        output.writeObject("Type the name of the song you wish to add. Available songs: ");
                        Iterator<AudioElement> itae = theHub.elements();
                        List<String> listOfSongs = new ArrayList<String>();
                        while (itae.hasNext()) {
                            AudioElement ae = itae.next();
                            if (ae instanceof Song) listOfSongs.add(ae.getTitle());
                        }
                        output.writeObject(listOfSongs);
                        songTitle = (String) input.readObject();

                        output.writeObject("Type the name of the album you wish to enrich. Available albums: ");
                        Iterator<Album> ait = theHub.albums();
                        List<String> listOfAlbumsAvailable = new ArrayList<String>();
                        while (ait.hasNext()) {
                            Album al = ait.next();
                            listOfAlbumsAvailable.add(al.getTitle());
                        }
                        output.writeObject(listOfAlbumsAvailable);
                        String titleAlbum = (String) input.readObject();
                        try {
                            theHub.addElementToAlbum(songTitle, titleAlbum);
                        } catch (NoAlbumFoundException ex) {
                            output.writeObject("ERROR");
                            logger.error(ex.getMessage());
                        } catch (NoElementFoundException ex) {
                            output.writeObject("ERROR");
                            logger.error(ex.getMessage());
                        }
                        output.writeObject("Song added to the album!");
                        logger.info("Song added to the album successfully");
                        output.writeObject(theHub.availableCommands());
                        choice = (String) input.readObject();
                        break;
                    case 'l':
                        // add a new audiobook
                        try {
                            output.writeObject("Enter a new audiobook: ");
                            output.writeObject("AudioBook title: ");
                            String bTitle = (String) input.readObject();
                            output.writeObject("AudioBook category (youth, novel, theater, documentary, speech)");
                            String bCategory = (String) input.readObject();
                            output.writeObject("AudioBook artist: ");
                            String bArtist = (String) input.readObject();
                            output.writeObject("AudioBook length in seconds: ");
                            int bLength = Integer.parseInt((String) input.readObject());
                            output.writeObject("AudioBook content: ");
                            String bContent = (String) input.readObject();
                            output.writeObject("AudioBook language (french, english, italian, spanish, german)");
                            String bLanguage = (String) input.readObject();
                            AudioBook b = new AudioBook(bTitle, bArtist, bLength, bContent, bLanguage, bCategory);
                            theHub.addElement(b);
                            output.writeObject("Audiobook created! New element list: ");
                            logger.info("Audiobook created successfully");
                            Iterator<AudioElement> itl = theHub.elements();
                            List<String> listOfNewAudiobook = new ArrayList<String>();
                            while (itl.hasNext()) listOfNewAudiobook.add(itl.next().getTitle());
                            output.writeObject(listOfNewAudiobook);
                            output.writeObject(theHub.availableCommands());
                            choice = (String) input.readObject();
                            break;
                        } catch (Exception e) {
                            output.writeObject("ERROR");
                            logger.error(e.getMessage());
                        }
                    case 'y':
                        //create a new playlist from existing elements
                        output.writeObject("Add an existing song or audiobook to a new playlist");
                        output.writeObject("Existing playlists:");
                        Iterator<PlayList> itpl = theHub.playlists();
                        List<String> listOfPlaylists = new ArrayList<String>();
                        while (itpl.hasNext()) {
                            PlayList pl = itpl.next();
                            listOfPlaylists.add(pl.getTitle());
                        }
                        output.writeObject(listOfPlaylists);
                        output.writeObject("Type the name of the playlist you wish to create:");
                        String playListTitle = (String) input.readObject();
                        PlayList pl = new PlayList(playListTitle);
                        theHub.addPlaylist(pl);
                        output.writeObject("Available elements: ");

                        Iterator<AudioElement> itael = theHub.elements();
                        List<String> listOfAvailableElements = new ArrayList<String>();
                        while (itael.hasNext()) {
                            AudioElement ae = itael.next();
                            listOfAvailableElements.add(ae.getTitle());
                        }
                        output.writeObject(listOfAvailableElements);

                        while (choice.charAt(0) != 'n') {
                            output.writeObject("Type the name of the audio element you wish to add or 'n' to exit:");
                            String elementTitle = (String) input.readObject();
                            try {
                                theHub.addElementToPlayList(elementTitle, playListTitle);
                            } catch (NoPlayListFoundException ex) {
                                output.writeObject("ERROR");
                                logger.error(ex.getMessage());
                            } catch (NoElementFoundException ex) {
                                output.writeObject("ERROR");
                                logger.error(ex.getMessage());
                            }

                            output.writeObject("Type y to add a new one, n to end");
                            choice = (String) input.readObject();
                        }
                        output.writeObject("Playlist created!");
                        logger.info("Playlist created successfully");
                        output.writeObject(theHub.availableCommands());
                        choice = (String) input.readObject();
                        break;
                    case '-':
                        //delete a playlist
                        output.writeObject("Delete an existing playlist. Available playlists:");
                        Iterator<PlayList> itp = theHub.playlists();
                        List<String> listOfAvailablePlaylists = new ArrayList<String>();
                        while (itp.hasNext()) {
                            PlayList p = itp.next();
                            listOfAvailablePlaylists.add(p.getTitle());
                        }
                        output.writeObject(listOfAvailablePlaylists);

                        output.writeObject("Type the name of playlist you wanna delete");
                        String plTitle = (String) input.readObject();
                        try {
                            theHub.deletePlayList(plTitle);
                        } catch (NoPlayListFoundException ex) {
                            output.writeObject("ERROR");
                            output.writeObject(ex.getMessage());
                        }
                        output.writeObject("Playlist deleted!");
                        logger.info("Playlist deleted successfully");
                        output.writeObject(theHub.availableCommands());
                        choice = (String) input.readObject();
                        break;
                    case 's':
                        //save elements, albums, playlists
                        try {
                            theHub.saveElements();
                            theHub.saveAlbums();
                            theHub.savePlayLists();
                            output.writeObject("Elements, albums and playlists saved!");
                            logger.info("Elements, albums and playlists saved!");
                            output.writeObject(theHub.availableCommands());
                            choice = (String) input.readObject();
                            break;
                        } catch (Exception e) {
                            output.writeObject("ERROR");
                            logger.error(e.getMessage());
                        }
                    default:
                        closeConnexion();
                        break;
                }
            }

        } catch (IOException ex) {
            logger.error("Server exception: " + ex.getMessage());

        } catch (ClassNotFoundException ex) {
            logger.error("Server exception: " + ex.getMessage());
        } finally {
            try {
                output.close();
                input.close();
            } catch (IOException ioe) {
                logger.error(ioe.getMessage());
            }
        }
    }

    private void closeConnexion() {
        try {
            output.close();
            input.close();
            socket.close();
            logger.info("kill connexion");
            System.exit(0);
        } catch (IOException ioe) {
            logger.error("Server exception: " + ioe.getMessage());
        }
    }

    private void sendFile(String file) throws IOException {
        FileInputStream fis = new FileInputStream(file);
        byte[] buffer = new byte[fis.available()];
        fis.read(buffer);
        output.writeObject(buffer);
    }


}
