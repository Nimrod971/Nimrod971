package com.esiea.musichub.network.client;

import com.esiea.musichub.model.PlayList;
import com.esiea.musichub.model.Song;
import org.apache.log4j.Logger;

import javax.sound.sampled.*;
import java.io.*;
import java.net.Socket;
import java.net.UnknownHostException;
import java.util.List;
import java.util.Scanner;

public class SimpleClient {

    final static Logger logger = Logger.getLogger(SimpleClient.class);
    private ObjectOutputStream output;
    private ObjectInputStream input;
    private Socket socket;

    public void connect(String ip) {
        int port = 6666;
        try {
            //create the socket; it is defined by an remote IP address (the address of the server) and a port number
            socket = new Socket(ip, port);

            //create the streams that will handle the objects coming and going through the sockets
            output = new ObjectOutputStream(socket.getOutputStream());
            input = new ObjectInputStream(socket.getInputStream());

            String textToSend = new String("send me the list of available commands!");
            logger.info("text sent to the server: " + textToSend);
            output.writeObject(textToSend);        //serialize and write the String to the stream


            logger.info("Type h for available commands");
            List<String> listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
            for (String command : listOfCommands)
                System.out.println(command);

            Scanner scan = new Scanner(System.in);
            String choice = scan.nextLine();
            output.writeObject(choice);

            if (choice.isEmpty() || choice.charAt(0) == 'q') {
                exit();
            }

            while (choice.charAt(0) != 'q') {

                if (choice.charAt(0) == 'h') {
                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == 't') {
                    //album titles, ordered by date
                    String albumsTitlesSortedByDate = (String) input.readObject();
                    System.out.println(albumsTitlesSortedByDate);

                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == 'g') {
                    //songs of an album, sorted by genre
                    String msg = (String) input.readObject();
                    System.out.println(msg);

                    String albumsTitlesSortedByDate = (String) input.readObject();
                    System.out.println(albumsTitlesSortedByDate);

                    scan = new Scanner(System.in);
                    String albumTitle = scan.nextLine();
                    output.writeObject(albumTitle);

                    String isErrorOrList = (String) input.readObject();
                    if(isErrorOrList.equals("ERROR")){
                        logger.error("No album found with the requested title ");
                        exit();
                    }
                    List<Song> listOfSongs = (List) input.readObject();
                    System.out.println(listOfSongs);

                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == 'd') {
                    //songs of an album
                    String msg = (String) input.readObject();
                    System.out.println(msg);

                    String albumSongs = (String) input.readObject();
                    System.out.println(albumSongs);

                    scan = new Scanner(System.in);
                    String albumTitle = scan.nextLine();
                    output.writeObject(albumTitle);

                    String isErrorOrList = (String) input.readObject();
                    if(isErrorOrList.equals("ERROR")){
                        logger.error("No album found with the requested title ");
                        exit();
                    }
                    List<Song> listOfSongs = (List) input.readObject();
                    System.out.println(listOfSongs);

                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == 'u') {
                    //audiobooks ordered by author
                    String audiobooksTitles = (String) input.readObject();
                    System.out.println(audiobooksTitles);

                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == 'p') {
                    // list of playlists
                    List<String> playlistTitles = (List) input.readObject();
                    for (String playlist : playlistTitles) System.out.println(playlist);

                    listOfCommands = (List) input.readObject();
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == 'f') {
                    //play song
                    String msg = (String) input.readObject();
                    System.out.println(msg);

                    String albumSongs = (String) input.readObject();
                    System.out.println(albumSongs);

                    scan = new Scanner(System.in);
                    String albumTitle = scan.nextLine();
                    output.writeObject(albumTitle);

                    String isErrorOrList = (String) input.readObject();
                    if(isErrorOrList.equals("ERROR")){
                        logger.error("No album found with the requested title ");
                        exit();
                    }
                    List<Song> listOfSongs = (List) input.readObject();
                    System.out.println(listOfSongs);

                    scan = new Scanner(System.in);
                    String songTitle = scan.nextLine();
                    output.writeObject(songTitle);

                    String isErrorOrList2 = (String) input.readObject();
                    if(isErrorOrList2.equals("ERROR")){
                        logger.error("No Song found with the requested title ");
                        exit();
                    }
                    play();

                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == 'c') {
                    // add a new song
                    String msg = (String) input.readObject();
                    System.out.println(msg);

                    String titleMsg = (String) input.readObject();
                    System.out.println(titleMsg);

                    scan = new Scanner(System.in);
                    String title = scan.nextLine();
                    output.writeObject(title);

                    String songGenreMsg = (String) input.readObject();
                    System.out.println(songGenreMsg);

                    scan = new Scanner(System.in);
                    String songGenre = scan.nextLine();
                    output.writeObject(songGenre);

                    String songArtistMsg = (String) input.readObject();
                    System.out.println(songArtistMsg);

                    scan = new Scanner(System.in);
                    String songArtist = scan.nextLine();
                    output.writeObject(songArtist);

                    String songLengthMsg = (String) input.readObject();
                    System.out.println(songLengthMsg);

                    scan = new Scanner(System.in);
                    String songLength = scan.nextLine();
                    output.writeObject(songLength);

                    String isErrorOrMSG = null;
                    isErrorOrMSG = (String) input.readObject();
                    if(isErrorOrMSG.equals("ERROR")){
                        logger.error("error when creating the song ");
                        exit();
                    }

                    String songContentMsg = isErrorOrMSG;
                    System.out.println(songContentMsg);

                    scan = new Scanner(System.in);
                    String songContent = scan.nextLine();
                    output.writeObject(songContent);
                    isErrorOrMSG = (String) input.readObject();
                    if(isErrorOrMSG.equals("ERROR")){
                        logger.error("error when creating the song ");
                        exit();
                    }

                    String newElementMsg = isErrorOrMSG;
                    System.out.println(newElementMsg);

                    List<String> newElementslist = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String element : newElementslist) System.out.println(element);

                    String doneMsg = (String) input.readObject();
                    System.out.println(doneMsg);

                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == 'a') {
                    // add a new album
                    String msg = (String) input.readObject();
                    System.out.println(msg);

                    String titleMsg = (String) input.readObject();
                    System.out.println(titleMsg);

                    scan = new Scanner(System.in);
                    String title = scan.nextLine();
                    output.writeObject(title);

                    String albumArtistMsg = (String) input.readObject();
                    System.out.println(albumArtistMsg);

                    scan = new Scanner(System.in);
                    String albumArtist = scan.nextLine();
                    output.writeObject(albumArtist);

                    String albumLengthMsg = (String) input.readObject();
                    System.out.println(albumLengthMsg);

                    scan = new Scanner(System.in);
                    String albumLength = scan.nextLine();
                    output.writeObject(albumLength);

                    String albumDateMsg = (String) input.readObject();
                    System.out.println(albumDateMsg);

                    scan = new Scanner(System.in);
                    String albumDate = scan.nextLine();
                    output.writeObject(albumDate);

                    String newElementMsg = (String) input.readObject();
                    System.out.println(newElementMsg);

                    List<String> newElementslist = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String element : newElementslist) System.out.println(element);

                    String doneMsg = (String) input.readObject();
                    System.out.println(doneMsg);

                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == '+') {
                    // add a song to an album
                    String msg = (String) input.readObject();
                    System.out.println(msg);

                    String songTitleMsg = (String) input.readObject();
                    System.out.println(songTitleMsg);

                    List<String> listOfSongs = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String element : listOfSongs) System.out.println(element);

                    scan = new Scanner(System.in);
                    String songTitle = scan.nextLine();
                    output.writeObject(songTitle);

                    String titleAlbumMsg = (String) input.readObject();
                    System.out.println(titleAlbumMsg);

                    List<String> listOfAlbums = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String element : listOfAlbums) System.out.println(element);

                    scan = new Scanner(System.in);
                    String albumTitle = scan.nextLine();
                    output.writeObject(albumTitle);

                    String doneMsg = (String) input.readObject();
                    System.out.println(doneMsg);

                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == 'l') {
                    // add a new audiobook
                    String msg = (String) input.readObject();
                    System.out.println(msg);

                    String AudioBookTitleMsg = (String) input.readObject();
                    System.out.println(AudioBookTitleMsg);

                    scan = new Scanner(System.in);
                    String bTitle = scan.nextLine();
                    output.writeObject(bTitle);

                    String ABCategoryMsg = (String) input.readObject();
                    System.out.println(ABCategoryMsg);

                    scan = new Scanner(System.in);
                    String bCategory = scan.nextLine();
                    output.writeObject(bCategory);

                    String ABArtistMsg = (String) input.readObject();
                    System.out.println(ABArtistMsg);

                    scan = new Scanner(System.in);
                    String bArtist = scan.nextLine();
                    output.writeObject(bArtist);

                    String ABLengthMsg = (String) input.readObject();
                    System.out.println(ABLengthMsg);

                    scan = new Scanner(System.in);
                    String bLength = scan.nextLine();
                    output.writeObject(bLength);

                    String ABContentMsg = (String) input.readObject();
                    System.out.println(ABContentMsg);

                    scan = new Scanner(System.in);
                    String bContent = scan.nextLine();
                    output.writeObject(bContent);

                    String ABLanguageMsg = (String) input.readObject();
                    System.out.println(ABLanguageMsg);

                    scan = new Scanner(System.in);
                    String bLanguage = scan.nextLine();
                    output.writeObject(bLanguage);

                    String doneMsg = (String) input.readObject();
                    System.out.println(doneMsg);

                    List<String> listOfNewAudiobook = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String audiobook : listOfNewAudiobook) System.out.println(audiobook);

                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == 'y') {
                    // create a new playlist from existing elements
                    String msg = (String) input.readObject();
                    System.out.println(msg);

                    String playlistsMsg = (String) input.readObject();
                    System.out.println(playlistsMsg);

                    List<String> listOfPlaylists = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String playlist : listOfPlaylists) System.out.println(playlist);

                    String playlistTitleMsg = (String) input.readObject();
                    System.out.println(playlistTitleMsg);

                    scan = new Scanner(System.in);
                    String playListTitle = scan.nextLine();
                    output.writeObject(playListTitle);

                    String playlistNewElementsMsg = (String) input.readObject();
                    System.out.println(playlistNewElementsMsg);

                    List<String> listOfAvailableElements = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String playlist : listOfAvailableElements) System.out.println(playlist);

                    while (choice.charAt(0) != 'n') {
                        String elementTitleMsg = (String) input.readObject();
                        System.out.println(elementTitleMsg);

                        scan = new Scanner(System.in);
                        String elementTitle = scan.nextLine();
                        output.writeObject(elementTitle);

                        String continueMsg = (String) input.readObject();
                        System.out.println(continueMsg);

                        scan = new Scanner(System.in);
                        choice = scan.nextLine();
                        output.writeObject(choice);
                    }

                    String doneMsg = (String) input.readObject();
                    System.out.println(doneMsg);

                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == '-') {
                    //delete a playlist
                    String playlistsMsg = (String) input.readObject();
                    System.out.println(playlistsMsg);

                    List<String> listOfPlaylists = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String playlist : listOfPlaylists) System.out.println(playlist);

                    String playlistTitleMsg = (String) input.readObject();
                    System.out.println(playlistTitleMsg);

                    scan = new Scanner(System.in);
                    String playListTitle = scan.nextLine();
                    output.writeObject(playListTitle);

                    String doneMsg = (String) input.readObject();
                    System.out.println(doneMsg);

                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else if (choice.charAt(0) == 's') {
                    //save elements, albums, playlists
                    String doneMsg = (String) input.readObject();
                    System.out.println(doneMsg);

                    listOfCommands = (List) input.readObject();    //deserialize and read the Student object from the stream
                    for (String command : listOfCommands) System.out.println(command);

                    scan = new Scanner(System.in);
                    choice = scan.nextLine();
                    output.writeObject(choice);
                }

                else{
                    exit();
                }

            }
        } catch (UnknownHostException uhe) {
            uhe.printStackTrace();
            logger.error("Error: "+ uhe.getMessage());
        } catch (IOException ioe) {
            ioe.printStackTrace();
            logger.error("Error: "+ ioe.getMessage());
        } catch (ClassNotFoundException cnfe) {
            cnfe.printStackTrace();
            logger.error("Error: "+cnfe.getMessage());
        } finally {
            try {
                input.close();
                output.close();
                socket.close();
            } catch (IOException ioe) {
                ioe.printStackTrace();
                logger.error("Error: server doesn't available");
            }
        }
    }

    private void exit() {
        try {
            input.close();
            output.close();
            socket.close();
            logger.info("connexion killed with server ");
            System.exit(0);
        } catch (IOException ioe) {
            ioe.printStackTrace();
            logger.error("error killing connexion ");
        }
    }

    private void playAudio(byte[] songsToPlay) {
        SourceDataLine soundLine = null;
        int BUFFER_SIZE = 1024;
        //File sample = new File("src/main/resources/sounds/temp/song.wav");

        // Set up an audio input stream piped from the sound file.
        try {
            InputStream listen = new ByteArrayInputStream(songsToPlay);
            AudioInputStream audioInputStream = AudioSystem.getAudioInputStream(listen);
            // AudioInputStream audioInputStream = AudioSystem.getAudioInputStream(sample);
            AudioFormat audioFormat = audioInputStream.getFormat();
            DataLine.Info info = new DataLine.Info(SourceDataLine.class, audioFormat);

//Soundline ist noch nicht angelegt -> angelegen.
            if (soundLine == null) {
                soundLine = (SourceDataLine) AudioSystem.getLine(info);
                soundLine.open(audioFormat);
                soundLine.start();
            }
            System.out.println("Started");
            Thread.sleep(2000);

            System.out.println("Playing");
            int nBytesRead = 0;
            byte[] sampledData = new byte[BUFFER_SIZE];
            while (nBytesRead != -1) {
                nBytesRead = audioInputStream.read(sampledData, 0, sampledData.length);
                if (nBytesRead >= 0) {
                    soundLine.write(sampledData, 0, nBytesRead);
                }
            }
            Thread.sleep(2000);
            System.out.println("Draining");
            soundLine.drain();
            Thread.sleep(2000);
            System.out.println("Closing");
            soundLine.close();

            //    Files.deleteIfExists(Paths.get("src/main/resources/sounds/temp/song.wav"));
        } catch (Exception e) {
            e.printStackTrace();
        }

    }

    private void playSound(byte[] songsToPlay) {
        try {
            InputStream listen = new ByteArrayInputStream(songsToPlay);
            AudioInputStream sound = AudioSystem.getAudioInputStream(listen);
            // load the sound into memory (a Clip)
            DataLine.Info info = new DataLine.Info(Clip.class, sound.getFormat());
            Clip clip1 = (Clip) AudioSystem.getLine(info);
            clip1.open(sound);
            clip1.addLineListener(new LineListener() {
                public void update(LineEvent event) {
                    if (event.getType() == LineEvent.Type.STOP) {
                        event.getLine().close();
                    }
                }
            });
            // play the sound clip
            clip1.start();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    private void play() throws IOException, ClassNotFoundException {
        byte[] buffer = (byte[]) input.readObject();
//        FileOutputStream fos = new FileOutputStream("src/main/resources/sounds/temp/song.wav");
//
//        fos.write(buffer);
//        fos.close();
        playAudio(buffer);
    }
}


